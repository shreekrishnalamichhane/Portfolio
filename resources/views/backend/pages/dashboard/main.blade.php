@extends('layouts.backend')

@section('styles')
@endsection

@section('scripts')
@endsection

@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="row">
            <div class="col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                <div class="row g-5 g-xl-10">
                    @foreach ($data['backend_metircs'] as $item)
                        <!--begin::Col-->
                        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Info-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Amount-->
                                            <span
                                                class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $item['recent']['value'] }}</span>
                                            <!--end::Amount-->
                                        </div>
                                        <!--end::Info-->
                                        <!--begin::Subtitle-->
                                        <span
                                            class="text-gray-400 pt-1 fw-semibold fs-6">{{ $item['recent']['title'] }}</span>
                                        <!--end::Subtitle-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <div class="d-flex align-items-center flex-column mt-3 w-100">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-bolder fs-6 text-dark">{{ $item['total']['value'] }}</span>
                                            <!--begin::Subtitle-->
                                            <span
                                                class="text-gray-400 pt-1 fw-semibold fs-6">{{ $item['total']['title'] }}</span>
                                            <!--end::Subtitle-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                    @endforeach
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card card-flush h-lg-50">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <h3 class="card-title text-gray-800">Session Information</h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Section-->
                            <div class="text-gray-700 fw-semibold fs-6 me-2">Last Login</div>
                            <!--end::Section-->
                            <!--begin::Statistics-->
                            <div class="d-flex align-items-senter">
                                <span class="text-gray-400 fw-bold fs-6">
                                    {{ ucfirst(get_time_ago($data['user']->last_login_at)) }}
                                </span>
                            </div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--end::Separator-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Section-->
                            <div class="text-gray-700 fw-semibold fs-6 me-2">Last Login IP</div>
                            <!--end::Section-->
                            <!--begin::Statistics-->
                            <div class="d-flex align-items-senter">
                                <span class="text-gray-400 fw-bold fs-6">
                                    {{ $data['user']->last_login_ip }}
                                </span>
                            </div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--end::Separator-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Section-->
                            <div class="text-gray-700 fw-semibold fs-6 me-2">Last Account Update</div>
                            <!--end::Section-->
                            <!--begin::Statistics-->
                            <div class="d-flex align-items-senter">
                                <span class="text-gray-400 fw-bold fs-6">
                                    {{ ucfirst(get_time_ago($data['user']->updated_at)) }}
                                </span>
                            </div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--end::Separator-->
                    </div>
                    <!--end::Body-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
@endsection
