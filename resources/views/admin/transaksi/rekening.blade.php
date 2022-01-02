@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.rekening.tambah') }}" class="btn btn-primary">
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
                                <th>Bank</th>
                                <th>Atas Nama</th>
                                <th>Nomor Rekening</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekening as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->nama_bank }}</td>
                                <td>{{ $item->atas_nama }}</td>
                                <td>{{ $item->no_rekening }}</td>
                                <td>
                                    <a href="{{ route('admin.rekening.edit',Crypt::encrypt($item->id)) }}" class="btn btn-info">
                                        Edit 
                                    </a>
                                    <a href="javascript:void(0)" onclick="alertconfirmn('{{ route('admin.rekening.hapus',Crypt::encrypt($item->id)) }}')" class="btn btn-danger">
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