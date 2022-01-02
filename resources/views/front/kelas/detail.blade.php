@extends('layouts.front')
@section('content')

<head>
    
    <script src="{{asset('js/jam.js')}}"></script>
    <style>
      #watch {
        color: rgb(252, 150, 65);
        position: absolute;
        z-index: 1;
        height: 40px;
        width: 700px;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;font-size: 10vw;
        -webkit-text-stroke: 3px rgb(210, 65, 36);
        text-shadow: 4px 4px 10px rgba(210, 65, 36, 0.4),
        4px 4px 20px rgba(210, 65, 36, 0.4),
        4px 4px 30px rgba(210, 65, 36, 0.4),
        4px 4px 40px rgba(210, 65, 36, 0.4);
        
      }
    </style>
</head>
<body onload="realtimeClock()">

<section class="course_details_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 course_details_left">
                <div class="main_image">
                    <img class="img-fluid" src="img/single_cource.png" alt="">
                </div>
                <div class="content_wrapper">
                    <img src="{{ asset('storage/'.$kelas->thumbnail) }}" width="300" alt="">
                    <h4 class="title_top">{{ $kelas->name_kelas }}</h4>
                    <div class="content">
                        {!! $kelas->description_kelas !!}
                    </div>
                    @if($peserta)
                    <h4 class="title">Daftar Materi</h4>
                    <div class="content">
                        <ul class="course_list">
                            @if ($kelas->video->count() < 1) <li
                                class="justify-content-between align-items-center d-flex">
                                <p>Belum Ada Materi</p>
                                </li>
                                @else
                                @foreach ($kelas->video as $item)
                                <li class="justify-content-between align-items-center d-flex">
                                    <p>{{ $item->name_video }}</p>
                                </li>
                                @endforeach
                                @endif
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="col-lg-4 right-contents">
                @if($peserta)
                <div class="sidebar_top">
                    <ul>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Presensi</p>
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('simpan-masuk',Crypt::encrypt($kelas->id)) }}" method="post">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                    <center>
                                        <label id="clock" style="font-size: 60px; color:   #659980; -webkit-text-stroke: 3px #02C39A;
                                        text-shadow: 4px 4px 10px #CDE481,
                                        4px 4px 20px rgba(210, 45, 26, 0.4),
                                        4px 4px 30px rgba(210, 45, 26, 0.4),
                                        4px 4px 40px rgba(210, 45, 26, 0.4);">
                                        </label>
                                    </center>
                                    </div>
                                    <center>
                                        <div class="form-group">
                                            <button type="submit" class="btn_1">Klik untuk presensi Masuk</button>
                                        </div>
                                    </center>
                            </form>
                            <form action="{{ route('simpan-keluar',Crypt::encrypt($kelas->id)) }}" method="post">
                                {{ csrf_field() }}
                                    <center>
                                        <div class="form-group">
                                            <button type="submit" class="btn_1">Klik untuk presensi Keluar</button>
                                        </div>
                                    </center>
                            </form>
                        </li>
                    </ul>
                </div>
                @endif
                <div class="sidebar_top">
                    @if($peserta)
                    @else
                    <ul>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>INFORMASI</p>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Kelas</p>
                                <span class="color">{{ $kelas->name_kelas }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Biaya Kelas </p>
                                <span>
                                    {{UserHelp::rupiah($kelas->biaya_kelas)}}
                                </span>
                            </a>
                        </li>
                    </ul>
                    @endif
                    @if($peserta)
                        @if ($kelas->video->count() > 0)
                            @if ($kelas->type_kelas == 0)
                            <a href="{{ route('kelas.belajar',[
                                'id' => Crypt::encrypt($kelas->id),
                                'idvideo' => Crypt::encrypt($kelas->video[0]->id)
                            ]) }}" class="btn_1 d-block">Belajar</a>
                            @endif
                            @if ($kelas->type_kelas == 0)
                            <a href="{{ route('kelas.tugas',[
                                'id' => Crypt::encrypt($kelas->id)
                            ]) }}" class="btn_1 d-block">Tugas</a>
                            @endif
                            <?php
                            $kirimtugas = DB::table('kirimtugas')->where('kelas_id', $kelas->id)->where('users_id', Auth::user()->id)->count();
                            $tugas = DB::table('tugas')->where('kelas_id', $kelas->id)->count();
                            ?>
                            @if ($kirimtugas == $tugas)
                            <?php 
                            $nilai = 0;
                            $kirimtugas = DB::table('kirimtugas')->where('kelas_id', $kelas->id)->where('users_id', Auth::user()->id)->get();
                            foreach ($kirimtugas as $key) {
                                $nilai_db = DB::table('nilais')->where('kirimtugas_id', $key->id)->first();
                                if($nilai_db){
                                    $nilai++;
                                }
                            }
                            ?>
                            @if($tugas == $nilai)
                            <a href="{{ route('kelas.sertifikat',['idkelas' => Crypt::encrypt($kelas->id)]) }}" target="_blank"class="btn_1 d-block">Sertifikat</a>
                            @endif
                            @endif
                        @else
                            Belum Ada Materi Pada Kelas Ini
                        @endif
                    @else
                    <a href="{{route('transaksi.filter',Crypt::encrypt($kelas->id))}}" class="btn btn-lg btn-primary rounded-pill bg-gradient order-0">Beli Kelas</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<!--================ End Course Details Area =================-->
@endsection