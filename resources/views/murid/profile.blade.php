@extends('template.base')

@section('tittle', 'Izin '.ucwords(strtolower(auth('murid')->user()->nama)))

@section('content')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Detail Murid</h1>
                @if ($message = Session::get('successEdit'))
                    <div id="editMurid"></div>
                @endif
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
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
              <div class="col-md-5">
                <!-- Profile Image -->
                <div class="card card-primary">
                    <div class="card-header">
                    </div>
                    <div class="card-body box-profile">
    
                    <h3 class="profile-username text-center">{{ ucwords(strtolower(auth('murid')->user()->nama)) }}</h3>
    
                    <p class="text-muted text-center">{{ auth('murid')->user()->kelas }} {{ auth('murid')->user()->jurusan['jurusan'] }}</p>
    
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>NISN</b> <a class="float-right">{{ auth('murid')->user()->nisn }}</a>
                        </li>
                        <li class="list-group-item">
                        <b>NIPD</b> <a class="float-right">{{ auth('murid')->user()->nipd }}</a>
                        </li>
                        <li class="list-group-item">
                        <b>Jenis Kelamin</b> <a class="float-right">
                            @if (auth('murid')->user()->jk == 'L')
                                Laki-laki
                            @else
                                Perempuan
                            @endif</a>
                        </li>
                    </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
    
              </div>
              <div class="col-md-7 " id="accordion">
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
                            <a class="d-block w-100" href="{{ route('detail', $izin->id) }}">
                                <div class="card-header">
                                    <h5 class="card-title w-100">
                                        {{ $izin->created_at->translatedFormat('l, d F Y') }} <div class="float-right">{{ $izin->created_at->format('H:i') }}</div>
                                    </h5>
                                    <br><br>
                                    <h5 class="card-title w-100">
                                        <strong>Alasan :</strong> {{ $izin->alasan }} <div class="float-right"></div>
                                    </h5>
                                </div>
                            </a>
                        </div>
                    @endforeach
    
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
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

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