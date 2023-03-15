@extends('template.base')

@section('tittle', 'Detail Izin '.ucwords(strtolower(auth('murid')->user()->nama)))

@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Detail Izin Keluar Masuk</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('profile') }}">Izin</a></li>
                  <li class="breadcrumb-item active">Detail</li>
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
                    
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                     <form action="{{ route('foto',$izin->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- title row -->
                        <div class="row">
                          <div class="col-12">
                            <h3>
                              <div class="mt-3 ">
                                <div class="image">
                                  <img
                                    src="../../dist/img/logo4.png"
                                    class="img mr-2"
                                    alt="User Image"
                                    width="43" height="50"
                                  /> SMKN 4 Tasikmalaya
                                  <small class="mt-3 float-right">{{ $izin->created_at->translatedFormat('l, d F Y') }}</small>
                                </div>
                              </div>
                            </h3>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                          <div class="col-sm-6 invoice-col">
                            <br>
                            <h5 class="mb-3 ml-3"><strong>Nama</strong> : {{ ucwords(strtolower($izin->murid->nama)) }}</h5>
                            <h5 class="ml-3 mb-3"><strong>Kelas</strong> : {{ $izin->murid->kelas }} {{ $izin->murid->jurusan->jurusan }}</h5>
                            <h5 class="ml-3 mb-3"><strong>Jam</strong> : {{ $izin->created_at->format('H:i') }} </h5> 
                            <h5 class="ml-3 mb-3"><strong>Jam Pelajaran Ke</strong> : 
                              @if ($izin->created_at->translatedFormat('l') == 'Senin')
                                @if ($izin->created_at->between('07:00:00', '07:44:59'))
                                  1
                                @elseif ($izin->created_at->between('07:45:00', '08:29:59'))
                                  2
                                @elseif ($izin->created_at->between('08:30:00', '09:14:59'))
                                  3
                                @elseif ($izin->created_at->between('09:15:00', '09:59:59'))
                                  4
                                @elseif ($izin->created_at->between('10:00:00', '10:14:59'))
                                  Istirahat
                                @elseif ($izin->created_at->between('10:15:00', '10:59:59'))
                                  5
                                @elseif ($izin->created_at->between('11:00:00', '11:44:59'))
                                  6
                                @elseif ($izin->created_at->between('11:45:00', '12:14:59'))
                                  Istirahat Dzuhur
                                @elseif ($izin->created_at->between('12:15:00', '12:59:59'))
                                  7
                                @elseif ($izin->created_at->between('13:00:00', '13:44:59'))
                                  8
                                @elseif ($izin->created_at->between('13:45:00', '14:29:59'))
                                  9
                                @elseif ($izin->created_at->between('14:30:00', '15:14:59'))
                                  10
                                @elseif ($izin->created_at->between('15:15:00', '15:44:59'))
                                  Istirahat Ashar
                                @elseif ($izin->created_at->between('15:45:00', '16:29:59'))
                                  11
                                @else
                                 Di luar jam sekolah
                                @endif

                              @elseif ($izin->created_at->translatedFormat('l') == 'Jumat')

                                @if ($izin->created_at->between('07:00:00', '07:44:59'))
                                  1
                                @elseif ($izin->created_at->between('07:45:00', '08:29:59'))
                                  2
                                @elseif ($izin->created_at->between('08:30:00', '09:14:59'))
                                  3
                                @elseif ($izin->created_at->between('09:15:00', '09:59:59'))
                                  4
                                @elseif ($izin->created_at->between('10:00:00', '10:14:59'))
                                  Istirahat
                                @elseif ($izin->created_at->between('10:15:00', '10:59:59'))
                                  5
                                @elseif ($izin->created_at->between('11:00:00', '11:44:59'))
                                  6
                                @elseif ($izin->created_at->between('11:45:00', '12:59:59'))
                                  Istirahat Jum'atan
                                @elseif ($izin->created_at->between('13:00:00', '13:44:59'))
                                  7
                                @elseif ($izin->created_at->between('13:45:00', '14:29:59'))
                                  8
                                @elseif ($izin->created_at->between('14:30:00', '15:14:59'))
                                  9
                                @else
                                  Di luar jam sekolah
                                @endif

                              @elseif (in_array($izin->created_at->translatedFormat('l'), ['Sabtu', 'Minggu']))

                                Libur Sekolah

                              @else

                                @if ($izin->created_at->between('07:00:00', '07:44:59'))
                                  1
                                @elseif ($izin->created_at->between('07:45:00', '08:29:59'))
                                  2
                                @elseif ($izin->created_at->between('08:30:00', '09:14:59'))
                                  3
                                @elseif ($izin->created_at->between('09:15:00', '09:59:59'))
                                  4
                                @elseif ($izin->created_at->between('10:00:00', '10:14:59'))
                                  Istirahat
                                @elseif ($izin->created_at->between('10:15:00', '10:59:59'))
                                  5
                                @elseif ($izin->created_at->between('11:00:00', '11:44:59'))
                                  6
                                @elseif ($izin->created_at->between('11:45:00', '12:14:59'))
                                  Istirahat Dzuhur
                                @elseif ($izin->created_at->between('12:15:00', '12:59:59'))
                                  7
                                @elseif ($izin->created_at->between('13:00:00', '13:44:59'))
                                  8
                                @elseif ($izin->created_at->between('13:45:00', '14:29:59'))
                                  9
                                @elseif ($izin->created_at->between('14:30:00', '15:14:59'))
                                  10
                                @else
                                  Di luar jam sekolah
                                @endif
                                
                              @endif
                            </h5>
                            <h5 class="ml-3 mb-3"><strong>Alasan</strong> : {{ $izin->alasan }}</h5>
                            
                                
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-2 invoice-col">
                            
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-3 invoice-col">
                            <br />
                            <b>Piket </b>: {{ ucwords(strtolower($izin->piket->nama)) }} <br>
                            <b>Status </b>: <span class="badge badge-pill 
                            @if ($izin->status == 'Selesai')
                              badge-success
                            @elseif ($izin->status == 'Proses')
                              badge-info
                            @elseif ($izin->status == 'Kabur')
                              badge-danger
                            @else
                              badge-warning
                            @endif
                              ">{{ $izin->status }}</span>

                            
                          </div>
                          <!-- /.col -->

                          
                        </div>
                        <!-- /.row -->

                        
                        <div class="row invoice-info">
                          <div class="col-sm-6 invoice-col">
                            <br>
                            <center>
                              <div class="image">
                                @if ($izin->keluar)
                                  
                                @else
                                <input type="hidden" name="keluar" id="image">  
                                @endif
                                <label>Foto Keluar<br>
                                {{-- <img class="img-preview" src="#" alt="Preview Photo"> --}}
                                @if ($izin->keluar)
                                <br>
                                <img
                                  src="{{ url('storage/'.$izin->keluar) }}"
                                  class="img mr-2 text-primary"
                                  alt="User Image"
                                  height="300"
                                /> 
                                  
                                @else
                                <br>
                                  <video id="webcamVideo" width="200" height="300" style="border: 1px black solid;" autoplay></video>
                                  <canvas id="webcamCanvas" width="200" height="300" style="border: 1px black solid;"></canvas>                          
                                  <button type="button" onclick="ambilGambar();">Capture</button>
                                  <button type="button" onclick="startCamera();">Mulai Kamera</button>
                                  
                                @endif
                                </label>
                              </div>
                            </center>
                          </div>
                          @if ($izin->keluar)
                          <div class="col-sm-6 invoice-col">
                            <br>
                            <center>
                              <div class="image">
                                <input type="hidden" name="kembali" id="image2">
                                <label for="kembali">Foto Kembali<br>
                                @if ($izin->kembali)
                                <br>
                                <img
                                  src="{{ url('storage/'.$izin->kembali) }}"
                                  class="img mr-2 text-primary"
                                  alt="Icon Plus"
                                  height="300"
                                /> 
                                <br>
                                <p>Kembali pada waktu : {{ \Carbon\Carbon::parse($izin->uploaded_at)->translatedFormat('l d, H:i') }}</p>
                                  
                                @else
                                
                                <br>
                                  <video id="webcamVideo2" width="200" height="300" style="border: 1px black solid;" autoplay></video>
                                  <canvas id="webcamCanvas2" width="200" height="300" style="border: 1px black solid;"></canvas>                          
                                  <button type="button" onclick="ambilGambar2();">Capture</button>
                                  <button type="button" onclick="startCamera2();">Mulai Kamera</button>
                                @endif
                                </label>
                              </div>
                            </center>
                          </div>
                          @endif
                        </div>
                        <div class="row invoice-info">
                          <div class="col-sm-12 invoice-col">
                            <br>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-success">
                                    Simpan
                                    </button>
                                </div>
                            </div>
                        </div>


                        <!-- this row will not appear when printing -->
                        
                            
                      </div>
                      <!-- /.invoice -->
                     </form>
                    </div>
              </div>
            </div>
          </div>
        </section>

          <!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    {{-- <div class="float-right d-none d-sm-inline">Anything you want</div> --}}
    <!-- Default to the left -->
    <center>
      <strong
        >Copyright <sup style=>&copy;</sup>
        <a href="https://www.instagram.com/dvethree_4/">DVTHREE 4</a>.</strong
      >
      All rights reserved.
    </center>
</footer>




  @endsection