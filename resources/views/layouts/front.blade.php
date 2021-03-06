<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kombas Academy</title>
    <link rel="icon" href="{{ asset('frontemplate') }}/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontemplate/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontemplate/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontemplate/css/owl.carousel.min.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ asset('frontemplate/css/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('frontemplate/css/flaticon.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontemplate/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('frontemplate/css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('frontemplate/css/style.css') }}">

    <link href="{{ asset('swal/dist/sweetalert2.min.css') }}" rel="stylesheet">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a href="#" class="logo" >
                            <img src="{{asset('img/banner_img.png')}}">
                        </a>                
                        <p><a class="navbar-brand" href="{{ route('welcome') }}"> Kombas Academy </a></p>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('kelas') }}">Kelas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('portofolio') }}">Portofolio</a>
                                </li>
                                @guest
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="{{ route('login') }}">Masuk</a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('jurnal') }}">Jurnal</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="btn_1" href="#" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Hi {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('akun') }}">Akun</a>
                                        <a class="dropdown-item" href="{{ route('transaksi') }}">Transaksi</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->
    @yield('content')


    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{ asset('frontemplate') }}/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="{{ asset('frontemplate') }}/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('frontemplate') }}/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="{{ asset('frontemplate') }}/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="{{ asset('frontemplate') }}/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="{{ asset('frontemplate') }}/js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="{{ asset('frontemplate') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontemplate') }}/js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="{{ asset('frontemplate') }}/js/slick.min.js"></script>
    <script src="{{ asset('frontemplate') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('frontemplate') }}/js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="{{ asset('frontemplate') }}/js/custom.js"></script>
    <script src="{{ asset('swal/dist/sweetalert2.min.js') }}"></script>
    @if(session('status'))
    <script type="text/javascript">
        Swal.fire({
      title: 'Sukses ...',
      icon: 'success',
      text: '{{ session("status") }}',
      showClass: {
        popup: 'animated bounceInDown slow'
      },
      hideClass: {
        popup: 'animated bounceOutDown slow'
      }
    })
    </script>
    @endif
</body>

</html>