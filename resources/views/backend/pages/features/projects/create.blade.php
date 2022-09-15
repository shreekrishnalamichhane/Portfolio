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
    <script>
        function previewImage() {
            const parent = event.target.parentNode;
            parent.querySelector('img.preview').src = URL.createObjectURL(event.target.files[0]);
            parent.querySelector('a.cancel').classList.remove('d-none');
            parent.querySelector('label').innerHTML = "Change Image";
        }

        function cancelImage(originalLink) {
            const parent = event.target.parentNode;
            parent.querySelector('img.preview').src = originalLink;
            parent.querySelector('a.cancel').classList.add('d-none');
            parent.querySelector('input').value = null;
            parent.querySelector('label').innerHTML = "Select Image";
        }
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
                        <form action="{{ route('backend.features.projects.store') }}" method="POST"
                            enctype="multipart/form-data" id="">
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
                                        id="title" type="text" name="title" value="{{ old('title') }}" required
                                        autocomplete="title" placeholder="Enter title" autofocus />
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
                                        id="duration" type="text" name="duration" value="{{ old('duration') }}" required
                                        autocomplete="duration" placeholder="Enter duration e.g, 2019-2022" />
                                    <!--end::Input-->
                                    @error('duration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                                <!--begin::Image group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-6 fw-bolder text-dark required"
                                        for="cover_img">{{ __('Cover Image') }}
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::File-->
                                    <div class="mb-2" id="">
                                        <label for="cover_img" class="btn btn-sm btn-primary me-2">Select Image</label>
                                        <a class="cancel btn btn-sm btn-light-primary d-none"
                                            onclick="cancelImage('')">Cancel
                                            File</a>
                                        <input type="file" class="d-none" name="cover_img" id="cover_img"
                                            onchange="previewImage()" accept=".png,.jpg,.jpeg">
                                        <br>
                                        <img class="preview pt-3 w-100" src="" alt="">
                                    </div>
                                    @error('cover_img')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <!--end::File-->
                                    <!--begin::Hint-->
                                    <span class="form-text text-muted">Max image size is 2MB. Accepted formats : .png .jpg
                                        .jpeg</span>
                                    <!--end::Hint-->
                                </div>
                                <!--end::Image group-->
                                <!--begin::Textarea group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-6 fw-bolder text-dark required"
                                        for="description">{{ __('Description') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Textarea-->
                                    <textarea name="description" class="form-control form-control-solid @error('description') is-invalid @enderror"
                                        id="description" placeholder="Enter description" rows="5" required></textarea>
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
                                        for="source">{{ __('Source Link (Optional)') }}
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input
                                        class="form-control form-control-lg form-control-solid @error('source') is-invalid @enderror"
                                        id="source" type="url" name="source" value="{{ old('source') }}"
                                        autocomplete="source" placeholder="Enter source link" />
                                    <!--end::Input-->
                                    @error('source')
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
                                        for="demo">{{ __('Demo (Optional)') }}
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input
                                        class="form-control form-control-lg form-control-solid @error('demo') is-invalid @enderror"
                                        id="demo" type="text" name="demo" value="{{ old('demo') }}"
                                        autocomplete="demo" placeholder="Enter demo link" />
                                    <!--end::Input-->
                                    @error('demo')
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
