@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')
@section('page-subtitle', 'Pantau aktivitas bengkel dari aplikasi mobile')

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="stat-card d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold m-0">{{ $stats['booking_masuk'] }}</h3>
                    <span class="text-secondary" style="font-size: 14px;">Booking Masuk</span>
                </div>
                <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                    <i class="bi bi-calendar-check fs-4"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold m-0">{{ $stats['antrian_aktif'] }}</h3>
                    <span class="text-secondary" style="font-size: 14px;">Antrian Aktif</span>
                </div>
                <div class="icon-box bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                    <i class="bi bi-hourglass-split fs-4"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold m-0">{{ $stats['total_kendaraan'] }}</h3>
                    <span class="text-secondary" style="font-size: 14px;">Total Kendaraan</span>
                </div>
                <div class="icon-box bg-success bg-opacity-10 text-success rounded-3 p-3">
                    <i class="bi bi-car-front fs-4"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold m-0">{{ $stats['total_customer'] }}</h3>
                    <span class="text-secondary" style="font-size: 14px;">Total Customer</span>
                </div>
                <div class="icon-box bg-info bg-opacity-10 text-info rounded-3 p-3">
                    <i class="bi bi-people fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="table-card h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold m-0">Antrian Masuk (Realtime)</h5>
                    <a href="{{ route('admin.bookings') }}" class="btn btn-sm btn-light">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Customer</th>
                                <th>Kendaraan</th>
                                <th>Servis</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
    @foreach($bookings as $item)
    <tr>
        <td>
            {{-- Panggil Nama Customer dari Relasi --}}
            <div class="fw-bold">{{ $item->customer->nama }}</div>
            <small class="text-secondary">{{ \Carbon\Carbon::parse($item->booking_date)->format('d M Y, H:i') }}</small>
        </td>
        <td>
            {{-- Panggil Info Kendaraan dari Relasi --}}
            {{ $item->vehicle->merk }} {{ $item->vehicle->model }} <br> 
            <small class="text-muted">{{ $item->vehicle->plat }}</small>
        </td>
        <td>
             {{-- Panggil Nama Service dari Relasi --}}
            {{ $item->service->nama_layanan }}
        </td>
        <td>
            @php
                $warna = 'secondary';
                if($item->status == 'Pending') $warna = 'warning';
                if($item->status == 'Proses') $warna = 'info';
                if($item->status == 'Selesai') $warna = 'success';
                if($item->status == 'Batal') $warna = 'danger';
            @endphp
            <span class="badge bg-{{ $warna }}">{{ $item->status }}</span>
        </td>
    </tr>
    @endforeach
</tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="stat-card h-100">
                <h5 class="fw-bold mb-4">Statistik Booking</h5>
                <div style="height: 250px; display: flex; align-items: center; justify-content: center;">
                    <canvas id="bookingChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    const ctx = document.getElementById('bookingChart');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Selesai', 'Pending', 'Batal'],
            datasets: [{
                data: [35, 45, 20], // Data Persentase Dummy
                backgroundColor: ['#10B981', '#F59E0B', '#EF4444'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: { 
            responsive: true, 
            cutout: '75%',
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
@endpush