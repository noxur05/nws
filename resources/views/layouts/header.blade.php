<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    @auth
      <a class="navbar-brand" href="/">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <div class="d-none d-lg-flex">
          {{-- TODO: add this as a component --}}
          <form class="" role="search">
            <div class="input-group">
              <input type="text" class="form-control border-primary" placeholder="Search">
              <button class="btn btn-primary" type="submit">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="mx-2">
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <button type="submit" class="btn btn-primary">Logout</button>
        </form>
    @else
        @if (request()->routeIs('registration.login'))
            <a href="{{route('registration.register')}}">Register</a>
        @elseif(request()->routeIs('registration.register'))
        <a href="{{route('registration.login')}}">Login</a>
        @endif
      </div>
    @endauth
  </div>
</nav>