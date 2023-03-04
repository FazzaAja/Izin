<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../dist/img/logoizin.png" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
      <span class="brand-text font-weight-light"><strong>IZIN</strong> SMKN 4 Tsm</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img
            src="../../dist/img/logo4.png"
            class="img"
            alt="User Image"
          />
        </div>
        <div class="info">
          <a href="{{ route('dash') }}" class="d-block">
            <center>
              @auth('piket')
                {{ ucwords(auth('piket')->user()->nama) }}
              @endauth
            </center>
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input
            class="form-control form-control-sidebar"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{ route('izin.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Izin
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-clock"></i>
              <p>
                Keterlambatan
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('piket.index') }}" class="nav-link">
              <i class="nav-icon fas fa-solid fa-user"></i>
              <p>
                Piket
              </p>
            </a>
          </li>
          
          {{-- <li class="nav-item menu-open"> --}}
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
                <a href="{{  route('murid.index')  }}" class="nav-link">
                  <i class="nav-icon fas fa-solid fa-users"></i>
                  <p>
                    Murid
                  </p>
                </a>
              </li>
              
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <li class="nav-item">
                  <button type="submit" class="nav-link">
                    {{-- <i class="nav-icon fas fa-solid fa-right-from-bracket"></i> --}}
                    <i class="nav-icon ion ion-log-out"></i>
                    <p>
                      Logout
                    </p>
                  </a>
                </li>
              </form>
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>