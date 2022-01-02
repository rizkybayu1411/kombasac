@extends('layouts.front')
@section('content')

<section class="course_details_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2>Pembelian Kelas</h2>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 mx-auto">
                <h4>Silahkan transfer ulang sebesar {{ UserHelp::rupiah($kelas->biaya_kelas) }} untuk mendapatkan akses <b>{{$kelas->name_kelas}}</b>  ke salah satu no rekening di bawah ini</h4>

                <ul>
                    @foreach ($rekening as $item)
                    <li>{{ $item->nama_bank }} - {{ $item->no_rekening }} a.n <b>{{ $item->atas_nama }}</b></li>
                    @endforeach
                </ul>
                <form action="{{ route('uploadulang') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="kelas_id" value="{{Crypt::encrypt($kelas->id)}}">
                    <div class="form-group mt-3">
                        <label for="">Upload bukti transfer</label>
                        <input type="file" class="form-control" name="bukti">
                        @error('bukti')
                        <small class="mt-2 text-danger"> {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn_4">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================ End Course Details Area =================-->
@endsection