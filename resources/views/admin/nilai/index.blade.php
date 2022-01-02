@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-hover" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Petugas Input</th>
                                <th>Kelas</th>
                                <th>Kirim Tugas</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilai as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->users->name }}</td>
                                <td>{{ $item->kelas->name_kelas}}</td>
                                <td>{{ $item->kirimtugas_id }}</td>
                                <td>{{ $item->nilai }}</td>  
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