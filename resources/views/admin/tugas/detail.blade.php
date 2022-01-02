@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td class="px-2 py-1">:</td>
                                <td>{{ $kirimtugas1->users->name }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <tr>
                            <td>Tugas Yang di setorkan</td>
                            <td class="px-2 py-1">:</td>
                        </tr>
                        <tr>
                        <li class="justify-content-between align-items-center d-flex">
                            {{-- <a href="{{route('download.kirim',$kirimtugas1->id)}}" style="color: #1556D5;">{{ $kirimtugas1->kirim_tugas }}</a>                 --}}
                            <td>( Jika Ingin Di Download )</td>
                        </li>
                    </tr>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('admin.tugas.nilai',Crypt::encrypt($kirimtugas1->id)) }}" method="POST">
                            {{ csrf_field() }}
                                {{ method_field('post') }}
                                <div class="form-group" width="300" height="300">
                                    <label for="">Nama File Tugas</label>
                                    <input type="hidden" name="kelas_id" value="{{ $kirimtugas1->kelas_id }}">
                                    <input type="text" id="nama" name="nama" class="form-control @error('kirimtugas_id') is-invalid @enderror" value="{{ $kirimtugas1->kirim_tugas }}">
                                    @error('kirimtugas_id')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>    
                            <div class="form-group" width="300" height="300">
                                <label for="">Keterangan Tugas</label>
                                <input type="text" id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="">
                                @error('keterangan')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group"width="300" height="300">
                                <label for="">Nilai</label>
                                <input type="number" id="nilai" name="nilai" class="form-control @error('nilai') is-invalid @enderror" value="">
                                @error('nilai')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success">Simpan</button><p></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection