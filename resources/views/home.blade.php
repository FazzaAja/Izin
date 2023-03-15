@extends('template.base')

@section('tittle', 'Izin SMKN 4 Tsm')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-md-6">
            <h1 class="m-0">Data Izin <br><small>SMKN 4 Tasikmalaya</small></h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
            <div class="col-md-12 " id="accordion">
              @if (count($listIzin) > 0)
              
                @foreach ($listIzin as $izin)
                <div class="card
                @if ($izin->status == 'Sudah Kembali')
                card-success
                @elseif ($izin->status == 'Sudah Pulang')
                card-success
                @elseif ($izin->status == 'Tanpa Keterangan')
                card-danger
                @else
                card-warning
                @endif 
                card-outline">
                    <a class="d-block w-100" href="{{ route('show', $izin->id) }}">
                        <div class="card-header">
                            <h5 class="card-title w-100 text-dark">
                              <div class="float-right"><strong>{{ $izin->created_at->format('H:i') }}</strong></div>  <li>{{ ucwords(strtolower($izin->murid->nama)) }}</li> 
                            </h5>
                            <br>
                            <h5 class="card-title w-100 text-dark"><li><strong>Alasan :</strong> {{ $izin->alasan }}</li></h5>
                            <br>
                            <h5 class="card-title w-100">
                                {{ $izin->created_at->translatedFormat('l, d F Y') }} <div class="float-right"></div>
                            </h5>
                        </div>
                    </a>
                </div>
                
                @endforeach

                {!! $listIzin->withQueryString()->links('pagination::bootstrap-5') !!}

              @else

              <div class="card bg-gradient-secondary">
                <div class="card-header">
                    <center>
                        <h5 class="card-title w-100 mt-3 mb-3">
                            Belum ada izin yang dilakukan
                        </h5>
                    </center>
                </div>
              </div>
                
              @endif

    
            </div>
              <!-- /.col -->
          
          <!-- /.col-->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    {{-- <div class="float-right d-none d-sm-inline">Anything you want</div> --}}
    <!-- Default to the left -->
    <center>
      <strong
        >Copyright <sup style=>&copy;</sup>
        <a href="https://www.instagram.com/dvethree_4/">DVTHREE 4</a>.</strong
      >
      All rights reserved.
    </center>
</footer>
    
@endsection