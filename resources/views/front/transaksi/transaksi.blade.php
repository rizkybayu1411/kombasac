@extends('layouts.front')
@section('content')

<!--::review_part start::-->
<section class="special_cource padding_top">
    <div class="container">
        <div class="row">
		    <div class="col-md-12">
		        <div class="card">
		            <div class="card-header">
		                <h4>Data Transaksi</h4>
		            </div>
		            <div class="card-body">
		                <div class="table-responsive">
		                    <table class="table align-items-center table-hover">
		                        <thead class="thead-light">
		                            <tr>
		                                <th>No</th>
		                                <th width="30%">Bukti Transfer</th>
		                                <th>Kelas</th>
		                                <th>Tanggal Bayar</th>
		                                <th>Status</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	@php $no = 1; @endphp
		                            @foreach ($transaksi as $item)
		                            <tr>
		                                <td>{{$no}}</td>
		                                <td><img src="{{ asset('storage/'.$item->bukti_transfer) }}" width="25%" alt="" srcset=""></td>
		                                <td>{{ $item->name_kelas }}</td>
		                                <td>{{ UserHelp::tgl_indo(substr($item->created_at,0,10)) }}</td>
		                                <td>
		                                    @if ($item->status == 0)
		                                    Menunggu Konfirmasi
		                                    @elseif($item->status == 1)
		                                    Disetujui
		                                    @else
		                                    Ditolak <br><a href="{{route('transaksi.filter.ulang',Crypt::encrypt($item->kelas_id))}}" class="btn_4">Upload Ulang</a>
		                                    @endif
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
    </div>
</section>