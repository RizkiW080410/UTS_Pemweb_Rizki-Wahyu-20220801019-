<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('frontend_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/daftar-layanans*") ? "c-show" : "" }} {{ request()->is("admin/profiles*") ? "c-show" : "" }} {{ request()->is("admin/abouts*") ? "c-show" : "" }} {{ request()->is("admin/blogs*") ? "c-show" : "" }} {{ request()->is("admin/galleries*") ? "c-show" : "" }} {{ request()->is("admin/tims*") ? "c-show" : "" }} {{ request()->is("admin/sosial-media*") ? "c-show" : "" }} {{ request()->is("admin/footers*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-globe c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.frontend.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    
                    @can('pendaftaran_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pendaftarans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pendaftarans") || request()->is("admin/pendaftarans/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-address-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.pendaftaran.title') }}
                            </a>
                        </li>
                    @endcan
                    
                    @can('beasiswa_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.beasiswas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/beasiswas") || request()->is("admin/beasiswas/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-newspaper c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.beasiswa.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('gallery_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.galleries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/galleries") || request()->is("admin/galleries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-camera-retro c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.gallery.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sosial_medium_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sosial-media.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sosial-media") || request()->is("admin/sosial-media/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-share-square c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sosialMedium.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('fn_b_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/tables*") ? "c-show" : "" }} {{ request()->is("admin/bookings*") ? "c-show" : "" }} {{ request()->is("admin/prices*") ? "c-show" : "" }} {{ request()->is("admin/products*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-utensils c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.fnB.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>