<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toastr-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
</script>

@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            toastr.error(`{{ $error }}`);
        </script>
    @endforeach
@endif
@if (session('success'))
    <script>
        toastr.success(`{{ session('success') }}`);
    </script>
@endif
@if (session('warning'))
    <script>
        toastr.warning(`{{ session('warning') }}`);
    </script>
@endif
@if (session('danger'))
    <script>
        toastr.error(`{{ session('danger') }}`);
    </script>
@endif
@if (session('info'))
    <script>
        toastr.info(`{{ session('info') }}`);
    </script>
@endif
