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
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
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
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Nomer HP</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $listMurid as $murid )
                  <tr>
                    <td>{{ $murid->nis }}</td>
                    <td>{{ $murid->nama }}</td>
                    <td>{{ $murid->foto }}</td>
                    <td>{{ $murid->kelas }}</td>
                    <td>{{ $murid->jurusan['jurusan'] }}</td>
                    <td>{{ $murid->alamat }}</td>
                    <td>{{ $murid->phone }}</td>
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
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $listJurusan as $jurusan )
                  <tr>
                    <td>{{ $jurusan->jurusan }}</td>
                    <td><a href="#">edit</a></td>
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
