@extends('layouts.admin')

@section('title', 'Data Kendaraan')
@section('page-title', 'Data Kendaraan')
@section('page-subtitle', 'Daftar kendaraan customer yang terdaftar')

@section('content')
<div class="card border-0 shadow-sm"> {{-- Ganti table-card jadi card biasa biar rapi --}}
    <div class="card-body">
        <div class="d-flex justify-content-between mb-4">
            <input type="text" class="form-control w-25" placeholder="Cari plat nomor / pemilik...">
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Pemilik</th>
                        <th>Model Mobil</th> {{-- Ganti Header Merk jadi Model --}}
                        <th>Plat Nomor</th>
                        <th>Tahun</th>
                        <th>Warna</th> {{-- Ganti Transmisi jadi Warna --}}
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicles as $item)
                    <tr>
                        <td class="fw-bold">{{ $item->pemilik }}</td>
                        <td>{{ $item->model }}</td> {{-- Panggil Model Saja --}}
                        <td>
                            <span class="badge bg-dark">{{ $item->plat }}</span>
                        </td>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->warna }}</td> {{-- Panggil Warna --}}
                        
                        {{-- TOMBOL AKSI --}}
                        <td class="text-end">
                            {{-- Tombol Edit (SUDAH AKTIF) --}}
                            <a href="{{ route('admin.vehicles.edit', $item->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                <i class="bi bi-pencil"></i>
                            </a>

                            {{-- Tombol DELETE --}}
                            <form action="{{ route('admin.vehicles.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus kendaraan ini?')">
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
@endsection     