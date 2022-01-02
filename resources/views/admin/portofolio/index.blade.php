@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-header-action">
                    <a href="{{ route('admin.portofolio.tambah') }}" class="btn btn-primary">
                        Tambah
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Title</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portofolio as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->nama_user }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td><img src="{{ asset('storage/'.$item->portofolio_image) }}" height="128">
                                </td>
                                <form action="{{ route('delete',$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td>
                                    <a href="{{ route('admin.portofolio.edit',Crypt::encrypt($item->id)) }}" class="btn btn-info">
                                        Edit 
                                    </a>
                                    <a>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </a>    
                                    </td>
                                </form>    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection