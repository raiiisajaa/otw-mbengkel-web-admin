@extends('layouts.admin')

@section('title', 'Kelola Booking')
@section('page-title', 'Data Booking')
@section('page-subtitle', 'Daftar antrian servis yang masuk')

@section('content')
    <div class="table-card">
        <div class="d-flex justify-content-between mb-4">
            <div class="d-flex gap-2">
                <input type="text" class="form-control" placeholder="Cari nama / plat nomor..." style="width: 300px;">
                <button class="btn btn-outline-secondary"><i class="bi bi-filter"></i> Filter</button>
            </div>
            
            {{-- UPDATE: Tombol ini sekarang sudah Hidup (Link) --}}
            <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Booking Manual
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID Booking</th>
                        <th>Customer</th>
                        <th>Info Kendaraan</th>
                        <th>Jenis Servis</th>
                        <th>Jadwal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $item) 
                    <tr>
                        <td class="fw-bold text-primary">#{{ $item->id }}</td>
                        <td>
                            <div class="fw-bold">{{ $item->customer->nama }}</div>
                            <small class="text-secondary">{{ $item->customer->hp }}</small>
                        </td>
                        <td>
                            <div class="fw-bold">{{ $item->vehicle->model }}</div>
                            <span class="badge bg-secondary text-white" style="font-size: 10px;">{{ $item->vehicle->plat }}</span>
                        </td>
                        <td>
                            {{ $item->service->nama_layanan }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($item->booking_date)->format('d M Y, H:i') }}</td>
                        
                        {{-- Badge Status --}}
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

                        {{-- Tombol Aksi Cerdas --}}
                        <td>
                            <div class="d-flex gap-1">
                                @if($item->status == 'Pending')
                                    {{-- Tombol TERIMA --}}
                                    <form action="{{ route('admin.bookings.update', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status_baru" value="Proses">
                                        <button type="submit" class="btn btn-sm btn-primary" title="Terima Booking">
                                            <i class="bi bi-check-lg"></i> Terima
                                        </button>
                                    </form>
                                    
                                    {{-- Tombol TOLAK --}}
                                    <form action="{{ route('admin.bookings.update', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status_baru" value="Batal">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Tolak Booking">
                                            <i class="bi bi-x-lg"></i>
                                        </button>
                                    </form>

                                @elseif($item->status == 'Proses')
                                    {{-- Tombol SELESAI --}}
                                    <form action="{{ route('admin.bookings.update', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status_baru" value="Selesai">
                                        <button type="submit" class="btn btn-sm btn-success" title="Selesaikan Pekerjaan">
                                            <i class="bi bi-check-circle"></i> Selesai
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted small"><i class="bi bi-lock"></i> Selesai</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection