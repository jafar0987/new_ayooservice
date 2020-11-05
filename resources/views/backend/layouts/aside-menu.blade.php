<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{url('/static/' . $page='index')}}">
            <img src="{{URL::asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-lgo"
                 alt="Admintro logo">
            <img src="{{URL::asset('assets/images/brand/logo1.png')}}" class="header-brand-img dark-logo"
                 alt="Admintro logo">
            <img src="{{URL::asset('assets/images/brand/favicon.png')}}" class="header-brand-img mobile-logo"
                 alt="Admintro logo">
            <img src="{{URL::asset('assets/images/brand/favicon1.png')}}" class="header-brand-img darkmobile-logo"
                 alt="Admintro logo">
        </a>
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{URL::asset('assets/images/users/2.jpg')}}" alt="user-img"
                     class="avatar-xl rounded-circle mb-1">
            </div>
            <div class="user-info">
                <h5 class=" mb-1">{{Auth::user()->name}} <i class="ion-checkmark-circled  text-success fs-12"></i></h5>
                <span class="text-muted app-sidebar__user-name text-sm">Web Designer</span>
            </div>
        </div>
        <ul class="side-menu app-sidebar3">
            <li class="slide">
                <x-utils.link
                    class="side-menu__item"
                    :href="route('admin.dashboard')"
                    :active="activeClass(Route::is('admin.dashboard'), 'active')"
                    icon="<svg class='side-menu__icon' xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 0 24 24'
                         width='24'><path d='M0 0h24v24H0V0z' fill='none'/>
                        <path d='M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z'/>
                    </svg>"
                    :text="__('Dashboard')"/>

            </li>

            @if ($logged_in_user->hasAllAccess() ||($logged_in_user->can('admin.access.user.list') || $logged_in_user->can('admin.access.user.deactivate') ||
               $logged_in_user->can('admin.access.user.reactivate') || $logged_in_user->can('admin.access.user.clear-session') ||
               $logged_in_user->can('admin.access.user.impersonate') || $logged_in_user->can('admin.access.user.change-password'))
               )
                <li class="side-item side-item-category">@lang('System')</li>
                <li class="slide">
                    <x-utils.link
                        href="{{url('/static/' . $page='#') }}"
                        icon="<svg class='side-menu__icon' xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 0 24 24'
                             width='24'>
                            <path d='M0 0h24v24H0V0z' fill='none'/>
                            <path d='M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z'/>
                        </svg>"
                        class="side-menu__item"
                        toggle="slide"
                        :text="__('Access')"
                        iAfterMenu="angle fa fa-angle-right"/>
                    <ul class="slide-menu">
                        @if (
                        $logged_in_user->hasAllAccess() ||
                        (
                            $logged_in_user->can('admin.access.user.list') ||
                            $logged_in_user->can('admin.access.user.deactivate') ||
                            $logged_in_user->can('admin.access.user.reactivate') ||
                            $logged_in_user->can('admin.access.user.clear-session') ||
                            $logged_in_user->can('admin.access.user.impersonate') ||
                            $logged_in_user->can('admin.access.user.change-password')
                        )
                    )
                            <li>
                                <x-utils.link
                                    :href="route('admin.auth.user.index')"
                                    class="slide-item"
                                    :text="__('User Management')"
                                    :active="activeClass(Route::is('admin.auth.user.*'), 'active')"/>
                            </li>
                        @endif

                        @if ($logged_in_user->hasAllAccess())
                            <li>
                                <x-utils.link
                                    :href="route('admin.auth.role.index')"
                                    class="slide-item"
                                    :text="__('Role Management')"
                                    :active="activeClass(Route::is('admin.auth.role.*'), 'active')"/>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if ($logged_in_user->hasAllAccess())
                <li class="side-item side-item-category">@lang('Logs')</li>
                <li class="slide">
                    <x-utils.link
                        href="#"
                        icon="<svg class='side-menu__icon' xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 0 24 24' width='24'><path d='M0 0h24v24H0V0z' fill='none'></path><path d='M14.25 2.26l-.08-.04-.01.02C13.46 2.09 12.74 2 12 2 6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10c0-4.75-3.31-8.72-7.75-9.74zM19.41 9h-7.99l2.71-4.7c2.4.66 4.35 2.42 5.28 4.7zM13.1 4.08L10.27 9l-1.15 2L6.4 6.3C7.84 4.88 9.82 4 12 4c.37 0 .74.03 1.1.08zM5.7 7.09L8.54 12l1.15 2H4.26C4.1 13.36 4 12.69 4 12c0-1.85.64-3.55 1.7-4.91zM4.59 15h7.98l-2.71 4.7c-2.4-.67-4.34-2.42-5.27-4.7zm6.31 4.91L14.89 13l2.72 4.7C16.16 19.12 14.18 20 12 20c-.38 0-.74-.04-1.1-.09zm7.4-3l-4-6.91h5.43c.17.64.27 1.31.27 2 0 1.85-.64 3.55-1.7 4.91z'></path></svg>"
                        class="side-menu__item"
                        toggle="slide"
                        :text="__('Logs')"
                        iAfterMenu="angle fa fa-angle-right"/>

                    <ul class="slide-menu">
                        <li>
                            <x-utils.link
                                :href="route('log-viewer::dashboard')"
                                class="slide-item"
                                :text="__('Dashboard')"/>
                        </li>
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('log-viewer::logs.list')"
                                class="slide-item"
                                :text="__('Logs')"/>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</aside>
<!--aside closed-->
