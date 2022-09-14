@extends('layouts.backend')

@section('styles')
@endsection
@section('scripts')
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
                        <form action="{{ route('backend.features.sociallinks.store') }}" method="POST"
                            enctype="multipart/form-data" id="">
                            @csrf
                            <!--begin::Wrapper-->
                            <div class="mb-0">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-6 fw-bolder text-dark required"
                                        for="name">{{ __('Name') }}
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input
                                        class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                        id="name" type="text" name="name" value="{{ old('name') }}" required
                                        autocomplete="name" placeholder="Enter name" autofocus />
                                    <!--end::Input-->
                                    @error('name')
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
                                        for="link">{{ __('Link') }}
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input
                                        class="form-control form-control-lg form-control-solid @error('link') is-invalid @enderror"
                                        id="link" type="url" name="link" value="{{ old('link') }}" required
                                        autocomplete="link" placeholder="Enter link" />
                                    <!--end::Input-->
                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
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
                                        id="order" type="number" name="order" value="{{ old('order') }}"
                                        autocomplete="order" placeholder="Enter Order" />
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
                                        <span class="indicator-label">Create</span>
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
