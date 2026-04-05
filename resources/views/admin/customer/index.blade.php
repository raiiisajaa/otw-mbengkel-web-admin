@extends('layouts.admin')

@section('title', 'Data Customer')
@section('page-title', 'Data Customer')
@section('page-subtitle', 'Pengguna aplikasi mobile OTW Mbengkel')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            
            {{-- Header: Pencarian & Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <input type="text" class="form-control" placeholder="Cari nama / email..." style="width: 300px;">
                
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-success">
                        <i class="bi bi-whatsapp"></i> Broadcast WA
                    </button>

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahCustomer">
                        <i class="bi bi-person-plus"></i> Tambah Baru
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama User</th>
                            <th>Kontak</th>
                            <th>Bergabung Sejak</th>
                            <th>Status</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $item)
                        <tr>
                            <td>
                                <div class="fw-bold">{{ $item->nama }}</div>
                                <small class="text-secondary">{{ $item->email }}</small>
                            </td>
                            <td>{{ $item->hp }}</td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td>
                                <span class="badge {{ $item->status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="text-end">
                                {{-- Tombol Edit (SUDAH AKTIF) --}}
                                <a href="{{ route('admin.customers.edit', $item->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                {{-- Tombol DELETE (SUDAH AKTIF) --}}
                                <form action="{{ route('admin.customers.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus user ini? Data booking dia juga mungkin akan hilang.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH CUSTOMER & KENDARAAN (SUDAH SESUAI APK) --}}
    <div class="modal fade" id="modalTambahCustomer" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrasi Pelanggan & Kendaraan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.customers.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        
                        {{-- BAGIAN 1: DATA PELANGGAN --}}
                        <h6 class="fw-bold text-primary mb-3"><i class="bi bi-person"></i> Data Pelanggan</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" required placeholder="Contoh: Budi Santoso">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No. WhatsApp</label>
                                <input type="text" name="hp" class="form-control" required placeholder="0812...">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email (Opsional)</label>
                                <input type="email" name="email" class="form-control" placeholder="budi@gmail.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat singkat...">
                            </div>
                        </div>

                        <hr>

                        {{-- BAGIAN 2: DATA KENDARAAN (SUDAH SESUAI DATABASE BARU) --}}
                        <h6 class="fw-bold text-primary mb-3"><i class="bi bi-car-front"></i> Data Kendaraan</h6>
                        
                        <div class="mb-3">
                            <label class="form-label">Nomor Polisi</label>
                            <input type="text" name="plat" class="form-control" required placeholder="Contoh: B 1234 XY">
                            <small class="text-muted" style="font-size: 10px;">*Sesuai STNK</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Model/Tipe Mobil</label>
                            <input type="text" name="model" class="form-control" required placeholder="Contoh: Honda Jazz atau Toyota Avanza">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tahun Kendaraan (Opsional)</label>
                                <input type="number" name="tahun" class="form-control" placeholder="Contoh: 2025">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Warna Kendaraan (Opsional)</label>
                                <input type="text" name="warna" class="form-control" placeholder="Contoh: Hitam Metalik">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Paket Lengkap</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection