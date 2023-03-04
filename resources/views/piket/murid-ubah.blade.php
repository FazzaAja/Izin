@extends('layout.base') 

@section('tittle', 'Piket | Ubah Murid')

@section('content')

<!-- Main content -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ubah Data Murid</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{  route('murid.index')  }}">Murid</a></li>
            <li class="breadcrumb-item"><a href="{{  route('murid.show',$murid->id)  }}">Detail-Murid</a></li>
            <li class="breadcrumb-item active">Ubah-Murid</li>
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
        <div class="col-md-9">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Murid</h3>
            </div>

            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('murid.update', $murid->id) }}" method="post">
              @csrf
              @method('PUT')

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
                    value="{{ $murid->nama }}"
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
                    value="{{ $murid->nisn }}"
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
                    value="{{ $murid->nipd }}"
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
                        <option value="{{ $murid->kelas }}">{{ $murid->kelas }}</option>
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
                        style="width: 100%"x
                      >
                      <option selected="selected" value="{{ $murid->jurusan }}">{{ $murid->jurusan['jurusan'] }}</option>
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
                      <option value="{{ $murid->jk }}">
                        @if ($murid->jk == 'L')
                            Laki-laki
                        @else
                            Perempuan
                        @endif
                        </option>
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
                    name="alamat"1
                    rows="3"
                    placeholder="Enter ..."
                  >{{ $murid->alamat }}</textarea>
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
                      value="{{ $murid->phone }}"
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
        
      </div>
    </div>
  </section>
</div>

@endsection
