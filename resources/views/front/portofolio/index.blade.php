@extends('layouts.front')
@section('content')

<!--::review_part start::-->
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2>Portofolio</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($portofolio as $item)
            <div class="col-sm-6 col-lg-4 mb-2">
                <a href="#">
                    <div class="single_special_cource">
                        <img src="{{ asset('storage/' . $item->portofolio_image) }}" class="special_img" alt="">
                        <div class="special_cource_text">
                            <div class="d-flex justify-content-between">
                                <a href="#"
                                    class="btn btn-secondary">Lihat</a>
                            </div>
                            <div style="white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;">{!! $item->description_kelas !!}</div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection