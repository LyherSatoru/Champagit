<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
      <!-- Logo on the Left -->
      <a class="navbar-brand fw-bold" href="/">
          {{-- <img src="{{ asset('assets/img/icon/350kb.gif') }}" alt="Logo"> --}}
          CHAMPA NETWORK
      </a>

      <!-- Toggler for Mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links on the Right -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
          <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link fw-bold {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link fw-bold {{ request()->is('about*') ? 'active' : '' }}" href="{{ route('about.index') }} ">About us</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link fw-bold" href="#footer">Contact Us</a>
              </li>
             
          </ul>
      </div>
  </div>
</nav>
