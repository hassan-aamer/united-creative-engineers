<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <!-- <li class="menu-title">Navigation</li> -->

                @can('dashboard dashboard')
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i data-feather="home"></i>
                            <span> {{ __('attributes.dashboard') }} </span>
                        </a>
                    </li>
                @endcan

                <li class="menu-title mt-2"></li>

                @can('list contacts')
                    <li>
                        <a class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}"
                            href="{{ route('admin.contacts.index') }}">
                            <i data-feather="message-circle"></i>
                            @if (App\Models\Contact::where('active', 0)->count())
                                <span
                                    class="badge bg-danger float-end">{{ App\Models\Contact::where('active', 0)->count() ?? 0 }}</span>
                            @endif
                            <span> {{ __('attributes.contacts') }} </span>
                        </a>
                    </li>
                @endcan
                @can('list subscription')
                    <li>
                        <a class="{{ request()->routeIs('admin.subscription.*') ? 'active' : '' }}"
                            href="{{ route('admin.subscription.index') }}">
                            <i data-feather="bell"></i>
                            @if (App\Models\Subscription::count())
                                <span class="badge bg-success float-end">{{ App\Models\Subscription::count() ?? 0 }}</span>
                            @endif
                            <span> {{ __('attributes.subscriptions') }} </span>
                        </a>
                    </li>
                @endcan

                @can('list services')
                    <li>
                        <a href="#sidebarExpages" data-bs-toggle="collapse">
                            <i data-feather="file-text"></i>
                            <span> {{ __('attributes.services') }} </span>
                            <span class="tool"></span>
                        </a>
                        <div class="collapse" id="sidebarExpages">
                            <ul class="nav-second-level">
                                @can('list services')
                                    <li><a class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}"
                                            href="{{ route('admin.services.index') }}">{{ __('attributes.services') }}</a>
                                    </li>
                                @endcan

                                @can('list developments')
                                    <li><a class="{{ request()->routeIs('admin.developments.*') ? 'active' : '' }}"
                                            href="{{ route('admin.developments.index') }}">{{ __('attributes.developments') }}</a>
                                    </li>
                                @endcan

                                @can('list features')
                                    <li><a class="{{ request()->routeIs('admin.features.*') ? 'active' : '' }}"
                                            href="{{ route('admin.features.index') }}">{{ __('attributes.features') }}</a>
                                    </li>
                                @endcan


                                @can('list packages')
                                    <li>
                                        <a href="#packages" data-bs-toggle="collapse">
                                            <span> {{ __('attributes.packages') }} </span>
                                            <span class="tool"></span>
                                        </a>
                                        <div class="collapse" id="packages">
                                            <ul class="nav-second-level">
                                                @can('list packages')
                                                    <li><a class="{{ request()->routeIs('admin.packages.*') ? 'active' : '' }}"
                                                            href="{{ route('admin.packages.index') }}">{{ __('attributes.packages') }}</a>
                                                    </li>
                                                @endcan
                                                @can('list packageDetails')
                                                    <li><a class="{{ request()->routeIs('admin.PackageDetails.*') ? 'active' : '' }}"
                                                            href="{{ route('admin.PackageDetails.index') }}">{{ __('attributes.PackageDetails') }}</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </li>
                                @endcan
                                @can('list infoSections')
                                    <li>
                                        <a href="#infoSections" data-bs-toggle="collapse">
                                            <span> {{ __('attributes.infoSections') }} </span>
                                            <span class="tool"></span>
                                        </a>
                                        <div class="collapse" id="infoSections">
                                            <ul class="nav-second-level">
                                                @can('list infoSections')
                                                    <li><a class="{{ request()->routeIs('admin.infoSections.*') ? 'active' : '' }}"
                                                            href="{{ route('admin.infoSections.index') }}">{{ __('attributes.infoSections') }}</a>
                                                    </li>
                                                @endcan
                                                @can('list infoSectionsDetails')
                                                    <li><a class="{{ request()->routeIs('admin.infoSectionDetails.*') ? 'active' : '' }}"
                                                            href="{{ route('admin.infoSectionDetails.index') }}">{{ __('attributes.infoSectionDetails') }}</a>
                                                    </li>
                                                @endcan
                                                @can('list infoOptions')
                                                    <li><a class="{{ request()->routeIs('admin.infoOption.*') ? 'active' : '' }}"
                                                            href="{{ route('admin.infoOption.index') }}">{{ __('attributes.infoOption') }}</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan
                @can('list products')
                    <li>
                        <a href="#products" data-bs-toggle="collapse">
                            <i data-feather="box"></i>
                            <span> {{ __('attributes.products') }} </span>
                            <span class="tool"></span>
                        </a>
                        <div class="collapse" id="products">
                            <ul class="nav-second-level">
                                @can('list products')
                                    <li><a class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
                                            href="{{ route('admin.products.index') }}">{{ __('attributes.products') }}</a>
                                    </li>
                                @endcan
                                @can('list productFeatures')
                                    <li><a class="{{ request()->routeIs('admin.productFeatures.*') ? 'active' : '' }}"
                                            href="{{ route('admin.productFeatures.index') }}">{{ __('attributes.productFeatures') }}</a>
                                    </li>
                                @endcan
                                @can('list productServices')
                                    <li><a class="{{ request()->routeIs('admin.productServices.*') ? 'active' : '' }}"
                                            href="{{ route('admin.productServices.index') }}">{{ __('attributes.productServices') }}</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('list sliders')
                    <li>
                        <a class="{{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}"
                            href="{{ route('admin.sliders.index') }}">
                            <i data-feather="sliders"></i>
                            <span>{{ __('attributes.sliders') }}</span>
                        </a>
                    </li>
                @endcan
                @can('list whyUs')
                    <li>
                        <a class="{{ request()->routeIs('admin.WhyUs.*') ? 'active' : '' }}"
                            href="{{ route('admin.WhyUs.index') }}">
                            <i data-feather="star"></i>
                            <span> {{ __('attributes.WhyUs') }} </span>
                        </a>
                    </li>
                @endcan
                @can('list about')
                    <li>
                        <a class="{{ request()->routeIs('admin.about.*') ? 'active' : '' }}"
                            href="{{ route('admin.about.index') }}">
                            <i data-feather="shield"></i>
                            <span> {{ __('attributes.about') }} </span>
                        </a>
                    </li>
                @endcan
                @can('list faqs')
                    <li>
                        <a class="{{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}"
                            href="{{ route('admin.faqs.index') }}">
                            <i data-feather="message-circle"></i>
                            <span>{{ __('attributes.faqs') }}</span>
                        </a>
                    </li>
                @endcan
                @can('list users')
                    <li>
                        <a class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                            href="{{ route('admin.users.index') }}">
                            <i data-feather="users"></i>
                            <span>{{ __('attributes.users') }}</span>
                        </a>
                    </li>
                @endcan
                @can('list settings')
                    <li>
                        <a class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"
                            href="{{ route('admin.settings.edit') }}">
                            <i data-feather="settings"></i>
                            <span>{{ __('attributes.settings') }}</span>
                        </a>
                    </li>
                @endcan
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
