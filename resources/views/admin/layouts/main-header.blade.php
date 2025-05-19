<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-end mb-0">



            {{-- <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i data-feather="globe"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end">

                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                            class="dropdown-item">

                            <img src="{{ asset('assets/images/flags/' . $localeCode . '.png') }}" alt="flag"
                                class="me-1" height="12">

                            <span class="align-middle">
                                {{ __('attributes.' . $localeCode) }}
                            </span>
                        </a>
                    @endforeach

                </div>
            </li> --}}


            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ App\Helpers\Image::getMediaUrl(Auth::user(), 'users') }}" alt="{{ Auth::user()->name ?? '' }} " class="rounded-circle">
                    <span class="pro-user-name ms-1">
                        {{ Auth::user()->name ?? '' }} <i class="uil uil-angle-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ Auth::user()->email ?? '' }}</h6>
                    </div>

                    <a href="{{ route('admin.profile.edit') }}" class="dropdown-item notify-item">
                        <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>{{__('attributes.MyAccount')}}</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                        <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                    </a>

                </div>
            </li>
        </ul>


        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile">
                    <i data-feather="menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
