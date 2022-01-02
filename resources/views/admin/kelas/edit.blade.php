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
                <form action="{{ route('admin.kelas.update',Crypt::encrypt($kelas->id)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="text" name="name_kelas" class="form-control @error('name_kelas') is-invalid @enderror" value="{{ $kelas->name_kelas }}">
                        @error('name_kelas')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Biaya Kelas</label>
                        <input type="text" name="biaya_kelas" class="form-control @error('biaya_kelas') is-invalid @enderror" value="{{ $kelas->biaya_kelas }}" onkeypress="return hanyaAngka(event)">
                        @error('biaya_kelas')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi Kelas</label>
                        <textarea name="description_kelas" class="ckeditor @error('description_kelas') is-invalid @enderror" id="ckeditor">
                        {{ $kelas->description_kelas }}
                    </textarea>
                        @error('description_kelas')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror">
                        <small class="text-warning">Kosongkan jika tidak akan mengubah thumbnail</small><br> 
                        @error('thumbnail')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">Perbaharui Kelas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
    </script>
@endsection