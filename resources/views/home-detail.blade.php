@extends('template.base')

@section('tittle', 'Piket | Detail Izin')

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
                     <form action="{{ route('izin.update', $izin->id) }}" method="post">
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
                            @if ($izin->status == 'Sudah Kembali')
                              badge-success
                            @elseif ($izin->status == 'Sudah Pulang')
                              badge-success
                            @elseif ($izin->status == 'Tanpa Keterangan')
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
                                <label for="">Foto Keluar</label><br>
                                @if ($izin->keluar)
                                <img
                                  src="../../dist/img/lol.jpg"
                                  class="img mr-2 text-primary "
                                  alt="User Image"
                                  width="100" height="150"
                                /> 
                                  
                                @else
                                <img
                                  src="../../dist/img/square-plus-regular.svg"
                                  class="img mr-2 text-primary "
                                  alt="Foto Keluar"
                                  width="100" height="150"
                                /> 
                                  
                                @endif
                              </div>
                            </center>
                          </div>
                          <div class="col-sm-6 invoice-col">
                            <br>
                            <center>
                              <div class="image">
                                <label for="">Foto Kembali</label><br>
                                @if ($izin->kembali)
                                <img
                                  src="../../dist/img/lol.jpg"
                                  class="img mr-2 text-primary "
                                  alt="User Image"
                                  width="100" height="150"
                                /> 
                                  
                                @else
                                <img
                                  src="../../dist/img/square-plus-regular.svg"
                                  class="img mr-2 text-primary "
                                  alt="Foto Kembali"
                                  width="100" height="150"
                                /> 
                                  
                                @endif
  
                              </div>
                            </center>
                          </div>
                        </div>


                        
                      </div>
                      <!-- /.invoice -->
                     
                    </div>
              </div>
            </div>
          </div>
        </section>
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