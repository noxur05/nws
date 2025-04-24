@auth
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Billings</a>
          </li>
          <li class="nav-item dropdown">
            <div class="row">
              <li class="col-12 dropdown position-static list-unstyled">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                  Teams
                </a>
                <div class="dropdown-menu w-100 p-1 ps-2">
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 fw-normal">
                    @forelse ($globalTeams as $team )
                      <div class="col">
                        <a class="dropdown-item" href="{{route('team.show', ['id' => $team['id']])}}">{{ $team->name}}</a>
                      </div>
                    @empty
                        <div class="">You are in no other teams</div>
                    @endforelse
                  </div>
                </div>
              </li>
            </div>
          </li>
        </ul>
        <div class="d-none d-lg-flex">
          {{-- TODO: add this as a component --}}
        </div>
        <div class="mx-2">
          <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary mr-0">Logout</button>
          </form>
        </div>
      </div>
      {{-- <div class="">
    @else
        @if (request()->routeIs('registration.login'))
            <a href="{{route('registration.register')}}">Register</a>
        @elseif(request()->routeIs('registration.register'))
        <a href="{{route('registration.login')}}">Login</a>
        @endif
      </div> --}}
    </div>
  </nav>
@endauth