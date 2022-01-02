@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
                <div class="card-header-action">
                    <button id="btn-back" class="btn btn-primary">
                        Kembali
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.rekening.update',Crypt::encrypt($rekening->id)) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        {{ method_field('post') }}
                    <div class="form-group">
                        <label for="">Nama Bank</label>
                        <input type="text" id="nama_bank" name="nama_bank" class="form-control @error('nama_bank') is-invalid @enderror" value="{{$rekening->nama_bank}}">
                        @error('nama_bank')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Atas Nama</label>
                        <input type="text" id="atas_nama" name="atas_nama" class="form-control @error('atas_nama') is-invalid @enderror" value="{{$rekening->atas_nama}}">
                        @error('atas_nama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">No Rekening</label>
                        <input type="text" id="no_rekening" name="no_rekening" class="form-control @error('no_rekening') is-invalid @enderror" value="{{$rekening->no_rekening}}">
                        @error('no_rekening')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection