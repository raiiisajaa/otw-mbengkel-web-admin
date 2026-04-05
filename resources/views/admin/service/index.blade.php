@extends('layouts.admin')

@section('title', 'Kelola Service')
@section('page-title', 'Daftar Layanan')
@section('page-subtitle', 'Atur harga dan jenis servis bengkel')

@section('content')
<div class="table-card">
    <div class="d-flex justify-content-between mb-4">
        <input type="text" class="form-control w-25" placeholder="Cari layanan...">
        
        {{-- Tombol Pemicu Modal --}}
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-lg"></i> Tambah Service
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama Layanan</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Durasi</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $item)
                <tr>
                    <td class="fw-bold">{{ $item->nama_layanan }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td class="text-primary fw-bold">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                    </td>
                    <td><i class="bi bi-clock me-1"></i> {{ $item->durasi }}</td>
                    <td>
                        <span class="badge {{ $item->status == 'Aktif' ? 'bg-success' : 'bg-secondary' }}">
                            {{ $item->status }}
                        </span>
                    </td>
                    
                    <td class="text-end">
                        {{-- UPDATE: Ganti <button> jadi <a> agar bisa pindah halaman --}}
                        <a href="{{ route('admin.services.edit', $item->id) }}" class="btn btn-sm btn-outline-primary me-1">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form action="{{ route('admin.services.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus layanan ini?')">
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

{{-- MODAL TAMBAH SERVICE (Hanya Boleh Ada Satu) --}}
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Layanan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Layanan</label>
                        <input type="text" name="nama_layanan" class="form-control" placeholder="Contoh: Ganti Ban" required>
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="kategori" class="form-select">
                            <option>Perawatan Ringan</option>
                            <option>Servis Berkala</option>
                            <option>Perawatan Berat</option>
                            <option>Umum</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control" placeholder="100000" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Durasi</label>
                            <input type="text" name="durasi" class="form-control" placeholder="30 Menit" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection