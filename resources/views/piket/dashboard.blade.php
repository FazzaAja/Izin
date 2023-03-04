@extends('layout.base')

@section('tittle', 'Piket | Dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              @auth('piket')
                  <p>Selamat datang, {{ ucwords(strtolower(auth('piket')->user()->nama)) }}</p>
              @endauth
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $listIzin->count() }}</h3>
                  <p>Banyak Izin</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-book"></i>
                </div>
                <a href="{{ route('izin.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>?<sup style="font-size: 20px">%</sup></h3>
  
                  <p>Terlambat</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-solid fa-clock"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $listPiket->count() }}</h3>
  
                  <p>Para Piket</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-solid fa-user"></i>
                </div>
                <a href="{{ route('piket.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $listMurid->count() }}</h3>
  
                  <p>Murid-murid</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-solid fa-users"></i>
                </div>
                <a href="{{ route('murid.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </div>
    </section>
      
</div>
@endsection