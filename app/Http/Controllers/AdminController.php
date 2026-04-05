<?php

namespace App\Http\Controllers;

use App\Models\Booking; 
use App\Models\Customer; 
use App\Models\Vehicle; 
use App\Models\Service; 
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // ==========================================================
    // 1. AUTHENTICATION (LOGIN ADMIN)
    // ==========================================================
    
    public function showLoginForm() { 
        return view('admin.auth.login'); 
    }
    
    public function login(Request $request) {
        // Login Sederhana (Hardcoded)
        if($request->email == 'admin@otw.com' && $request->password == '123'){
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error', 'Login Gagal');
    }

    public function logout() {
        return redirect()->route('admin.login')->with('success', 'Anda berhasil Logout');
    }

    // ==========================================================
    // 2. DASHBOARD
    // ==========================================================

    public function dashboard() {
        $bookings = Booking::with(['customer', 'vehicle', 'service'])->latest()->get();

        $stats = [
            'booking_masuk'   => $bookings->count(),
            'antrian_aktif'   => $bookings->where('status', '!=', 'Selesai')->where('status', '!=', 'Batal')->count(),
            'total_kendaraan' => Vehicle::count(),
            'total_customer'  => Customer::count()
        ];

        return view('admin.dashboard.index', [
            'bookings' => $bookings,
            'stats' => $stats
        ]);
    }

    // ==========================================================
    // 3. MANAJEMEN BOOKING (PESANAN)
    // ==========================================================

    public function bookings() {
        $bookings = Booking::with(['customer', 'vehicle', 'service'])->latest()->get();
        return view('admin.booking.index', ['bookings' => $bookings]);
    }

    public function updateBookingStatus(Request $request, $id) {
        $booking = Booking::findOrFail($id); 
        $booking->status = $request->status_baru;
        $booking->save();
        return back();
    }

    // Form Booking Manual
    public function createBooking() {
        $customers = Customer::all();
        $vehicles = Vehicle::all(); 
        $services = Service::where('status', 'Aktif')->get();

        return view('admin.booking.create', [
            'customers' => $customers,
            'vehicles' => $vehicles,
            'services' => $services
        ]);
    }

    // Simpan Booking Manual
    public function storeBooking(Request $request) {
        $request->validate([
            'customer_id' => 'required',
            'vehicle_id' => 'required',
            'service_id' => 'required',
            'booking_date' => 'required',
        ]);

        Booking::create([
            'customer_id' => $request->customer_id,
            'vehicle_id'  => $request->vehicle_id,
            'service_id'  => $request->service_id,
            'booking_date'=> $request->booking_date,
            'catatan'     => $request->catatan,
            'status'      => 'Pending',
        ]);

        return redirect()->route('admin.bookings');
    }

    // ==========================================================
    // 4. MANAJEMEN SERVICES (LAYANAN)
    // ==========================================================

    public function services() {
        $services = Service::all(); 
        return view('admin.service.index', ['services' => $services]);
    }

    public function storeService(Request $request) {
        $request->validate([
            'nama_layanan' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'durasi' => 'required'
        ]);

        Service::create([
            'nama_layanan' => $request->nama_layanan,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'durasi' => $request->durasi,
            'status' => 'Aktif'
        ]);

        return back();
    }

    public function deleteService($id) {
        $service = Service::findOrFail($id);
        $service->delete();
        return back();
    }

    public function editService($id) {
        $service = Service::findOrFail($id);
        return view('admin.service.edit', ['service' => $service]);
    }

    public function updateService(Request $request, $id) {
        $request->validate([
            'nama_layanan' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'durasi' => 'required'
        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'nama_layanan' => $request->nama_layanan,
            'kategori'     => $request->kategori,
            'harga'        => $request->harga,
            'durasi'       => $request->durasi,
        ]);

        return redirect()->route('admin.services'); 
    }

    // ==========================================================
    // 5. MANAJEMEN CUSTOMER (PELANGGAN)
    // ==========================================================

    public function customers() {
        $customers = Customer::all(); 
        return view('admin.customer.index', ['customers' => $customers]);
    }

    // [UPDATE FINAL] Simpan Customer + Kendaraan (Sesuai APK)
    public function storeCustomer(Request $request) {
        // 1. Validasi Input
        $request->validate([
            // Data Orang
            'nama' => 'required',
            'hp' => 'required',
            
            // Data Mobil (Sesuai APK: Hanya Plat & Model yang wajib)
            'plat' => 'required',
            'model' => 'required',
        ]);

        // 2. Simpan Data Customer
        $customer = Customer::create([
            'nama' => $request->nama,
            'email' => $request->email ?? '-',
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'status' => 'Active'
        ]);

        // 3. Simpan Data Kendaraan (VERSI BARU)
        // Kita HAPUS 'merk' dan 'transmisi' karena sudah tidak ada di database
        Vehicle::create([
            'customer_id' => $customer->id,
            'pemilik'     => $customer->nama, 
            'plat'        => $request->plat,
            'model'       => $request->model,
            'tahun'       => $request->tahun, // Opsional
            'warna'       => $request->warna  // Opsional (Kolom Baru)
        ]);

        return back()->with('success', 'Pelanggan dan Kendaraan berhasil didaftarkan!');
    }

    public function deleteCustomer($id) {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return back()->with('success', 'Data pelanggan berhasil dihapus');
    }

    // ==========================================================
    // 6. MANAJEMEN VEHICLE (KENDARAAN)
    // ==========================================================

    public function vehicles() {
        $vehicles = Vehicle::all(); 
        return view('admin.vehicle.index', ['vehicles' => $vehicles]);
    }

    public function deleteVehicle($id) {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return back()->with('success', 'Data kendaraan berhasil dihapus');
    }
    // ==========================================================
    // 7. FITUR EDIT (UPDATE) - BARU
    // ==========================================================

    // --- EDIT CUSTOMER ---
    public function editCustomer($id) {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit', ['customer' => $customer]);
    }

    public function updateCustomer(Request $request, $id) {
        $customer = Customer::findOrFail($id);
        $customer->update([
            'nama'   => $request->nama,
            'hp'     => $request->hp,
            'email'  => $request->email,
            'alamat' => $request->alamat,
            'status' => $request->status
        ]);
        return redirect()->route('admin.customers')->with('success', 'Data customer berhasil diupdate');
    }

    // --- EDIT VEHICLE ---
    public function editVehicle($id) {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicle.edit', ['vehicle' => $vehicle]);
    }

    public function updateVehicle(Request $request, $id) {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update([
            'plat'  => $request->plat,
            'model' => $request->model,
            'tahun' => $request->tahun,
            'warna' => $request->warna
        ]);
        return redirect()->route('admin.vehicles')->with('success', 'Data kendaraan berhasil diupdate');
    }
}