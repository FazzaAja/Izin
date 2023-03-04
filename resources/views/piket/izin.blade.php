@extends('layout.layout')

@section('tittle', 'Piket | Data Izin')

@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Data Izin Keluar Masuk</h1>

                @if ($message = Session::get('successAdd'))
                  <div id="add"></div>
                @endif
                @if ($message = Session::get('successEdit'))
                  <div id="edit"></div>
                @endif
                @if ($message = Session::get('successDelete'))
                  <div id="delete"></div>
                @endif
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Izin</li>
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
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Table Izin Keluar Masuk</h3>
                    <a href="{{  route('izin.create')  }}" class="btn btn-primary float-right mr-2"><i class="fas fa-solid fa-user-plus"></i></a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table
                      id="example1"
                      class="table table-bordered table-striped"
                    >
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Status</th>
                          <th>Tanggal</th>
                          <th>Kelas</th>
                          <th>Alasan</th>
                          <th>Piket</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($listIzin as $izin)
                        <tr>
                          <td><a href="{{ route('izin.show', $izin->id) }}">{{ ucwords(strtolower($izin->murid['nama'])) }}</a></td>
                          <td><span class="badge badge-pill 
                          @if ($izin->status == 'Sudah Kembali')
                            badge-success
                          @elseif ($izin->status == 'Sudah Pulang')
                            badge-success
                          @elseif ($izin->status == 'Tanpa Keterangan')
                            badge-danger
                          @else
                            badge-warning
                          @endif
                            ">{{ $izin->status }}</span></td>
                          <td>{{ $izin->created_at->translatedFormat('d F Y, l') }} {{ $izin->created_at->format('H:i') }}</td>
                          <td>{{ $izin->murid['kelas'] }} {{ $izin->murid->jurusan['jurusan'] }}</td>
                          <td>{{ $izin->alasan }}</td>
                          <td>{{ ucwords(strtolower($izin->piket['nama'])) }}</td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                      {{-- <tfoot>
                        <tr>
                          <th>Rendering engine</th>
                          <th>Browser</th>
                          <th>Platform(s)</th>
                          <th>Engine version</th>
                          <th>CSS grade</th>
                        </tr>
                      </tfoot> --}}
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
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
