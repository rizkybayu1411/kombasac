@extends('layouts.admin')
@section('content')
<?php
function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
 
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }} {{ $kelas->name_kelas }}</h4>
                <div class="card-header-action">
                    <a href="javascript:void(0)" onclick="alertconfirmn('{{ route('admin.kelas.hapus',Crypt::encrypt($kelas->id)) }}')" class="btn btn-danger">
                        Hapus 
                    </a>
                    <a href="{{ route('admin.kelas.edit',Crypt::encrypt($kelas->id)) }}" class="btn btn-warning">
                        Edit 
                    </a>
                    <a href="{{ route('admin.forum') }}" class="btn btn-success">
                        Forum 
                    </a>
                    <button id="btn-back" class="btn btn-primary">
                        Kembali
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td>Biaya Kelas</td>
                                <td class="px-2 py-1">:</td>
                                <td>{{ rupiah($kelas->biaya_kelas) }}</td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top">Deskripsi Kelas</td>
                                <td style="vertical-align: top" class="px-2 py-1">:</td>
                                <td style="vertical-align: top">
                                    {!! $kelas->description_kelas !!}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('storage/' . $kelas->thumbnail) }}" height="300" width="80%" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Siswa {{ $kelas->name_kelas }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Penugasan {{ $kelas->name_kelas }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.kelas.tambahtugas',Crypt::encrypt($kelas->id)) }}) }}" class="btn btn-primary">
                        Tambah
                    </a>
                    
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-hover" id="table2">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>judul</th>
                                <th>deskripsi</th>
                                <th>upload file</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas->tugas as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{$item->upload_tugas}}</a></td>
                                <td>
                                    <a href="javascript:void(0)" onclick="alertconfirmn('{{ route('admin.tugas.hapustugas',[
                                        'id' => Crypt::encrypt($item->id),
                                        'idkelas' => Crypt::encrypt($kelas->id)
                                    ]) }}')" class="btn btn-danger">
                                        Hapus 
                                    </a>
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
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Video Materi {{ $kelas->name_kelas }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.kelas.tambahvideo',Crypt::encrypt($kelas->id)) }}" class="btn btn-primary">
                        Tambah
                    </a>
                    
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-hover" id="table3">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>URL Video</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas->video as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->name_video }}</td>
                                <td>{{ $item->url_video }}</td>
                                <td>
                                    <a href="javascript:void(0)" onclick="alertconfirmn('{{ route('admin.kelas.hapusvideo',[
                                        'id' => Crypt::encrypt($item->id),
                                        'idkelas' => Crypt::encrypt($kelas->id)
                                    ]) }}')" class="btn btn-danger">
                                        Hapus 
                                    </a>
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