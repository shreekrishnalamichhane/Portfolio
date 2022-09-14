<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="#">
            <img alt="Logo" src="" class="h-15px logo" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-2 py-5 py-lg-8" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                    </div>
                </div>
                {{-- <div data-kt-menu-trigger="click"
                    class="menu-item @if (backend_active_menu('backend.website.dashboard.main')) here show @endif menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-grid fs-3"></i>
                        </span>
                        <span class="menu-title">Dashboards</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion @if (backend_active_menu('backend.website.dashboard.main')) menu-active-bg @endif">
                        <div class="menu-item">
                            <a class="menu-link @if (backend_active_menu('backend.website.dashboard.main')) active @endif"
                                href="{{ route('backend.website.dashboard.main') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Main Dashboard</span>
                            </a>
                        </div>
                    </div>
                </div> --}}
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Features</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item @if (backend_active_menu('backend.features.skills')) here show @endif menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-tag fs-3"></i>
                        </span>
                        <span class="menu-title">Skills</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion @if (backend_active_menu('backend.features.skills')) menu-active-bg @endif">
                        <div class="menu-item">
                            <a class="menu-link @if (backend_active_menu('backend.features.skills.create')) active @endif"
                                href="{{ route('backend.features.skills.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Create new</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (backend_active_menu('backend.features.skills.index')) active @endif"
                                href="{{ route('backend.features.skills.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Manage Skills</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item @if (backend_active_menu('backend.features.techstacks')) here show @endif menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-bar-chart fs-3"></i>
                        </span>
                        <span class="menu-title">Tech Stack</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion @if (backend_active_menu('backend.features.techstacks')) menu-active-bg @endif">
                        <div class="menu-item">
                            <a class="menu-link @if (backend_active_menu('backend.features.techstacks.create')) active @endif"
                                href="{{ route('backend.features.techstacks.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Create new</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (backend_active_menu('backend.features.techstacks.index')) active @endif"
                                href="{{ route('backend.features.techstacks.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Manage Stacks</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item @if (backend_active_menu('backend.features.sociallinks')) here show @endif menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-person-video2 fs-3"></i>
                        </span>
                        <span class="menu-title">Social Link</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion @if (backend_active_menu('backend.features.sociallinks')) menu-active-bg @endif">
                        <div class="menu-item">
                            <a class="menu-link @if (backend_active_menu('backend.features.sociallinks.create')) active @endif"
                                href="{{ route('backend.features.sociallinks.create') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Create new</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (backend_active_menu('backend.features.sociallinks.index')) active @endif"
                                href="{{ route('backend.features.sociallinks.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Manage Links</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Account</span>
                    </div>
                </div>
                @if (Route::has('backend.settings.user.profile.index'))
                    <div class="menu-item">
                        <a href="{{ route('backend.settings.user.profile.index') }}"
                            class="menu-link @if (backend_active_menu('backend.settings.user.profile')) active @endif">
                            <span class="menu-icon">
                                <i class="bi bi-person fs-3"></i>
                            </span>
                            <span class="menu-title">Profile</span>
                        </a>
                    </div>
                @endif
                @if (Route::has('backend.settings.user.password.index'))
                    <div class="menu-item">
                        <a href="{{ route('backend.settings.user.password.index') }}"
                            class="menu-link @if (backend_active_menu('backend.settings.user.password')) active @endif  ">
                            <span class="menu-icon">
                                <i class="bi bi-key fs-3"></i>
                            </span>
                            <span class="menu-title">Password</span>
                        </a>
                    </div>
                @endif
            </div>
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
            class="btn btn-custom btn-primary w-100">
            <span class="btn-label">Logout</span>
            <!--begin:: Icon -->
            <i class="svg-icon btn-icon svg-icon-2 bi bi-power"></i>
            <!--end:: Icon-->
        </a>
    </div>
    <!--end::Footer-->
</div>
