@extends('layouts.admin')

@section('title', 'Edit Layanan')
@section('page-title', 'Edit Data Layanan')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                
                {{-- Form mengarah ke Route Update Service --}}
                <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT') 
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan</label>
                        <input type="text" name="nama_layanan" class="form-control" value="{{ $service->nama_layanan }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select">
                            <option value="Servis Ringan" {{ $service->kategori == 'Servis Ringan' ? 'selected' : '' }}>Servis Ringan</option>
                            <option value="Servis Berat" {{ $service->kategori == 'Servis Berat' ? 'selected' : '' }}>Servis Berat</option>
                            <option value="Cuci & Detailing" {{ $service->kategori == 'Cuci & Detailing' ? 'selected' : '' }}>Cuci & Detailing</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control" value="{{ $service->harga }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Durasi (Menit)</label>
                            <input type="text" name="durasi" class="form-control" value="{{ $service->durasi }}" required>
                        </div>
                    </div>

                    <a href="{{ route('admin.services') }}" class="btn btn-light">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection