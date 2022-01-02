@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Nama Tugas</th>
                                <th>Tugas yang di setorkan</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kirimtugas1 as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->users->name }}</td>
                                <td>{{ $item->kelas->name_kelas }}</td>
                                <td>{{ $item->tugas->judul }}</td>
                                <td>{{ $item->kirim_tugas }}</td>
                                <td>
                                    <a href="{{ route('admin.tugas.detail',Crypt::encrypt($item->id)) }}"
                                        class="btn btn-warning">Detail</a>
                                </td>
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