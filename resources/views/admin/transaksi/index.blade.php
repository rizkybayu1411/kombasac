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
                                <th>Nama User</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Tanggal Bayar</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name_kelas }}</td>
                                <td>
                                    @if ($item->status == 0)
                                    Menunggu Konfirmasi
                                    @elseif($item->status == 1)
                                    Disetujui
                                    @else
                                    Ditolak
                                    @endif
                                </td>
                                <td>{{ UserHelp::tgl_indo(substr($item->created_at,0,10)) }}</td>
                                <td>
                                    <a href="{{ route('admin.transaksi.detail',Crypt::encrypt($item->id)) }}"
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