@extends('layouts.front')
@section('content')

<section class="course_details_area section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <a href="https://temubakat.com/id/index.php/main/disp/tes"><h2>Assement Minat Bakat</h2></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
            </div>
            <div class="col-md-6 mx-auto text-center">
            </div>
            <div class="col-md-6 mx-auto">
                <h4>Ikuti layanan assesment gratis untuk mengetahui pilihan digital marketing yang paling pas dengan dirimu</h4>                
                <a href="https://temubakat.com/id/index.php/main/disp/tes"><h2 type="submit" class="text-center btn_2">IKUTI TEST</h2></a>
                <form action="{{route('assementkirim')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group mt-3">
                        <input type="file" class="form-control" name="kirim_assement">
                        @error('kirim_assement')
                        <small class="mt-2 text-danger"> {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn_4">Kirim Hasil Test</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
<!--================ End Course Details Area =================-->
@endsection