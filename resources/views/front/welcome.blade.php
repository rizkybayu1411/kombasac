@extends('layouts.front')
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Akademi Kombas</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('jobest') }}/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('jobest') }}/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('jobest') }}/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('jobest') }}/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="{{ asset('jobest') }}/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="{{ asset('jobest') }}/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('jobest') }}/assets/css/theme.css" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <!-- banner part start-->
<section class="py-0" id="home">
    <div class="bg-holder d-none d-sm-block" style="background-image:url({{ asset('jobest') }}/assets/img/illustrations/hero-bg.png);background-position:right top;background-size:contain;">
    </div>
    <!--/.bg-holder-->

    <div class="bg-holder d-sm-none" style="background-image:url({{ asset('jobest') }}/assets/img/illustrations/hero-bg.png);background-position:right top;background-size:contain;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
      <div class="row align-items-center min-vh-75 min-vh-md-100">
        <div class="col-md-7 col-lg-6 py-6 text-sm-start text-center">
          <h1 class="mt-6 mb-sm-4 display-2 fw-semi-bold lh-sm fs-4 fs-lg-6 fs-xxl-8">Akademi Kombas <br class="d-block d-lg-none d-xl-block" /></h1>
          <p class="mb-4 fs-1">Pilih materi belajar sesuai dengan kebutuhanmu untuk mendapatkan hasil paling optimal untuk karir digitalmu.  Maka ini saatnya untuk memulai belajar digital marketing.</p>
          <div class="pt-3">
            <a href="{{ route('kelas') }}" class="btn btn-lg btn-primary rounded-pill bg-gradient order-0">Belajar Sekarang</a>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- banner part start-->

<!-- feature_part start-->
<section class="py-5">
    <div class="bg-holder d-none d-sm-block" style="background-image:url({{ asset('jobest') }}/assets/img/illustrations/category-bg.png);background-position:right top;background-size:200px 320px;">
    </div>
    <!--/.bg-holder-->
    <div class="container">
      <div class="row flex-center h-100">
        <div class="col-10 col-xl-9">
          <div class="row">
            <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
              <div class="card py-4 shadow-sm h-100 hover-top">
                <div class="text-center"> <img src="{{ asset('jobest') }}/assets/img/illustrations/finance.png" height="120" alt="" />
                  <div class="card-body px-2">
                    <p class="mb-0 card-text">Materi selalu update sesuai dengan perubahan</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
              <div class="card py-4 shadow-sm h-100 hover-top">
                <div class="text-center"> <img src="{{ asset('jobest') }}/assets/img/illustrations/design.png" height="120" alt="" />
                  <div class="card-body px-2">
                    <p class="mb-0 card-text">Pembelajaran live dan modul lengkap</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
              <div class="card py-4 shadow-sm h-100 hover-top">
                <div class="text-center"> <img src="{{ asset('jobest') }}/assets/img/illustrations/production.png" height="120" alt="" />
                  <div class="card-body px-2">
                    <p class="mb-0 card-text">Terdapat program penyaluran tenaga kerja dan wirausaha</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- upcoming_event part start-->

<!-- learning part start-->
<section class="py-8">

    <div class="container">
      <div class="row flex-center">
        <div class="col-md-5 order-md-1 text-center text-md-end"><img class="img-fluid mb-4" src="{{ asset('jobest') }}/assets/img/illustrations/jobs.png" width="450" alt="" /></div>
        <div class="col-md-5 text-center text-md-start">
          <h6 class="fw-bold fs-2 fs-lg-3 display-3 lh-sm">Mentor adalah <br> praktisi digital marketing</h6>
        </div>
      </div>
    </div>
</section>
<!-- learning part end-->

<section class="py-5">
    <div class="bg-holder" style="background-image:url({{ asset('jobest') }}/assets/img/illustrations/bg.png);background-position:left top;background-size:initial;margin-top:-180px;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
      <div class="row flex-center">
        <div class="col-md-5 order-md-0 text-center text-md-start"><img class="img-fluid mb-4" src="{{ asset('jobest') }}/assets/img/illustrations/passion.png" width="450" alt="" /></div>
        <div class="col-md-5 text-center text-md-start">
          <h6 class="mt-6 mb-sm-4 display-2 fw-semi-bold lh-sm fs-4 fs-lg-6 fs-xxl-8">Tempat Belajar Digital Marketing Paling Asyik</h6>
          <p class="mb-4 fs-1">Ketika digital marketing menjadi skill kunci untuk bertahan di era pandemi seperti sekarang ini. Ikuti layanan assesment gratis untuk mengetahui pilihan digital marketing yang paling pas dengan dirimu.</p>
          <a href="{{route('assement')}}" class="btn btn-lg btn-primary rounded-pill bg-gradient order-0">Assement Minat Bakat</a>
        </div>
      </div>
    </div>
  </section>

<!--::review_part start::-->
<section class="py-5">
    <div class="bg-holder d-none d-sm-block" style="background-image:url({{ asset('jobest') }}/assets/img/illustrations/category-bg.png);background-position:right top;background-size:200px 320px;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9 col-lg-6 text-center mb-3">
          <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Program Pendidikan</h5>
        </div>
      </div>
      <div class="row flex-center h-100">
        <div class="col-10 col-xl-9">
          <div class="row">
            <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
              <div class="card py-4 shadow-sm h-100 hover-top">
                <div class="text-center"> <img src="{{ asset('jobest') }}/assets/img/illustrations/programmer.png" height="120" alt="" />
                  <div class="card-body px-2">
                    <h6 class="fw-bold fs-1 heading-color">KELAS PKL ONLINE</h6>
                    <p class="mb-0 card-text">Layanan pendidikan PKL untuk SMK yang dilakukan dengan sistem online/daring</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
              <div class="card py-4 shadow-sm h-100 hover-top">
                <div class="text-center"> <img src="{{ asset('jobest') }}/assets/img/illustrations/design.png" height="120" alt="" />
                  <div class="card-body px-2">
                    <h6 class="fw-bold fs-1 heading-color">KELAS INDUSTRI SMK</h6>
                    <p class="mb-0 card-text">Merupakan program kontribusi PT Kombas Digital Internasional melalui Akademi Kombas untuk turut mengajar siswa SMK di sekolah.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
              <div class="card py-4 shadow-sm h-100 hover-top">
                <div class="text-center"> <img src="{{ asset('jobest') }}/assets/img/illustrations/finance.png" height="120" alt="" />
                  <div class="card-body px-2">
                    <h6 class="fw-bold fs-1 heading-color">KELAS MAGANG GURU</h6>
                    <p class="mb-0 card-text">Program pendidikan magang bidang digital marketing bagi guru SMK jurusan produktif.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
              <div class="card py-4 shadow-sm h-100 hover-top">
                <div class="text-center"> <img src="{{ asset('jobest') }}/assets/img/illustrations/education.png" height="120" alt="" />
                  <div class="card-body px-2">
                    <h6 class="fw-bold fs-1 heading-color">KELAS WIRAUSAHA</h6>
                    <p class="mb-0 card-text">Sebuah program pendidikan untuk mempersiapkan siswa menjadi pebisnis online yang handal.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
              <div class="card py-4 shadow-sm h-100 hover-top">
                <div class="text-center"> <img src="{{ asset('jobest') }}/assets/img/illustrations/production.png" height="120" alt="" />
                  <div class="card-body px-2">
                    <h6 class="fw-bold fs-1 heading-color">KELAS KOMUNITAS</h6>
                    <p class="mb-0 card-text">Program pendidikan digital marketing untuk komunitas-komunitas di masyarakat.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
              <div class="card py-4 shadow-sm h-100 hover-top">
                <div class="text-center"> <img src="{{ asset('jobest') }}/assets/img/illustrations/consultancy.png" height="120" alt="" />
                  <div class="card-body px-2">
                    <h6 class="fw-bold fs-1 heading-color">UJI KOMPETENSI KEAHLIAN (UKK)</h6>
                    <p class="mb-0 card-text">Program untuk menguji sejauh mana pemahaman tentang digital marketing untuk siswa SMK.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- <section> close ============================-->
  <!-- ============================================-->
  <section class="py-0"><img class="w-100" src="{{ asset('jobest') }}/assets/img/illustrations/come-on-join.png" alt="" />
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 text-center">
          <h6 class="fw-bold fs-3 fs-lg-5 lh-sm">Siap Bertumbuh Bersama Akademi Kombas?</h6>
        </div>
      </div>
    </div>
  </section>
      
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('jobest') }}/vendors/@popperjs/popper.min.js"></script>
    <script src="{{ asset('jobest') }}/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="{{ asset('jobest') }}/vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('jobest') }}/assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap" rel="stylesheet">
  </body>

</html>