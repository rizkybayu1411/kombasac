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
                <div class="card-header-action">
                    <a href="{{ route('admin.kelas.tambah') }}" class="btn btn-primary">
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
                                <th>Nama Kelas</th>
                                <th>Biaya Kelas</th>
                                <th>Kelas</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->name_kelas }}</td>
                                <td>{{ rupiah($item->biaya_kelas) }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$item->thumbnail) }}" height="180">
                                </td>
                                <td>
                                    <a href="{{ route('admin.kelas.detail',Crypt::encrypt($item->id)) }}"
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