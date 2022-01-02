<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ Auth::user()->name }} - {{$title}}</title>
    <link rel="icon" href="{{ asset('frontemplate') }}/img/favicon.png">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('admintemplate') }}/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ asset('swal/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admintemplate') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('admintemplate') }}/css/components.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('admintemplate/') }}/img/avatar/avatar-1.png"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a href="#"  class="dropdown-item"><i class="fas fa-user"></i> Edit Profil</a>
                            <a href="{{ route('admin.editkatasandi') }}"  class="dropdown-item"><i class="fas fa-key"></i> Ubah Katasandi</a>
                            <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ route('admin') }}">Kombas Academy</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ route('admin') }}">KA</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu Administrator</li>
                        <li class="{{Request::path() == 'admin' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('admin') }}">
                                <i class="fa fa-home"></i><span>Dashboard</span>
                            </a>
                        </li>
                        {{-- @can('portofolio') --}}
                        <li class="nav-item dropdown @if(Request::segment(2) == 'siswa' || Request::segment(2) == 'portofolio' || Request::segment(2) == 'absensi') active @endif">
                            <a href="#" class="nav-link has-dropdown"><i
                                class="fas fa-book"></i><span>Siswa</span></a>
                            <ul class="dropdown-menu">
                                <li class="@if(Request::segment(2) == 'siswa') active @endif"><a class="nav-link" href="{{ route('admin.siswa') }}">Data Siswa</a></li>
                                {{-- @can('portofolio') --}}
                                <li class="@if(Request::segment(2) == 'portofolio') active @endif"><a class="nav-link" href="{{ route('admin.portofolio') }}">Portofolio</a></li>
                                {{-- @endcan --}}
                                {{-- @can('absensi') --}}
                                <li class="@if(Request::segment(2) == 'absensi') active @endif"><a class="nav-link" href="{{ route('tampil-data') }}">Absensi</a></li>
                            </ul>
                        </li>
                        {{-- @endcan --}}
                        {{-- @can('nilai') --}}
                        <li class="nav-item dropdown @if(Request::segment(2) == 'kelas' || Request::segment(2) == 'tugas' || Request::segment(2) == 'nilai') active @endif">
                            <a href="#" class="nav-link has-dropdown"><i
                                class="fas fa-university"></i><span>Kelas</span></a>
                            <ul class="dropdown-menu">
                                {{-- @can('materi') --}}
                                <li class="@if(Request::segment(2) == 'kelas') active @endif"><a class="nav-link" href="{{ route('admin.kelas') }}">Pembelajaran</a></li>
                                {{-- @endcan --}}
                                {{-- @can('tugas') --}}
                                <li class="@if(Request::segment(2) == 'tugas') active @endif"><a class="nav-link" href="{{ route('admin.tugas') }}">Pengumpulan Tugas</a></li>
                                {{-- @endcan --}}
                                {{-- @can('nilai') --}}
                                <li class="@if(Request::segment(2) == 'nilai') active @endif"><a class="nav-link" href="{{ route('admin.nilai') }}">Penilaian</a></li>
                                {{-- @endcan --}}
                            </ul>
                        </li>
                        {{-- @endcan --}}
                        {{-- @can('kelas') --}}
                        <li class="nav-item dropdown @if(Request::segment(2) == 'transaksi' || Request::segment(2) == 'rekening') active @endif">
                            <a href="#" class="nav-link has-dropdown"><i
                                    class="fas fa-fire"></i><span>Transaksi</span></a>
                            <ul class="dropdown-menu">
                                <li class="@if(Request::segment(2) == 'rekening') active @endif"><a class="nav-link" href="{{ route('admin.rekening') }}">Rekening</a></li>
                                <li class="@if(Request::segment(2) == 'transaksi' AND Request::segment(2) == '') active @endif"><a class="nav-link" href="{{ route('admin.transaksi') }}">Semua Transaksi</a></li>
                                <li class="@if(Request::segment(3) == 'menunggu') active @endif"><a class="nav-link" href="{{ route('admin.transaksi.menunggu') }}">Menunggu Konfirmasi</a>
                                </li>
                                <li class="@if(Request::segment(3) == 'ditolak') active @endif"><a class="nav-link" href="{{ route('admin.transaksi.ditolak') }}">Ditolak</a></li>
                                <li class="@if(Request::segment(3) == 'disetujui') active @endif"><a class="nav-link"
                                 href="{{ route('admin.transaksi.disetujui') }}">Disetujui</a></li>
                            </ul>
                        </li>
                        {{-- @endcan --}}
                        {{-- @can('pengaturan') --}}
                        <li class="nav-item dropdown @if(Request::segment(2) == 'user') active @endif">
                            <a href="#" class="nav-link has-dropdown"><i
                                    class="fas fa-tachometer-alt"></i><span>Pengaturan</span></a>
                            <ul class="dropdown-menu">
                                <li class="@if(Request::segment(2) == 'user') active @endif"><a class="nav-link" href="{{ route('admin.user') }}">User</a></li>
                                <!-- <li><a class="nav-link" href="{{ route('admin.setting') }}">Berbayar</a></li> -->
                            </ul>
                        </li>
                        {{-- @endcan --}}
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">    
                        <h1>{{$title}}</h1>
                    </div>

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>

    <script src="{{ asset('swal/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admintemplate') }}/datatables/jquery.dataTables.min.js"></script>

    <script src="{{ asset('admintemplate') }}/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admintemplate') }}/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('admintemplate') }}/js/scripts.js"></script>
    <script src="{{ asset('admintemplate') }}/js/custom.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
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
    <script>
        $(() => {
          $('#btn-back').on('click', () => {
            window.history.back();
          });

          $('#btn-submit').on('click', () => {
            $('#btn-submit').addClass('btn-progress disabled');
          });
          var t = $('#table').DataTable({
            "columnDefs": [{
              "searchable": false,
              "orderable": false,
              "targets": 0
            }],
            "order": [
              [1, 'asc']
            ],
            "language": {
              "sProcessing": "Sedang memproses ...",
              "lengthMenu": "Tampilkan _MENU_ data per halaman",
              "zeroRecord": "Maaf data tidak tersedia",
              "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
              "infoEmpty": "Tidak ada data yang tersedia",
              "infoFiltered": "(difilter dari _MAX_ total data)",
              "sSearch": "Cari",
              "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
              }
            }
          });
          t.on('order.dt search.dt', function() {
            t.column(0, {
              search: 'applied',
              order: 'applied'
            }).nodes().each(function(cell, i) {
              cell.innerHTML = i + 1;
            });
          }).draw();

          var t2 = $('#table2').DataTable({
            "columnDefs": [{
              "searchable": false,
              "orderable": false,
              "targets": 0
            }],
            "order": [
              [1, 'asc']
            ],
            "language": {
              "sProcessing": "Sedang memproses ...",
              "lengthMenu": "Tampilkan _MENU_ data per halaman",
              "zeroRecord": "Maaf data tidak tersedia",
              "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
              "infoEmpty": "Tidak ada data yang tersedia",
              "infoFiltered": "(difilter dari _MAX_ total data)",
              "sSearch": "Cari",
              "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
              }
            }
          });
          t2.on('order.dt search.dt', function() {
            t2.column(0, {
              search: 'applied',
              order: 'applied'
            }).nodes().each(function(cell, i) {
              cell.innerHTML = i + 1;
            });
          }).draw();

          var t3 = $('#table3').DataTable({
            "columnDefs": [{
              "searchable": false,
              "orderable": false,
              "targets": 0
            }],
            "order": [
              [1, 'asc']
            ],
            "language": {
              "sProcessing": "Sedang memproses ...",
              "lengthMenu": "Tampilkan _MENU_ data per halaman",
              "zeroRecord": "Maaf data tidak tersedia",
              "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
              "infoEmpty": "Tidak ada data yang tersedia",
              "infoFiltered": "(difilter dari _MAX_ total data)",
              "sSearch": "Cari",
              "oPaginate": {
                "sFirst": "Pertama",
                "sPrevious": "Sebelumnya",
                "sNext": "Selanjutnya",
                "sLast": "Terakhir"
              }
            }
          });
          t3.on('order.dt search.dt', function() {
            t3.column(0, {
              search: 'applied',
              order: 'applied'
            }).nodes().each(function(cell, i) {
              cell.innerHTML = i + 1;
            });
          }).draw();
        })
    </script>
    <script>
        const alertconfirmn = (url) => {
                const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger mr-2'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Yakin ingin menghapus ?',
            text: "Data yang dihapus tidak dapat dikembalikan kembali !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus !',
            cancelButtonText: 'Tidak, Batalkan !',
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                window.location.replace(url);
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Dibatalkan',
                'Data kamu tidak jadi dihapus :)',
                'error'
                )
            }
            })
  }
    </script>
    @yield('js')
    <!-- Page Specific JS File -->
</body>

</html>