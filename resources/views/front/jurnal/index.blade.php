@extends('layouts.front')
@section('content')

<!--::review_part start::-->
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2>Jurnal Harian</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('jurnal-simpan') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ Auth::user()->tanggal }}">
                                @error('tanggal')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Kegiatan</label>
                                <input type="text" name="kegiatan" class="form-control @error('kegiatan') is-invalid @enderror" value="{{ Auth::user()->kegiatan }}">
                                @error('kegiatan')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-info">Setorkan</button>
                            </div>
                        </form>    
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center table-hover" id="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>User</th>
                                            <th>Tanggal </th>
                                            <th>Kegiatan</th>
                                            {{-- <th width="10%">Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jurnal as $item)
                                        <tr>
                                            <td>{{ $item->users_id }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->kegiatan }}</td>
                                            {{-- <form action="#" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td>
                                                <a>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </a>    
                                                </td>
                                            </form>   --}}
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
    </div>
</section>

@endsection