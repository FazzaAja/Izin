@extends('layout.base') 

@section('tittle', 'Piket | Tambah Murid')

@section('content')

<!-- Main content -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          @if ($errors->any())
            <div class="text-center alert alert-danger block ">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul class="block">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li><br>
                    @endforeach
                </ul>
            </div>
          @endif
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Murid</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/piket/murid" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="nis">NIS</label>
                  <input
                    type="text"
                    name="nis"
                    class="form-control"
                    id="nis"
                    placeholder="Masukan NIS"
                    required
                  />
                </div>
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
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="Kelas">Kelas</label>
                      <select
                        class="custom-select form-control-border .border-width-2"
                        name="kelas"
                        id="Kelas"
                      >
                        <option>X</option>
                        <option>XI</option>
                        <option>XII</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
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
            <form action="/piket/murid" method="post">
              @csrf
              <div class="card-body">
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
        </div>
      </div>
    </div>
  </section>
</div>

@endsection
