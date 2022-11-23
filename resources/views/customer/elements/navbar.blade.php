<nav class="navbar navbar-expand-lg py-3 navbar-light bg-white fixed-top">
  <div class="container">
    <a class="navbar-brand h1 text-grey" href="#">Sekas<span class="text-warning fw-bold">IN</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item me-4">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item me-4">
          <!-- Button trigger modal -->
          <a class="nav-link" aria-current="page" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Search</a>
        </li>
        <li class="nav-item me-4 dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Brands
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach (\App\Http\Controllers\Customer\HomeController::brand() as $item)                
              <li><a class="dropdown-item" href="/product/{{ $item->id }}/brand">{{ $item->brand }}</a></li>
            @endforeach
          </ul>
        </li>
        @auth
          <li class="nav-item me-4">
            <!-- Button trigger modal -->
            <a class="nav-link" aria-current="page" href="/transaction">Transactions</a>
          </li>
        @endauth
        {{-- <li class="nav-item me-4">
          <a class="nav-link" aria-current="page" href="#">About</a>
        </li> --}}
        @auth
          <li class="nav-item me-1">
            @if (Auth::user()->role == 'admin')                
              <a class="btn btn-warning text-white btn-md px-5" href="/admin/home">Admin</a>
            @else
              <a class="btn btn-warning text-white btn-md px-5" href="/profile">
                Profile</a>
            @endif
          </li>
          <li class="nav-item">
            <a class="btn btn-warning text-white btn-md px-5" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        @else
          <li class="nav-item me-1">
            <a class="btn btn-dark btn-md px-5" href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-dark btn-md px-5" href="/register">Register</a>
          </li>
        @endauth
      </ul>
      
    </div>
  </div>
</nav>