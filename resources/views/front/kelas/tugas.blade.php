@extends('layouts.front')
@section('content')
<body>
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <h2>Tugas {{ $kelas->name_kelas }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <!-- <img class="img-fluid" src="img/single_cource.png" alt=""> -->
                    </div>
                    <div class="col-lg-8 course_details_left">
                        <div class="main_image">
                            <!-- <img class="img-fluid" src="img/single_cource.png" alt=""> -->
                        </div>
                        <div class="content_wrapper">
                            <h4 class="title">Penugasan :</h4>
                            <div class="content">
                                <ul class="course_list">
                                    @if ($kelas->tugas->count() < 1) <li
                                        class="justify-content-between align-items-center d-flex">
                                        <p>Belum Ada tugas</p>
                                        </li>
                                        @else
                                        @foreach ($kelas->tugas as $item)
                                        <li class="justify-content-between align-items-center d-flex">
                                            {{$item->judul}}<br>
                                            Deskripsi : {{$item->deskripsi}}<br>
                                            <a href="{{route('kelas.tugas.download',$item->id)}}" style="color: #1556D5;">{{ $item->upload_tugas }}</a>                
                                        </li>
                                        @endforeach
                                        @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>Kelas</p>
                                    <span class="color">{{ $kelas->name_kelas }}</span>
                                </a>
                            </li>
                            <form action="{{ route('upload') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="kelas_id" value="{{$kelas->id}}">
                            <li>
                                <div>
                                    <p class="mb-2">Pilih Tugas</p>
                                </div>
                                <div class="form-group mt-3">
                                    <select class="form-control" name="tugas_id" id="tugas_id" required="">
                                        <option value="">Pilih Tugas</option>
                                        @foreach($tugas as $item)
                                        <option value="{{$item->id}}">{{$item->judul}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p class="mb-2">Upload Tugas</p>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="file" class="form-control" name="kirim_tugas">
                                    @error('kirim_tugas')
                                    <small class="mt-2 text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                                <div>
                                    <p class="mb-2">Example name: (tugas_materi_kelas.pdf)</p>
                                </div>
                                    <button type="submit" class="btn btn-info text-white mb-3 btn-block">Kirim</button>
                            </li>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!--================ End Course Details Area =================-->
@endsection