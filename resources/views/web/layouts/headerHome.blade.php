    <!-- Header Section -->
    <header class="bg-primary-gradient">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <div class="col-md-3 text-start">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('web/images/logo-white.svg') }}" alt="سيف المستقبل" class="logo">
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center col-md-6" id="navbarNav">
                    <ul class="navbar-nav">
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
                        <button class="btn btn-light  btn-header">{{ __('attributes.contuct') }}</button>
                    </a>
                </div>

            </div>
        </nav>

        <!-- Hero Section -->
        <div class="container py-5 text-center text-white hero-section">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="fw-bold mb-4 hero-text ">{{ setting('title') }}</h1>
                    <p class="lead mb-5">{{ setting('about') }}</p>
                    <a href="{{ route('contact') }}">
                        <button
                            class="btn btn-success  px-5 py-3 mb-5 btn-hearo">{{ __('attributes.contuctNow') }}</button>
                    </a>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="row justify-content-center mt-5 ltr-text">
                <div class="col-lg-6">
                    <div class="stats-container bg-dark-blue rounded-pill py-3 px-4">
                        <div class="row g-0 text-center align-items-center">
                            <div class="col-3">
                                <div class="stat-item">
                                    <div class="d-flex align-items-center justify-content-center">


                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <h3 class="mb-0">+{{ setting('clients') ?? '500' }}</h3>
                                            <p class="mb-0 small">{{ __('attributes.client') }}</p>
                                        </div>
                                        @if ($setting = App\Models\Setting::first())
                                            <div class="user-icons">
                                                @foreach (App\Models\Setting::first()->getMedia('clients') as $client)
                                                    <img src="{{ $client->getUrl() ?? asset('assets/images/Uplode.png') }}"
                                                        alt="client" class="rounded-circle">
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto px-0">
                                <div class="divider">|</div>
                            </div>
                            <div class="col">
                                <div class="stat-item">
                                    <h3 class="mb-0">+{{ setting('marketing_service') ?? '966' }}</h3>
                                    <p class="mb-0 small">{{ __('attributes.marketingService') }}</p>
                                </div>
                            </div>
                            <div class="col-auto px-0">
                                <div class="divider">|</div>
                            </div>
                            <div class="col">
                                <div class="stat-item">
                                    <h3 class="mb-0">+{{ setting('website_designer') ?? '300' }}</h3>
                                    <p class="mb-0 small">{{ __('attributes.websiteDesigner') }}</p>
                                </div>
                            </div>
                            <div class="col-auto px-0">
                                <div class="divider">|</div>
                            </div>
                            <div class="col">
                                <div class="stat-item">
                                    <h3 class="mb-0">+{{ setting('sales_development') ?? '96' }}</h3>
                                    <p class="mb-0 small">{{ __('attributes.salesDevelopment') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('web.layouts.chat_bot')

        <!-- Scroll indicator -->
        <div class="scroll-indicator">
            <a href="services.html" class="text-white">
                <div class="scroll-circle">
                    <div class="mouse-shape"></div>
                </div>
            </a>
        </div>
    </header>
