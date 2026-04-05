@extends('layouts.admin')

@section('title', 'Booking Manual')
@section('page-title', 'Tambah Booking Baru')
@section('page-subtitle', 'Input pesanan untuk pelanggan yang datang langsung')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                
                <form action="{{ route('admin.bookings.store') }}" method="POST">
                    @csrf

                    {{-- 1. PILIH CUSTOMER --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Pilih Customer</label>
                        <select name="customer_id" class="form-select" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach($customers as $c)
                                <option value="{{ $c->id }}">{{ $c->nama }} ({{ $c->hp }})</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- 2. PILIH KENDARAAN (Posisi yang Benar di sini) --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Pilih Kendaraan</label>
                        <select name="vehicle_id" class="form-select" required>
                            <option value="">-- Pilih Kendaraan --</option>
                            @foreach($vehicles as $v)
                                <option value="{{ $v->id }}">
                                    [{{ $v->plat }}] {{ $v->merk }} {{ $v->model }} - (Milik: {{ $v->pemilik }})
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted text-danger">*Pastikan kendaraan sesuai dengan pemilik di atas</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            {{-- 3. PILIH SERVICE --}}
                            <label class="form-label fw-bold">Jenis Layanan</label>
                            <select name="service_id" class="form-select" required>
                                <option value="">-- Pilih Service --</option>
                                @foreach($services as $s)
                                    <option value="{{ $s->id }}">
                                        {{ $s->nama_layanan }} - Rp {{ number_format($s->harga, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            {{-- 4. PILIH TANGGAL --}}
                            <label class="form-label fw-bold">Jadwal Booking</label>
                            <input type="datetime-local" name="booking_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Catatan Tambahan (Opsional)</label>
                        <textarea name="catatan" class="form-control" rows="3" placeholder="Contoh: Minta oli sisa dibawa pulang"></textarea>
                    </div>

                    {{-- TOMBOL AKSI --}}
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.bookings') }}" class="btn btn-light">Kembali</a>
                        <button type="submit" class="btn btn-primary px-4">Buat Booking</button>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>
</div>
@endsection