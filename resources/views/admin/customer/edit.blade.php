@extends('layouts.admin')

@section('title', 'Edit Customer')
@section('page-title', 'Edit Data Pelanggan')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                {{-- Form mengarah ke Route Update --}}
                <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT') {{-- Wajib untuk proses Edit --}}
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="{{ $customer->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. WhatsApp</label>
                        <input type="text" name="hp" class="form-control" value="{{ $customer->hp }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $customer->email }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2">{{ $customer->alamat }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="Active" {{ $customer->status == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Blocked" {{ $customer->status == 'Blocked' ? 'selected' : '' }}>Blocked</option>
                        </select>
                    </div>

                    <a href="{{ route('admin.customers') }}" class="btn btn-light">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection