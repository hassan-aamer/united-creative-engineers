<header class="header-green">
    <nav class="navbar navbar-expand-lg navbar-light navbar-green">
        <div class="container">
            <div class="col-md-3 text-start">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('web/images/logo.png') }}" alt="سيف المستقبل" class="logo">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center col-md-6" id="navbarNav">
                <ul class="navbar-nav nav-links-green">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">{{ __('attributes.home') }}</a>
                    </li>
                    @if (App\Models\Service::count())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}"
                                href="{{ route('services') }}">{{ __('attributes.services') }}</a>
                        </li>
                    @endif
                    @if (App\Models\Product::count())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}"
                                href="{{ route('products') }}">{{ __('attributes.products') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                            href="{{ route('about') }}">{{ __('attributes.about') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 text-end d-none d-lg-block d-xl-block">
                <a href="{{ route('contact') }}">
                    <button class="btn btn-green px-4 btn-header">{{ __('attributes.contuct') }}</button>
                </a>
            </div>
        </div>
    </nav>

    @include('web.layouts.chat_bot')

</header>
