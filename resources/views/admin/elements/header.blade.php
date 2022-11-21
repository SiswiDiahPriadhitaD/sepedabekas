<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
      <div class="navbar-header" data-logobg="skin5">
        <!-- This is for the sidebar toggle which is visible on mobile only -->
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
        <i class="ti-menu ti-close"></i>
        </a>
  
        <div class="navbar-brand">
          <a href="index.html" class="logo">
            <!-- Logo icon -->
            <b class="logo-icon">
              <img src="../../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
              <!-- Light Logo icon -->
              <img src="../../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
            </b>
            <span class="logo-text">
              <!-- dark Logo text -->
              <img src="../../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
              <!-- Light Logo text -->
              <img src="../../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
            </span>
          </a>
        </div>
  
      </div>
  
      <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
  
        <ul class="navbar-nav float-start me-auto">
  
        </ul>
  
        <ul class="navbar-nav float-end">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @if (Auth::user()->photo == null)
              <img src="{{ asset('assets/images/users/5.jpg') }}" class="rounded-circle me-1" width="31" />
            @else
              <img src="{{ asset('storage/'.Auth::user()->photo) }}" class="rounded-circle me-1" width="31" />
            @endif
            <span>{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user me-1 ms-1"></i>
              My Profile</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <i class="ti-arrow-right me-1 ms-1"></i>
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
              </form>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>