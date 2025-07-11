<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('img/brand/coreui.svg#ful') }}"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('img/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div><!--c-sidebar-brand-->

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <x-utils.link
                class="c-sidebar-nav-link"
                :href="route('admin.dashboard')"
                :active="activeClass(Route::is('admin.dashboard'), 'c-active')"
                icon="c-sidebar-nav-icon cil-speedometer"
                :text="__('Dashboard')" />
        </li>

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
            <li class="c-sidebar-nav-title">@lang('System')</li>

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.auth.user.*') || Route::is('admin.auth.role.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-user"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Access')" />

                <ul class="c-sidebar-nav-dropdown-items">
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
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.user.index')"
                                class="c-sidebar-nav-link"
                                :text="__('User Management')"
                                :active="activeClass(Route::is('admin.auth.user.*'), 'c-active')" />
                        </li>
                    @endif

                    @if ($logged_in_user->hasAllAccess())
                        <li class="c-sidebar-nav-item">
                            <x-utils.link
                                :href="route('admin.auth.role.index')"
                                class="c-sidebar-nav-link"
                                :text="__('Role Management')"
                                :active="activeClass(Route::is('admin.auth.role.*'), 'c-active')" />
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if (   $logged_in_user->hasAllAccess() ||
                (   
                    $logged_in_user->can('admin.access.customer.manage') ||
                    $logged_in_user->can('admin.access.book.manage')
                )
            )
        <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.customer.*') || Route::is('admin.book.*'), 'c-open c-show') }}">
            <x-utils.link
                href="#"
                icon="c-sidebar-nav-icon fas fa-home"
                class="c-sidebar-nav-dropdown-toggle"
                :text="__('Features Management')" />
            @foreach(Module::group(0) as $module)
                @if($module->isEnabled())
                    <?php 
                        $module = $module->getLowerName();
                        $route = 'admin.'.$module.'.index';
                        $active = 'admin.'.$module.'.*';
                        $mod_trans = $module.'::menus.backend.sidebar.'.$module;
                        $permissionName = 'admin.access.'.$module;
                    ?>
                    <ul class="c-sidebar-nav-dropdown-items">
                        @if ($logged_in_user->hasAllAccess() ||
                                (
                                    $logged_in_user->can($permissionName) ||
                                    $logged_in_user->can('admin.access.'.$module.'.manage')
                                )
                        )
                            <li class="c-sidebar-nav-item">
                                <x-utils.link
                                    :href="route($route)"
                                    class="c-sidebar-nav-link"
                                    :text="__($mod_trans)"
                                    :active="activeClass(Route::is($active), 'c-active')" />
                            </li>
                        @endif

                    </ul>
                @endif
            @endforeach
        </li>
        @endif

        {{-- <li class="c-sidebar-nav-title">@lang('FEATURES')</li>
        @foreach(Module::group(9) as $module)
            @if($module->isEnabled())
                <?php 
                    $module = $module->getLowerName();
                    $route = 'admin.'.$module.'.index';
                    $active = 'admin/'.$module.'*';
                    $mod_trans = $module.'::menus.backend.sidebar.'.$module;
                    $permissionName = 'admin.access.'.$module;
                ?>

                @if(
                    $logged_in_user->hasAllAccess() ||
                    $logged_in_user->can($permissionName) ||
                    $logged_in_user->can('admin.access.'.$module.'.manage')
                )
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            class="c-sidebar-nav-link"
                            :href="route($route)"
                            :active="activeClass(request()->is($active), 'c-active')"
                            icon="{{ config($module.'.icon') }}"
                            :text="__($mod_trans)" />
                    </li>
                @endif

            @endif
        @endforeach --}}

        {{-- @if (
            $logged_in_user->hasAllAccess() ||
            (
                $logged_in_user->can('admin.access.recyclebin.manage') ||
                $logged_in_user->can('admin.access.recyclebin.view') 
            )
        )

            <li class="c-sidebar-nav-dropdown {{ activeClass(Route::is('admin.recyclebin.*'), 'c-open c-show') }}">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon fas fa-trash"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('RecycleBin')" />

                @foreach(Module::getOrdered() as $module)
                    @if(
                        $module->isEnabled() && 
                        !in_array($module->getLowerName(),config('boilerplate.ignored_bin'))
                    )
                    <?php 
                        $module = $module->getLowerName();
                        $route = 'admin.recyclebin.index';
                        $queryParam = ['submodule' => $module];
                        $active = url('/admin/recyclebin') . '?' . http_build_query($queryParam);
                        $mod_trans = $module.'::menus.backend.sidebar.'.$module.'_bin';
                        $permissionName = 'admin.access.'.$module;
                    ?>

                    <ul class="c-sidebar-nav-dropdown-items">
                        @if ($logged_in_user->hasAllAccess() ||
                                (
                                    $logged_in_user->can($permissionName) ||
                                    $logged_in_user->can('admin.access.'.$module.'.manage')
                                )
                        )
                            <li class="c-sidebar-nav-item">
                                <x-utils.link
                                    :href="route($route,$queryParam)"
                                    class="c-sidebar-nav-link"
                                    :text="__($mod_trans)"
                                    :active="activeClass(request()->fullUrl() == $active, 'c-active')" />
                            </li>
                        @endif

                    </ul>
                    @endif
                @endforeach
            </li>
        @endif --}}
            
        <li class="c-sidebar-nav-title">@lang('Log')</li>
        @if ($logged_in_user->hasAllAccess())
            <li class="c-sidebar-nav-dropdown">
                <x-utils.link
                    href="#"
                    icon="c-sidebar-nav-icon cil-list"
                    class="c-sidebar-nav-dropdown-toggle"
                    :text="__('Logs')" />

                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::dashboard')"
                            class="c-sidebar-nav-link"
                            :text="__('Dashboard')" />
                    </li>
                    <li class="c-sidebar-nav-item">
                        <x-utils.link
                            :href="route('log-viewer::logs.list')"
                            class="c-sidebar-nav-link"
                            :text="__('Logs')" />
                    </li>
                </ul>
            </li>
        @endif
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div><!--sidebar-->
