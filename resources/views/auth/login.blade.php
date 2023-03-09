@extends('template.base')

@section('tittle', 'Login')

@section('content')
<br>
<main class="login-form">
   <div class="cotainer">
      <!-- Content Header (Page header) -->
      <section class="content-header">
         <div class="container-fluid">
           <div class="row">
             <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                 <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                 <li class="breadcrumb-item active">Login</li>
               </ol>
             </div>
           </div>
         </div>
         <!-- /.container-fluid -->
       </section>
      <center>
            <div class="col-md-4">
               <div class="card">
                  
                  <div class="wrapper">
                     <div class="title-text">
                        <div class="title login">
                           Murid
                        </div>
                        <div class="title signup">
                           Piket
                        </div>
                        @if ($message = Session::get('gagal'))
                           <div id="gagal"></div>
                        @endif
                     </div>
                     <div class="form-container">
                        <div class="slide-controls">
                           <input type="radio" name="slide" id="login" checked>
                           <input type="radio" name="slide" id="signup">
                           <label for="login" class="slide login">Murid</label>
                           
                           <label for="signup" class="slide signup">Piket</label>
                           <div class="slider-tab"></div>
                        </div>
                        <div class="form-inner">
                           <form action="{{ route('login.murid') }}" class="login" method="post">
                              @csrf
                              <div class="field">
                                 <select
                                 class="select2 form-control"
                                 name="nama"
                                 style="width: 100%"
                                 >
                                 <option selected=x"selected">Nama Murid</option>
                                 @foreach ( $listMurid as $murid )
                                 <option value="{{ $murid->nama }}" >{{ ucwords(strtolower($murid->nama)) }}</option>
                                 @endforeach
                              </select>
                                 </div>
                              <div class="field btn">
                                 <button class="btn btn-primary">Masuk</button>
                              </div>
                              
                           </form>
                           <form action="{{ route('login.piket') }}" class="signup" method="post">
                              @csrf
                              <div class="field">
                                 <input
                                    type="text"
                                    name="nama"
                                    class="form-control"
                                    id="nama"
                                    placeholder="Masukan Nama"
                                    required
                                    />
                              </div>
                              <div class="field">
                                    <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Masukan Password"
                                    required
                                    />
                                 </div>
                              <div class="field btn">
                                 <button class="btn btn-primary">Masuk</button>
                              </div>
                              
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
      </center>
   </div>
</main>


@endsection