@extends('layout.base') 

@section('tittle', 'Piket | Tambah Izin')

@section('content')

<!-- Main content -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data Izin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{  route('izin.index')  }}">Izin</a></li>
            <li class="breadcrumb-item active">Izin-Murid</li>
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
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Izin
                @if ($message = Session::get('successAdd'))
                  <div id="add"></div>
                @endif
              </h3>
            </div>
            
            <!-- /.card-header -->
            <!-- form start -->
            
            <form action="{{ route('izin.store') }}" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                    <label>Murid :</label>
                    <select
                    class="select2"
                      name="murid_id"
                      style="width: 100%"
                    >
                    <option selected="selected">Pilih Murid</option>
                      @foreach ( $listMurid as $murid )
                        <option value="{{ $murid->id }}" >{{ $murid->nama }} {{ $murid->kelas }} {{ $murid->jurusan['jurusan'] }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="alasan">Alasan :</label>
                  <input
                    type="text"
                    name="alasan"
                    class="form-control"
                    id="alasan"
                    placeholder="Apa alasannya?"
                    required
                  />
                </div>
                <div class="form-group">    
                    <input type="hidden" name="status" value="Izin">
                </div>

              <div class="card-footer text-right">
                <button type="submit" name='lanjut' class="btn btn-primary">Submit dan lanjutkan</button>
                <button type="submit" name='submit' class="btn btn-primary">Submit</button>
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
