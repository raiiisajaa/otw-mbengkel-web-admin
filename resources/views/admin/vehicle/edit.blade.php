@extends('layouts.admin')

@section('title', 'Edit Kendaraan')
@section('page-title', 'Edit Data Kendaraan')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h5 class="mb-4">Milik: <span class="text-primary">{{ $vehicle->pemilik }}</span></h5>
                
                <form action="{{ route('admin.vehicles.update', $vehicle->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Nomor Polisi</label>
                        <input type="text" name="plat" class="form-control" value="{{ $vehicle->plat }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Model/Tipe Mobil</label>
                        <input type="text" name="model" class="form-control" value="{{ $vehicle->model }}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tahun</label>
                            <input type="number" name="tahun" class="form-control" value="{{ $vehicle->tahun }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Warna</label>
                            <input type="text" name="warna" class="form-control" value="{{ $vehicle->warna }}">
                        </div>
                    </div>

                    <a href="{{ route('admin.vehicles') }}" class="btn btn-light">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection