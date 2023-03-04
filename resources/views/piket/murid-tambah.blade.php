@extends('layout.base') 

@section('tittle', 'Piket | Tambah Murid')

@section('content')

<!-- Main content -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data Murid</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{  route('murid.index')  }}">Murid</a></li>
            <li class="breadcrumb-item active">Tambah-Murid</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
 
  @if ($errors->any())
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="alert alert-danger block">
              <strong>Ada beberapa masalah dengan inputannya!<br><br>
              <ul class="block">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li><br>
                  @endforeach
              </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            {{-- <form action="{{ route('murid.import') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div>
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
              </div>
            </form>
            <a class="btn btn-warning float-end" href="{{ route('murid.export') }}">Export User Data</a> --}}

            <div class="card-header">
              <h3 class="card-title">Form Tambah Murid</h3>
              {{-- <a href="/murid/import-murid" class="btn btn-light text-dark float-right ">Import</a> --}}
            </div>
            
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('murid.store') }}" method="post">
              @csrf
              <div class="card-body">
                <h4>Wajib di isi</h4>
                <br>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input
                    type="text"
                    name="nama"
                    class="form-control"
                    id="nama"
                    placeholder="Nama"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="nisn">NISN</label>
                  <input
                    type="number"
                    name="nisn"
                    class="form-control"
                    id="nisn"
                    placeholder="Masukan NISN"
                    required
                  />
                </div>
                <div class="form-group">
                  <label for="nipd">NIPD</label>
                  <input
                    type="number"
                    name="nipd"
                    class="form-control"
                    id="nipd"
                    placeholder="Masukan NIPD"
                    required
                  />
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="Kelas">Kelas</label>
                      <select
                      class="form-control"
                      name="kelas"
                      id="Kelas"
                      >
                        <option>X</option>
                        <option>XI</option>
                        <option>XII</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Jurusan</label>
                      <select
                      class="select2"
                        name="jurusan_id"
                        style="width: 100%"
                      >
                      <option selected="selected">Pilih Jurusan</option>
                        @foreach ( $listJurusan as $jurusan )
                        <option value="{{ $jurusan->id }}" >{{ $jurusan->jurusan }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-2"></div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="jk">Jenis Kelamin</label>
                      <select
                      class="custom-select form-control-border .border-width-2"
                      name="jk"
                      id="jk"
                      >
                      <option value="L" >Laki-laki</option>
                      <option value="P" >Perempuan</option>
                    </select>
                  </div>
                </div>
              </div>

              <br>
              <h4>opsional</h4>
              <br>

              <div class="form-group">
                <label for="foto">Foto Profie</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input
                      type="file"
                      name="foto"
                      class="custom-file-input"
                      id="foto"
                    />
                    <label class="custom-file-label" for="foto">Pilih</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label>Alamat</label>
                  <textarea
                    class="form-control"
                    name="alamat"
                    rows="3"
                    placeholder="Enter ..."
                  ></textarea>
                </div>

                <!-- phone mask -->
                <div class="form-group">
                  <label>Nomer HandPhone</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"
                        ><i class="fas fa-phone"></i
                      ></span>
                    </div>
                    <input
                      type="text"
                      name="phone"
                      class="form-control"
                      data-inputmask="'mask': ['9999-9999-9999[9]', '+62999-9999-9999[9]']"
                      data-mask
                    />
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
              <!-- /.card-body -->

              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- right column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Jurusan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('jurusan.store') }}" method="post">
              @csrf
              <div class="card-body">
                {{-- <div class="form-group">
                  <label for="id">id</label>
                  <input
                    type="number"
                    name="id"
                    class="form-control"
                    id="id"
                    placeholder="Masukan id"
                  />
                </div> --}}
                <div class="form-group">
                  <label for="jurusan">Jurusan</label>
                  <input
                    type="text"
                    name="jurusan"
                    class="form-control"
                    id="jurusan"
                    placeholder="Masukan Jurusan"
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
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Import Murid</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('murid.import') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <h4>Peraturan</h4>
                <ul>
                  <li>Unduh terlebih dahulu templete excel pada icon download <a class="btn btn-light float-right" href="{{ route('murid.export') }}"><i class="fas fa-solid fa-download"></i></a></li>
                  <br>
                  <li>Ikuti field pada template yang sudah tersedia untuk memasukan data murid</li>
                  <br>
                  <li>Untuk <i>jurusan id</i> bisa dilihat di <a href="{{ route('murid.index') }}">Table Jurusan</a></li>
                  <br>
                  <li>Pilih file yang sudah di isi data murid lalu import</li>
                  <br>
                  <li>Jika mengImport data yang sama maka akan terjadi ada dua data yang sama pada table murid</li>
                </ul>
                
                <div class="form-group">
                  <input type="file" name="file" id="file">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.card-body -->
  
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">Import</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
