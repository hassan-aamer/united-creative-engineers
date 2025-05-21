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


                    <li>
                        <a class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
                            href="{{ route('admin.categories.index') }}">
                            <i data-feather="layers"></i>
                            <span> {{ __('attributes.categories') }} </span>
                        </a>
                    </li>

                @can('list services')
                    <li>
                        <a class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}"
                            href="{{ route('admin.services.index') }}">
                            <i data-feather="tool"></i>
                            <span> {{ __('attributes.services') }} </span>
                        </a>
                    </li>
                @endcan
                @can('list products')
                    <li>
                        <a class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
                            href="{{ route('admin.products.index') }}">
                            <i data-feather="box"></i>
                            <span> {{ __('attributes.products') }} </span>
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
