@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
                <div class="card-header-action">
                    <a href="{{route('admin.siswa.tambah')}}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Siswa</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Kelas</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $item)
                            <tr>
                                <td></td>
                                @if($item->foto)
                                <td><img src="{{ asset('storage/'.$item->foto) }}" height="128">
                                @else
                                <td><img src="{{ asset('img/no_profile.jpg') }}" height="128">
                                @endif
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <?php
                                    $kelas = DB::table('transaksi')->select('transaksi.*', 'kelas.name_kelas')->join('kelas', 'transaksi.kelas_id', 'kelas.id')->where('transaksi.status', '1')->where('transaksi.users_id', $item->id)->get();
                                    if(count($kelas) > 0){
                                        echo '<ul>';
                                        foreach ($kelas as $key) {
                                            echo '<li>'.$key->name_kelas.'</li>';
                                        }
                                        echo '</ul>';
                                        }
                                    else {
                                        echo "Belum Ada Kelas";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="{{ route('admin.siswa.edit',Crypt::encrypt($item->id)) }}" class="btn btn-info">
                                        Edit 
                                    </a>
                                    <a href="javascript:void(0)" onclick="alertconfirmn('{{ route('admin.siswa.hapus',Crypt::encrypt($item->id)) }}')" class="btn btn-danger">
                                        Hapus 
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection