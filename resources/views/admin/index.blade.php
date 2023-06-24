@extends('layouts.backend.app',[
	'title' => 'Dashboard',
	'contentTitle' => 'Dashboard',
])
@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/dist/css/adminlte.min.css?v=3.2.0">
<!-- Small boxes (Stat box) -->
@can('role',['admin'])
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>@count('users')</h3>

        <p>Admin</p>
      </div>
      <div class="icon">
        <i class="fas fa-user-tie"></i>
      </div>
      <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endcan
  <!-- ./col -->
  @can('role',['admin'])
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>@count('data_sampah')</h3>

        <p>Data Sampah</p>
      </div>
      <div class="icon">
        <i class="fas fa-image"></i>
      </div>
      <a href="{{ route('admin.data_sampah.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endcan
  <!-- ./col -->
  @can('role',['admin'])
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>@count('pengumuman')</h3>

        <p>Pengumuman</p>
      </div>
      <div class="icon">
        <i class="fas fa-info"></i>
      </div>
      <a href="{{ route('admin.pengumuman.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endcan
  <!-- ./col -->
  @can('role',['admin'])
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>@count('data_transaksi')</h3>

        <p>Data Transaksi</p>
      </div>
      <div class="icon">
        <i class="fas fa-list"></i>
      </div>
      <a href="{{ route('admin.data_transaksi.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  @endcan
  <!-- ./col -->
  @can('role',['admin'])
<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3>@count('galeri')</h3>

      <p>galeri</p>
    </div>
    <div class="icon">
      <i class="fas fa-image"></i>
    </div>
    <a href="{{ route('admin.galeri.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
  </div>
  @endcan

<!-- /.row --> 
@endsection