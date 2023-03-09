<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
   <div class="container">
     <a class="navbar-brand">
      <img src="../../dist/img/logoizin.png" alt="Logo" class="brand-image" style="opacity: .9 " width="45" height="45">
      <span class="brand-text font-weight-light">IZIN SMKN 4</span>
    </a>
    
   </div>
 </nav>
 <!-- /.navbar -->
<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white fixed-top">
   <div class="container">
     <a class="navbar-brand">
      <img src="../../dist/img/logoizin.png" alt="Logo" class="brand-image" style="opacity: .9 " width="45" height="45">
      <span class="brand-text font-weight-light">IZIN SMKN 4</span>
    </a>
    
    
    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        @auth('murid')
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Hallo, {{ ucwords(strtolower(auth('murid')->user()->nama)) }}
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
            <div class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="dropdown-item">Logout</button>
            </form>
          </div>
        </li>
        @elseauth('piket')
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Hallo, {{ ucwords(strtolower(auth('piket')->user()->nama)) }}
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('dash') }}">Dashboard</a>
            <div class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="dropdown-item">Logout</button>
            </form>
          </div>
        </li>
        @else
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a href="{{ route('login') }}" class="nav-link">Login</a>
        </li>
        @endauth

     
     
     </ul>
   </div>
 </nav>
 <!-- /.navbar -->