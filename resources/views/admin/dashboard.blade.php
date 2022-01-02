@extends('layouts.admin')
@section('content')
<div class="hero bg-primary text-white">
    <div class="hero-inner">
      <h2>Selamat Datang {{ Auth::user()->name }}</h2>
      <p class="lead">Di aplikasi Akademi Kombas</p>
    </div>
  </div>
@endsection