<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <!--begin::Metas-->
    @include('backend.partials._metas')
    <!--end::Metas-->
    <!--begin::Fonts-->
    @include('backend.partials._fonts')
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    @yield('styles')
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    @include('backend.partials._styles')
    <!--end::Global Stylesheets Bundle-->
    <!--Begin::Google Tag Manager -->
    @include('backend.partials._analytics')
    <!--End::Google Tag Manager -->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            @include('backend.partials._sidebar')
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                @include('backend.partials._navbar')
                <!--end::Header-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Toolbar-->
                    @include('backend.partials._breadcrumb')
                    <!--end::Toolbar-->
                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Content-->
                        @yield('content')
                        <!--end::Content-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--begin::Footer-->
                @include('backend.partials._footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Engage toolbar-->
    @include('backend.partials._toolbar')
    <!--end::Engage toolbar-->
    <!--begin::Scrolltop-->
    @include('backend.partials._move_to_top')
    <!--end::Scrolltop-->
    <!--begin::Modals-->
    @include('backend.partials._modals')
    <!--end::Modals-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    @include('backend.partials._scripts')
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    @yield('scripts')
    <!--end::Page Vendors Javascript-->
    <!--end::Javascript-->
    <!--begin::Messages-->
    @include('backend.partials._messages')
    <!--end::Messages-->
</body>
<!--end::Body-->

</html>
