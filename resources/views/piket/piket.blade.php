@extends('layout.base') 

@section('tittle', 'Piket | Data Piket')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Piket</h1>

          @if ($message = Session::get('successAddPiket'))
           <div id="successAddPiket"></div>
          @endif
          @if ($message = Session::get('successDeletePiket'))
           <div id="successDeletePiket"></div>
          @endif
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Piket</li>
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
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Table Piket</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $listPiket as $piket )
                  <tr>
                    <td>{{ ($piket->nama) }}</td>
                    <td>{{ $piket->nip }}</td>
                    
                    <td>
                      <form action="{{ route('piket.destroy', $piket->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#example">
                          <i class="fas fa-solid fa-trash fa-xs"></i>
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Piket</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Yakin ingin menghapus data piket {{ $piket->nama }}?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
            <!-- general form elements -->
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Piket</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('piket.store') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input
                    type="text"
                    name="nama"
                    class="form-control"
                    id="nama"
                    placeholder="Masukan Nama"
                    value="{{ old('nama') }}"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="nip">NIP</label>
                  <input
                    type="number"
                    name="nip"
                    class="form-control @error('nip') is-invalid @enderror"
                    id="nip"
                    placeholder="Masukan NIP"
                    value="{{ old('nip') }}"
                    required
                  />
                  @error('nip')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    placeholder="Masukan Password"
                    required 
                    autocomplete="current-password"
                  />
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password">Confirm Password</label>
                  <input
                    type="password"
                    name="password_confirmation"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    placeholder="Masukan kembali password"
                    required 
                    autocomplete="current-password"
                  />
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.card-body -->
  
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-secondary">Submit</button>
              </div>
            </form>
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
