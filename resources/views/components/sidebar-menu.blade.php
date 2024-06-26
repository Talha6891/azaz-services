<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group w-0 hidden xl:w-[248px] xl:block">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">

        <!-- Application Logo -->
        <x-application-logo/>

        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                          icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                          icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl inline-block md:hidden">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0"></div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">{{ __('MENU') }}</li>
            <li>
                <a href="{{ route('dashboard.index') }}"
                   class="navItem {{ (request()->is('dashboard*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>{{ __('Home') }}</span>
                    </span>
                </a>
            </li>

            {{-- categories start --}}
            <li>
                <a href="{{ route('categories.index') }}"
                   class="navItem {{ (request()->is('categories*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="bx:category" width="1rem" height="1rem"></iconify-icon>
                        <span>{{ __('Categories') }}</span>
                    </span>
                </a>
            </li>
            {{-- categories end --}}

            {{-- services start --}}
            <li>
                <a href="{{ route('services.index') }}"
                   class="navItem {{ (request()->is('services*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="fluent-mdl2:c-r-m-services" width="1rem" height="1rem"></iconify-icon>
                        <span>{{ __('Services') }}</span>
                    </span>
                </a>
            </li>
            {{-- services end --}}

                        {{-- plan start --}}
                        <li>
                            <a href="{{ route('plans.index') }}"
                               class="navItem {{ (request()->is('plans*')) ? 'active' : '' }}">
                                <span class="flex items-center">
                                    <iconify-icon class="nav-icon" icon="streamline:subscription-cashflow" width="1rem" height="1rem"></iconify-icon>
                                    <span>{{ __('Create Plan') }}</span>
                                </span>
                            </a>
                        </li>
                        {{-- plan end --}}

                         {{-- customer request start --}}
                         <li>
                            <a href="{{ route('customer-requests.index') }}"
                               class="navItem {{ (request()->is('customer-requests*')) ? 'active' : '' }}">
                                <span class="flex items-center">
                                    <iconify-icon class="nav-icon" icon="hugeicons:customer-service-01" width="1rem" height="1rem"></iconify-icon>
                                    <span>{{ __('Customer Requests') }}</span>
                                </span>
                            </a>
                        </li>
                        {{-- customer request end --}}

            <!-- Database -->
            <li>
                <a href="{{ route('database-backups.index') }}"
                   class="navItem {{ (request()->is('database-backups*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class="nav-icon" icon="iconoir:database-backup"></iconify-icon>
                        <span>{{ __('Database Backup') }}</span>
                    </span>
                </a>
            </li>
            <!-- Settings -->
            <li>
                <a href="{{ route('general-settings.show') }}"
                   class="navItem {{ (request()->is('general-settings*')) || (request()->is('users*')) || (request()->is('roles*')) || (request()->is('profiles*')) || (request()->is('permissions*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="material-symbols:settings-outline"></iconify-icon>
                        <span>{{ __('Settings') }}</span>
                    </span>
                </a>
            </li>
        </ul>

    </div>
</div>
<!-- End: Sidebar -->
