@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Lama Jam Belajar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensi as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->users->name }}</td>
                                <td>{{ $item->kelas->name_kelas}}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->jam_masuk }}</td>
                                <td>{{ $item->jam_keluar }}</td>
                                <td>{{ $item->lama_jam }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('export-data') }}" class="btn btn-success">
                        Export Absensi
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection