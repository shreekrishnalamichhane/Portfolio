<!DOCTYPE html>
<html>

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

<body>
    <main class="py-5 mt-5">
        @yield('content')
    </main>
</body>

</html>
