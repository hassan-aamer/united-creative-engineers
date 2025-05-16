    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('Icon white.png') }}" alt="" width="40" height="100">
                {{-- <h1 class="sitename">{{ setting('name') ?? '' }}</h1> --}}
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}" class="active">Home</a></li>
                    <li><a href="{{ route('home') }}#about">About</a></li>
                    <li><a href="{{ route('home') }}#services">Services</a></li>
                    <li><a href="{{ route('home') }}#portfolio">Portfolio</a></li>
                    <li><a href="{{ route('home') }}#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>