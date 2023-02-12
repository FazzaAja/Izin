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
          
          @if ($message = Session::get('successAdd'))
           <div id="addMurid"></div>
          @endif
          @if ($message = Session::get('successDelete'))
           <div id="deleteMurid"></div>
          @endif
          @if ($message = Session::get('successImport'))
           <div id="importMurid"></div>
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
              
              <form action="{{ route('murid.deleteall') }}" method="POST">
                @csrf
                @method('DELETE')
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModal">
                  Hapus Massal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Massal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Yakin ingin menghapus massal data murid?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <a href="{{  route('murid.create')  }}" class="btn btn-primary float-right mr-2"><i class="fas fa-solid fa-user-plus"></i></a>
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
                    <th>#</th>
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
                    <td>
                      <form action="{{ route('murid.destroy',$murid->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                          <i class="fas fa-solid fa-trash fa-xs"></i>
                        </button>
        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Murid</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Yakin ingin menghapu data murid {{ $murid->nama }}?
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
