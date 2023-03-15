@extends('layout.base')
  
@section('tittle', 'Piket | Detail Murid')

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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{  route('murid.index')  }}">Murid</a></li>
                    <li class="breadcrumb-item active">Detail-Murid</li>
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
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
    
                    <h3 class="profile-username text-center">{{ $murid->nama }}</h3>
    
                    <p class="text-muted text-center">{{ $murid->kelas }} {{ $murid->jurusan['jurusan'] }}</p>
    
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>NISN</b> <a class="float-right">{{ $murid->nisn }}</a>
                        </li>
                        <li class="list-group-item">
                        <b>NIPD</b> <a class="float-right">{{ $murid->nipd }}</a>
                        </li>
                        <li class="list-group-item">
                        <b>Jenis Kelamin</b> <a class="float-right">
                            @if ($murid->jk == 'L')
                                Laki-laki
                            @else
                                Perempuan
                            @endif</a>
                        </li>
                    </ul>
                    <center>
                        <form action="{{ route('murid.destroy',$murid->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('murid.edit',$murid->id) }}" class="btn btn-primary"><b>Ubah Murid </b></a>
                            <button type="submit" class="btn btn-danger"><i class="fas fa-solid fa-trash"></i></button>
                        </form>
                        </center>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
    
                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title ">About</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
    
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> alamat</strong>
                        <br>
        
                        <p class="text-muted">
                            @if ($murid->alamat)
                                {{ $murid->alamat }}    
                            @else
                                -
                            @endif
                        </p>
        
                        <hr>
        
                        <strong><i class="fas fa-solid fa-phone"></i>  Nomer Telephone</strong>
        
                        <p class="text-muted">
                            @if ($murid->phone)
                                {{ $murid->phone }}    
                            @else
                                -
                            @endif
                        </p>
        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <div class="col-md-7 " id="accordion">
                @foreach ($listIzin as $izin)
                <div class="card
                @if ($izin->status == 'Selesai')
                card-success
                @elseif ($izin->status == 'Proses')
                card-info
                @elseif ($izin->status == 'kabur')
                card-danger
                @else
                card-warning
                @endif 
                card-outline">
                    <a class="d-block w-100" href="{{ route('izin.show', $izin->id) }}">
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
                    {{-- <div id="collapse{{ $izin->id }}" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <h6><strong>Status :</strong> <span class="badge badge-pill 
                                @if ($izin->status == 'Sudah Kembali')
                                badge-success
                                @elseif ($izin->status == 'Sudah Pulang')
                                badge-success
                                @elseif ($izin->status == 'Tanpa Keterangan')
                                badge-danger
                                @else
                                badge-warning
                                @endif
                                ">{{ $izin->status }}</span>
                            </h6>
                            <h6><strong>Piket :</strong> {{ $izin->piket->nama }}</h6>
                        </div>
                    </div> --}}
                </div>
                @endforeach
    
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
      
@endsection