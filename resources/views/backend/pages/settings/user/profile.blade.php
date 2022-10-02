@extends('layouts.backend')

@section('scripts')
    <script>
        Inputmask({
            "mask": "(999) 999-9999",
            "placeholder": "(___) ___-____",
        }).mask("#phone");
    </script>
    <script>
        function previewFile() {
            const parent = event.target.parentNode;
            parent.querySelector('p.preview').innerHTML =
                event.target.files[0].name +
                " ( " + formatBytes(event.target.files[0].size) + " )";
            parent.querySelector('a.cancel').classList.remove('d-none');
        }

        function cancelFile(originalName) {
            const parent = event.target.parentNode;
            parent.querySelector('p.preview').innerHTML = originalName;
            parent.querySelector('a.cancel').classList.add('d-none');
            parent.querySelector('input').value = null;
        }
    </script>
@endsection

@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                <!--begin::Card-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Summary-->
                        <!--begin::User Info-->
                        <div class="d-flex flex-center flex-column py-5">
                            <!--begin::Avatar-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-circle" data-kt-image-input="true"
                                style="background-image: url({{ get_public_path() . '/storage/usercontents/avatars/default.png' }})">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url({{ get_public_path() . $data['user']->avatar }})"></div>
                                <!--end::Image preview wrapper-->
                                <form action="{{ route('backend.settings.user.avatar.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <!--begin::Edit button-->
                                    <label
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg, .jtif, .svg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Edit button-->
                                    <!--begin::Cancel button-->
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel button-->
                                    <!--begin::Save button-->
                                    <button
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-success w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="save" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Save avatar" role="button" type="submit">
                                        <i class="bi bi-check2 fs-2"></i>
                                    </button>
                                    <!--end::Save button-->
                                </form>
                            </div>
                            <!--end::Image input-->
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <a href="#"
                                class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-0">{{ $data['user']->name }}</a>
                            <!--end::Name-->
                        </div>
                        <!--end::User Info-->
                        <!--end::Summary-->
                        <!--begin::Details toggle-->
                        <div class="d-flex flex-stack fs-4 py-3">
                            <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details"
                                role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                                <span class="ms-2 rotate-180">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                        </div>
                        <!--end::Details toggle-->
                        <div class="separator"></div>
                        <!--begin::Details content-->
                        <div id="kt_user_view_details" class="collapse show">
                            <div class="pb-5 fs-6">
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">Account ID</div>
                                <div class="text-gray-600">{{ $data['user']->id }}</div>
                                <!--end::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">Email</div>
                                <div class="text-gray-600">
                                    <a href="mailto:{{ $data['user']->email }}"
                                        class="text-gray-600 text-hover-primary">{{ $data['user']->email }}</a>
                                </div>
                                <!--end::Details item-->
                                @if (isset($data['user']->last_login_at))
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Last Login</div>
                                    <div class="text-gray-600">
                                        {{ date('D, d F Y h:i:s A', strtotime($data['user']->last_login_at)) }}
                                        <br>
                                        ({{ get_time_ago($data['user']->last_login_at) }})
                                    </div>
                                    <!--end::Details item-->
                                @endif
                                @if (isset($data['user']->last_login_ip))
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Last Login IP</div>
                                    <div class="text-gray-600">{{ $data['user']->last_login_ip }}</div>
                                    <!--end::Details item-->
                                @endif
                                @if (isset($data['user']->updated_at))
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Last Account Update</div>
                                    <div class="text-gray-600">
                                        {{ date('D, d F Y h:i:s A', strtotime($data['user']->updated_at)) }}
                                        <br>
                                        ({{ get_time_ago($data['user']->updated_at) }})
                                    </div>
                                    <!--end::Details item-->
                                @endif
                                @if (isset($data['user']->created_at))
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Account Created At</div>
                                    <div class="text-gray-600">
                                        {{ date('D, d F Y h:i:s A', strtotime($data['user']->created_at)) }}
                                        <br>
                                        ({{ get_time_ago($data['user']->created_at) }})
                                    </div>
                                    <!--end::Details item-->
                                @endif
                            </div>
                        </div>
                        <!--end::Details content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <!--begin::Card-->
                <div class="card pt-4 mb-6 mb-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>User Profile</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 pb-5">
                        <!--begin::Form-->
                        <form id="" class="form" method="POST"
                            action="{{ route('backend.settings.user.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-12">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Full Name</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Enter your full name"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text"
                                        class="form-control form-control-solid @error('name') is-invalid @enderror"
                                        name="name" value="{{ $data['user']->name }}" />
                                    <!--end::Input-->
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-12">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Email</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Your email address (readonly)"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email"
                                        class="form-control form-control-solid @error('email') is-invalid @enderror"
                                        name="email" readonly value="{{ $data['user']->email }}" />
                                    <!--end::Input-->
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-12">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Bio</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Enter some words about yourself (Max : 2048 Chars )"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea class="form-control form-control-solid @error('bio') is-invalid @enderror" name="bio" required>{{ $data['user']->bio }}</textarea>
                                    <!--end::Input-->
                                    @error('bio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::File group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark required"
                                    for="resume">{{ __('Resume') }}
                                </label>
                                <!--end::Label-->
                                <!--begin::File-->
                                <div class="mb-2" id="">
                                    <label for="resume" class="btn btn-sm btn-primary me-2">Select File</label>
                                    <a class="cancel btn btn-sm btn-light-primary d-none" onclick="cancelFile('')">Cancel
                                        File</a>
                                    <input type="file" class="d-none" name="resume" id="resume"
                                        onchange="previewFile()" accept=".pdf">
                                    <br>
                                    <p class="preview mt-3"></p>
                                    @if ($data['user']->resume)
                                        <a href="{{ get_public_path() . $data['user']->resume }}" target="_blank">Preview
                                            Saved File</a>
                                    @endif
                                </div>
                                @error('resume')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::File-->
                                <!--begin::Hint-->
                                <span class="form-text text-muted">Max file size is 5MB. Accepted formats :
                                    .pdf</span>
                                <!--end::Hint-->
                            </div>
                            <!--end::File group-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-12">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3 required">
                                        <span class="">Twitter Handle</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Enter your twitter handle"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div class="input-group mb-5">
                                        <span class="input-group-text">@</span>
                                        <input type="text"
                                            class="form-control form-control-solid @error('twitter_handle') is-invalid @enderror"
                                            id="twitter_handle" name="twitter_handle"
                                            value="{{ $data['user']->twitter_handle }}" />
                                    </div>
                                    <!--end::Input-->
                                    @error('twitter_handle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-12">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="">Phone</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Enter your phone number (optional)"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="tel"
                                        class="form-control form-control-solid @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ $data['user']->phone }}" />
                                    <!--end::Input-->
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Action buttons-->
                            <div class="row">
                                <div class="col-md-12 ">
                                    <!--begin::Separator-->
                                    <div class="separator mb-6"></div>
                                    <!--end::Separator-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <button type="reset" class="btn btn-light me-3">Reset</button>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Action buttons-->
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
