@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.min.css"
        integrity="sha512-nwpMzLYxfwDnu68Rt9PqLqgVtHkIJxEPrlu3PfTfLQKVgBAlTKDmim1JvCGNyNRtyvCx1nNIVBfYm8UZotWd4Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js"
        integrity="sha512-t4CFex/T+ioTF5y0QZnCY9r5fkE8bMf9uoNH2HNSwsiTaMQMO0C9KbKPMvwWNdVaEO51nDL3pAzg4ydjWXaqbg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#description').trumbowyg();
    </script>
@endsection
@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Content-->
            <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body p-12">
                        <!--begin::Form-->
                        <form action="{{ route('backend.features.workhistories.update', $data['workhistory']?->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Wrapper-->
                            <div class="mb-0">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-6 fw-bolder text-dark required"
                                        for="title">{{ __('Title') }}
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input
                                        class="form-control form-control-lg form-control-solid @error('title') is-invalid @enderror"
                                        id="title" type="text" name="title"
                                        value="{{ $data['workhistory']?->title }}" required autocomplete="title"
                                        placeholder="Enter title e.g, INSTRUCTOR | YOUTUBE, UDEMY, TEACHABLE" />
                                    <!--end::Input-->
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-6 fw-bolder text-dark required"
                                        for="duration">{{ __('Duration') }}
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input
                                        class="form-control form-control-lg form-control-solid @error('duration') is-invalid @enderror"
                                        id="duration" type="text" name="duration"
                                        value="{{ $data['workhistory']?->duration }}" required autocomplete="duration"
                                        placeholder="Enter duration e.g, 2019-2022" />
                                    <!--end::Input-->
                                    @error('duration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                <!--begin::Textarea group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-6 fw-bolder text-dark required"
                                        for="description">{{ __('Description') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Textarea-->
                                    <textarea name="description" class="form-control form-control-solid @error('description') is-invalid @enderror"
                                        id="description" placeholder="Enter description" rows="5" required>{{ $data['workhistory']?->description }}</textarea>
                                    <!--end::Textarea-->
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Textarea group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-6 fw-bolder text-dark"
                                        for="order">{{ __('Order (Optional)') }}
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input
                                        class="form-control form-control-lg form-control-solid @error('order') is-invalid @enderror"
                                        id="order" type="number" name="order"
                                        value="{{ $data['workhistory']?->order }}" autocomplete="order"
                                        placeholder="Enter Order" />
                                    <!--end::Input-->
                                    @error('order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="">
                                    <!--begin::Submit button-->
                                    <button type="submit" class="btn btn-lg btn-primary mb-5">
                                        <span class="indicator-label">Update</span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Wrapper-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout-->
    </div>
    <!--end::Container-->
@endsection
