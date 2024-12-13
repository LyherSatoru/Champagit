<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <!-- Logo on the Left -->
        <a class="navbar-brand fw-bold" href="/">
            {{-- <img src="{{ asset('assets/img/icon/350kb.gif') }}" alt="Logo"> --}}
            CHAMPA NETWORK
        </a>

        <!-- Toggler for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links on the Right -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ request()->is('about*') ? 'active' : '' }}"
                        href="{{ route('about.index') }} ">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold {{ request()->is('minecraft-store*') ? 'active' : '' }}"
                        href="{{ route('minecraft-store.index') }} ">Account Store</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link fw-bold dropdown-toggle" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- Display username and profile picture -->
                            <img src="{{ Auth::user()->getAvatar(['extension' => 'webp', 'size' => 32]) }}"
                                alt="Profile Picture" class="rounded-circle"
                                style="width: 30px; height: 30px; margin-right: 5px;">
                            {{ Auth::user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="dropdown-item text-dark">
                                    @csrf

                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </li>
                            {{-- <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link fw-bold {{ request()->is('login*') ? 'active' : '' }}"
                            href="{{ route('login') }}">Login</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
