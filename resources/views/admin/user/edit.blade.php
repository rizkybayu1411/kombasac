@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user.update',Crypt::encrypt($users->id)) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input class="form-control" type="text" name="name" value="{{ $users->name }}" id="">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ $users->email }}" id="">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tipe User</label>
                        <select id="role" class="form-control" required="" name="role">
                            <option value="">Pilih TIpe</option>
                            <option value="admin" {{ $users->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="pembimbing" {{ $users->role == 'pembimbing' ? 'selected' : '' }}>Pembimbing</option>
                            <option value="keuangan" {{ $users->role == 'keuangan' ? 'selected' : '' }}>Keuangan</option>
                        </select>    
                    </div>
                    <div class="text-right">
                        <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection