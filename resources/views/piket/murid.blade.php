@extends('layout.base') 

@section('tittle', 'Piket | Data Murid')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Murid</h1>
          
          @if ($message = Session::get('success'))
           <div id="addMurid"></div>
          @endif
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Murid</li>
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
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table Murid</h3>
              
              <a href="{{  route('murid.create')  }}" class="btn btn-primary float-right">Tambah Murid</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kelas</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Jenis Kelamin</th>
                    <th>NIPD</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $listMurid as $murid )
                  <tr>
                    <td>{{ $murid->kelas }} {{ $murid->jurusan['jurusan'] }}</td>
                    <td><a href="{{ route('murid.show',$murid->id) }}">{{ strtoupper($murid->nama) }}</a></td>
                    <td>{{ $murid->nisn }}</td>
                    <td>
                      @if ($murid->jk == 'L')
                        Laki-laki
                      @else
                        Perempuan
                      @endif
                    </td>
                    <td>{{ $murid->nipd }}</td>
                  </tr>
                  @endforeach
                </tbody>
                {{--
                <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                </tfoot>
                --}}
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table Jurusan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th>Jurusan</th>
                    <th>id</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $listJurusan as $jurusan )
                  <tr>
                    <td>{{ $jurusan->jurusan }}</td>
                    <td>{{ $jurusan->id }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection
