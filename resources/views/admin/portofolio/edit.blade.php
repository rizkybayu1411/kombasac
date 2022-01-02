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
                <form action="{{ route('admin.portofolio.update',Crypt::encrypt($portofolio->id)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$portofolio->title}}">
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$portofolio->description}}">
                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">thumbnail portofolio</label>
                        <input type="file" type="file" id="portofolio_image" name="portofolio_image" class="form-control @error('thumbnail') is-invalid @enderror">
                        <small class="text-warning">Kosongkan jika tidak akan mengubah thumbnail</small><br> 
                        @error('portofolio_image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">Perbaharui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection