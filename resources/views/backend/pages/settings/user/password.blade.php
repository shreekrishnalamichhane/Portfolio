@extends('layouts.backend')

@section('scripts')
    <script>
        Inputmask({
            "mask": "(999) 999-9999",
            "placeholder": "(___) ___-____",
        }).mask("#phone");
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
                                @if (isset($data['user']->phone))
                                    <!--begin::Details item-->
                                    <div class="fw-bolder mt-5">Phone</div>
                                    <div class="text-gray-600">
                                        <a href="tel:{{ $data['user']->phone }}"
                                            class="text-gray-600 text-hover-primary">{{ $data['user']->phone }}</a>
                                    </div>
                                    <!--end::Details item-->
                                @endif
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
                            <h2>Password</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 pb-5">
                        <!--begin::Form-->
                        <form id="" class="form" method="POST"
                            action="{{ route('backend.settings.user.password.update') }}">
                            @csrf
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <div class="col-md-12">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">Current Password</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Enter your current password"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text"
                                        class="form-control form-control-solid @error('current_password') is-invalid @enderror"
                                        name="current_password" value="" required autofocus
                                        autocomplete="current-password" />
                                    <!--end::Input-->
                                    @error('current_password')
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
                                        <span class="required">New Password</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Enter a new password"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text"
                                        class="form-control form-control-solid @error('password') is-invalid @enderror"
                                        name="password" value="" />
                                    <!--end::Input-->
                                    @error('password')
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
                                        <span class="required">Confirm Password</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Enter new password again"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text"
                                        class="form-control form-control-solid @error('password') is-invalid @enderror"
                                        name="password_confirmation" value="" />
                                    <!--end::Input-->
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
                <!--begin::Card-->
                <div class="card pt-4 mb-6 mb-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Two Factor Authentication</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0 pb-5">
                        <!--begin::Accordion-->
                        <div class="accordion accordion-icon-toggle" id="learn-more-about-2fa-parent">
                            <!--begin::Item-->
                            <div class="mb-5">
                                <!--begin::Header-->
                                <div class="accordion-header py-3 d-flex collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#learn-more-about-2fa" aria-expanded="false">
                                    <span class="accordion-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                        <span class="svg-icon svg-icon-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="18" y="13" width="13"
                                                    height="2" rx="1" transform="rotate(-180 18 13)"
                                                    fill="currentColor"></rect>
                                                <path
                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <h3 class="fs-4 fw-bold mb-0 ms-4">To
                                        Learn More about 2FA, Click Here.</h3>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div id="learn-more-about-2fa" class="fs-6 ps-10 collapse text-gray-600"
                                    data-bs-parent="#learn-more-about-2fa-parent">
                                    Two factor authentication (2FA) strengthens access security by
                                    requiring two methods (also referred to as factors) to verify
                                    your identity. Two factor authentication protects against phishing,
                                    social engineering and password brute force attacks and secures
                                    your logins from attackers exploiting weak or stolen credentials.
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Accordion-->
                        @if ($data['user']->loginSecurity == null)
                            <!--begin:Alert -->
                            <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                                <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-danger">2 Factor Authentication is not active.</h4>
                                    <span>To enable, please click on generate button below</span>
                                </div>
                            </div>
                            <!--end:Alert -->
                            <!--begin::Form-->
                            <form id="" class="form" method="POST"
                                action="{{ route('generate2faSecret') }}">
                                @csrf
                                {{-- <!--begin::Input group-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-12">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">Current Password</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Enter your current password"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text"
                                            class="form-control form-control-solid @error('current_password') is-invalid @enderror"
                                            name="current_password" value="" required autofocus
                                            autocomplete="current-password" />
                                        <!--end::Input-->
                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end::Input group--> --}}
                                <!--begin::Action buttons-->
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <!--begin::Separator-->
                                        <div class="separator mb-6"></div>
                                        <!--end::Separator-->
                                        <div class="d-flex justify-content-end">
                                            <!--begin::Button-->
                                            <button type="submit" class="btn btn-primary">Generate Secret Token</button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Action buttons-->
                            </form>
                            <!--end::Form-->
                        @elseif(!$data['user']->loginSecurity->google2fa_enable)
                            1. Scan this QR code with your Google Authenticator App. Alternatively, you can use the code:
                            <br>
                            <code>{{ $data['2fa']['secret'] }}</code><br />
                            {!! $data['2fa']['google2fa_url'] !!}
                            <br /><br />
                            2. Enter the pin from Authenticator app:<br /><br />
                            <!--begin::Form-->
                            <form id="" class="form" method="POST" action="{{ route('enable2fa') }}">
                                @csrf
                                <!--begin::Input group-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-12">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">Authenticator Code</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Enter your code from authenticator"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number"
                                            class="form-control form-control-solid @error('secret') is-invalid @enderror"
                                            name="secret" value="" required autofocus
                                            autocomplete="current-password" />
                                        <!--end::Input-->
                                        @error('secret')
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
                                            <button type="submit" class="btn btn-primary">Enable 2FA</button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Action buttons-->
                            </form>
                            <!--end::Form-->
                        @elseif($data['user']->loginSecurity->google2fa_enable && $data['user']->loginSecurity->google2fa_enable)
                            <!--begin:Alert -->
                            <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                                <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3"
                                            d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-success">2 Factor Authentication is active.</h4>
                                    <span>To disable, please enter your password below & click on disable button.</span>
                                </div>
                            </div>
                            <!--end:Alert -->
                            <!--begin::Form-->
                            <form id="" class="form" method="POST" action="{{ route('disable2fa') }}">
                                @csrf
                                <!--begin::Input group-->
                                <div class="row fv-row mb-7">
                                    <div class="col-md-12">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">Current Password</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Enter your current password"></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text"
                                            class="form-control form-control-solid @error('current_password_2fa') is-invalid @enderror"
                                            name="current_password_2fa" value="" required autofocus
                                            autocomplete="current-password" />
                                        <!--end::Input-->
                                        @error('current_password_2fa')
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
                                            <button type="submit" class="btn btn-primary">Disable 2FA</button>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Action buttons-->
                            </form>
                            <!--end::Form-->
                        @endif
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
