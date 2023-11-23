{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('styles')
@endsection

@section('info')
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">

        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
            Student Records

            <span class="svg-icon svg-icon-primary svg-icon-2x">
                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Angle-right.svg--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                    viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999) " />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>

            Enrolled Students

            <span class="svg-icon svg-icon-primary svg-icon-2x">
                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Angle-right.svg--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999) " />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>

            View Student

            <span class="svg-icon svg-icon-primary svg-icon-2x">
                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Angle-right.svg--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999) " />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>


            Edit Info
        </h5>
        <!--end::Page Title-->

    </div>
    <!--end::Info-->
@endsection


@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Profile Personal Information-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                    <!--begin::Profile Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Body-->
                        <div class="card-body pt-4">

                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                {{-- <div class="symbol symbol-60 symbol-xxl-100 align-self-start align-self-xxl-center w-100 h-100">
                                <div class="symbol-label" style="background-image:url('/metronic/theme/html/demo1/dist/assets/media/users/300_21.jpg')" style="width: 200px"></div>
                                <i class="symbol-badge bg-success"></i> 
                            </div>
                          <div>
                                <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">James Jones</a>
                                <div class="text-muted">Application Developer</div>
                            </div> --}}


                                <div class="text-center justify-content-center mx-auto my-3">
                                    <img class="rounded"
                                        src="{{ $students->image != null ? url('storage/student/' . $students->image) : asset('media/capellan/no-profile-image.png') }}"
                                        alt="Image" height="150px" width="150px">
                                </div>


                                {{-- <img clas="symbol rounded mx-auto d-block" src="{{ asset('media/logos/capellan_logo.png') }}" alt=""> --}}

                            </div>
                            <!--end::User-->
                            <!--begin::Contact-->
                            {{-- <div class="py-9">
                                
                                <div class="d-flex align-items-center mb-2 ">
                                    <span class="font-weight-bold m-auto font-italic">{{ $students->enrollment->student->std_num }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold m-auto font-italic">{{ $students->enrollment->grade_level->grade_level }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold m-auto font-italic">{{ $students->enrollment->specialization->strand->track->track }}: {{ $students->enrollment->specialization->strand->strand }} ({{ $students->enrollment->specialization->specialization }})</span>
                                </div>
                            </div> --}}
                            <!--end::Contact-->
                            <!--begin::Nav-->
                            <form class="form" action="{{ route('enrolled_student.update', $students->id) }}"
                                role="form" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                                    <input type="file" name="image">
                                    <ul class="nav nav-tabs navi-item mb-2" role="tablist">



                                        <li role="presentation" class="navi-link py-4 mt-4">

                                            <span class="svg-icon svg-icon-2x px-4 active">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                    viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path
                                                            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                        <path
                                                            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                            fill="#000000" fill-rule="nonzero"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <a href="#personal" aria-controls="home" role="tab" data-toggle="tab"><span
                                                    class="navi-text">Personal Info</span></a>
                                        </li>

                                        <li role="presentation" class="navi-link py-4">
                                            <span class="svg-icon svg-icon-2x px-4">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path
                                                            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path
                                                            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <a href="#parent" aria-controls="profile" role="tab"
                                                data-toggle="tab"><span class="navi-text">Parent/Guardian Info</span></a>
                                        </li>

                                        <li role="presentation" class="navi-link py-4">
                                            <span class="svg-icon svg-icon-2x px-4">
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Library.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24" />
                                                        <path
                                                            d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                            fill="#000000" />
                                                        <rect fill="#000000" opacity="0.3"
                                                            transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "
                                                            x="16.3255682" y="2.94551858" width="3" height="18"
                                                            rx="1" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <a href="#school" aria-controls="messages" role="tab"
                                                data-toggle="tab"><span class="navi-text">Previous School Info</span></a>
                                        </li>

                                        {{-- <li role="presentation" class="navi-link py-4">
                                        <span class="svg-icon svg-icon svg-icon-2x px-4"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Book-open.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>
                                                <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                        <a href="#general" role="tab" data-toggle="tab"><span
                                                class="navi-text">General Info</span></a>
                                    </li> --}}
                                        {{-- <li role="presentation" class="navi-link py-4"><a href="#settings"
                                            aria-controls="settings" role="tab" data-toggle="tab">Documents</a></li> --}}
                                    </ul>

                                </div>
                                <!--end::Nav-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Profile Card-->
                </div>
                <!--end::Aside-->
                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-8">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Header-->
                        <div class="card-header py-3 bg-primary">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-light my-auto"> Edit Student Information</h3>
                                {{-- <span class="text-muted font-weight-bold font-size-sm mt-1">This is the student's
                                    information.</span> --}}
                            </div>

                            <div class="card-toolbar">
                                <button class="btn btn-success mr-2" type="Submit"> <span
                                        class="menu-icon flaticon-interface-5">
                                    </span>
                                    Save Changes</button>
                                {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <!--begin::Body-->
                        <div class="card-body">




                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <div>

                                        <!-- Nav tabs -->


                                        <!-- Tab panes -->
                                        <div class="tab-content">




                                            <!-- Personal Information -->
                                            <div role="tabpanel" class="tab-pane active" id="personal">

                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h5 class="font-weight-bold mb-6">Personal Information</h5>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Last Name</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="last_name"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->last_name }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">First Name</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="first_name"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->first_name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Middle Name</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="middle_name"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->middle_name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Extension Name</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="extension"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->extension }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">LRN</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="lrn"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->lrn }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Birthday</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="b_date"
                                                            type="date"
                                                            value="{{ $students->enrollment->student->b_date }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Age</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="age"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->age }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label" for="sex">
                                                        Sex
                                                    </label>
                                                    <select class="form-control form-control-sm col-md-4 ml-4"
                                                        name="sex" width="50px" required>
                                                        <option
                                                            value="Male"{{ $students->enrollment->student->sex == 'Male' ? 'selected' : '' }}>
                                                            Male</option>
                                                        <option
                                                            value="Female"{{ $students->enrollment->student->sex == 'Female' ? 'selected' : '' }}>
                                                            Female</option>

                                                    </select>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Civil Status</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="civil_status"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->civil_status }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Nationality</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="nationality"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->nationality }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Contact Number</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="contact_num"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->contact_num }}">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h5 class="font-weight-bold mt-10 mb-6">Address</h5>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">House
                                                        Number/Street</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="house_num"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->house_num }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Purok</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="purok"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->purok }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Barangay</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="brgy"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->brgy }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Municipality</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="municipality"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->municipality }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Province</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="province"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->province }}">
                                                    </div>
                                                </div>


                                            </div>

                                            <!-- Parents/Guardians Information -->
                                            <div role="tabpanel" class="tab-pane" id="parent">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h5 class="font-weight-bold mb-6">Parents/Guardian Information</h5>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Father's Name</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="f_name"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->f_name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Father's
                                                        Occupation</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="f_occu"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->f_occu }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Mother's Name</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="m_name"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->m_name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Mother's
                                                        Occupation</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="m_occu"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->m_occu }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Guardian's
                                                        Name</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="g_name"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->g_name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Relationship</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="relationship"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->relationship }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Guardian's Contact
                                                        Number</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="g_contact_num"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->g_contact_num }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Guardian's
                                                        Address</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="g_add"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->g_add }}">
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- School Info --}}
                                            <div role="tabpanel" class="tab-pane" id="school">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h5 class="font-weight-bold mb-6">Previous School Information</h5>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">School Last
                                                        Attended</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="prev_school"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->prev_school }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    {{-- <label class="col-xl-3 col-lg-12 col-form-label">Previous School Type</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm" name="prev_school_type"
                                                                type="text" value="{{ $students->enrollment->student->prev_school_type }}"
                                                                >
                                                        </div> --}}

                                                    <label class="col-xl-3 col-lg-12 col-form-label"
                                                        for="prev_school_type">
                                                        Previous School Type
                                                    </label>
                                                    <select class="form-control form-control-sm col-md-4 ml-4"
                                                        name="prev_school_type" width="50px" required>
                                                        <option
                                                            value="Public"{{ $students->enrollment->student->prev_school_type == 'Public' ? 'selected' : '' }}>
                                                            Public</option>
                                                        <option
                                                            value="Private"{{ $students->enrollment->student->prev_school_type == 'Private' ? 'selected' : '' }}>
                                                            Private</option>
                                                        <option
                                                            value="ALS"{{ $students->enrollment->student->prev_school_type == 'ALS' ? 'selected' : '' }}>
                                                            ALS</option>
                                                        <option
                                                            value="Transferee"{{ $students->enrollment->student->prev_school_type == 'Transferee' ? 'selected' : '' }}>
                                                            Transferee</option>
                                                    </select>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">No. of Years in
                                                        JHS</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="jhs_yrs"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->jhs_yrs }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">Year Graduated</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="year_grad"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->year_grad }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-2">
                                                    <label class="col-xl-3 col-lg-12 col-form-label">General
                                                        Average</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <input class="form-control form-control-sm" name="gen_ave"
                                                            type="text"
                                                            value="{{ $students->enrollment->student->gen_ave }}">
                                                    </div>
                                                </div>


                                                <br>
                                                <div class="table-responsive mt-5">
                                                    <!--begin: Datatable-->
                                                    <table class="table table-separate table-head-custom mt-4"
                                                        id="example">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th>Year Graduated</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td class="font-weight-bolder">Primary Grade</td>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="prim_grade"
                                                                        value="{{ $students->enrollment->student->prim_grade }}">
                                                                </td>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="prim_grade_yr"
                                                                        value="{{ $students->enrollment->student->prim_grade_yr }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="font-weight-bolder">Intermediate Grade</td>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="intermediate"
                                                                        value="{{ $students->enrollment->student->intermediate }}">
                                                                </td>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="intermediate_yr"
                                                                        value="{{ $students->enrollment->student->intermediate_yr }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="font-weight-bolder">Junior High School</td>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="junior_hs"
                                                                        value="{{ $students->enrollment->student->junior_hs }}">
                                                                </td>
                                                                <td><input class="form-control form-control-sm"
                                                                        type="text" name="intermediate_yr"
                                                                        value="{{ $students->enrollment->student->junior_hs_yr }}">
                                                                </td>
                                                            </tr>

                                                        </tbody>

                                                    </table>
                                                    <!--end: Datatable-->
                                                </div>


                                            </div>

                                            <!-- General Information -->
                                            {{-- <div role="tabpanel" class="tab-pane" id="general">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="std_num">Student No.</label>
                                                                <input type="number" class="form-control" id="std_num" name="std_num"
                                                                    placeholder="Student No." value="{{ $students->enrollment->student->std_num }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="section">
                                                                School Year
                                                            </label>
                                                            <select class="custom-select custom-select-sm" name="school_year">
                                                                <option selected >Choose School Year</option>
                                                                @foreach ($schoolyears as $schoolyear)
                                                                    <option value="{{ $schoolyear->id }}">{{ $schoolyear->school_year }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                        
                                                        <div class="col-md-6">
                                                            <label for="section">
                                                                Semester
                                                            </label>
                                                            <select class="custom-select custom-select-sm" name="sem">
                                                                <option selected >Choose Sem</option>
                                                                @foreach ($sems as $sem)
                                                                    <option value="{{ $sem->id }}">Semester {{ $sem->sem }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                        
                                                    <div class="row pt-4">
                        
                                                        <div class="col-md-6">
                                                            <label for="grade">
                                                            
                                                                Grade
                                                            </label>
                                                            <select class="custom-select custom-select-sm" name="grade_level">
                                                                <option selected >Choose Grade level</option>
                                                                @foreach ($gradelevels as $gradelevel)
                                                                    <option value="{{ $gradelevel->id }}">{{ $gradelevel->grade_level }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="track">Track:</label>
                                                           
                        
                                                            <select name="track" id="track" class="form-control">
                                                                <option selected >Select Track</option>
                                                                @foreach ($tracks as $track)
                                                                    <option value="{{ $track->id }}">{{ $track->track }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-4">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="strand">Strand:</label>
                                                                <select name="strand" id="strand" class="form-control"></select>
                                                            </div>
                        
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="specialization">Specialization:</label>
                                                                <select name="specialization" id="specialization" class="form-control"></select>
                                                            </div>
                                                        </div>
                                                    </div> 

                                                </div> --}}


                                            <div role="tabpanel" class="tab-pane" id="settings">Settings</div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--end::Body-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>



            </div>
            <!--end::Content-->
        </div>
        <!--end::Profile Personal Information-->
    </div>
    <!--end::Container-->
@endsection

{{-- Scripts Section --}}
@section('scripts')
    {{-- <script>
        var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
triggerTabList.forEach(function (triggerEl) {
  var tabTrigger = new bootstrap.Tab(triggerEl)

  triggerEl.addEventListener('click', function (event) {
    event.preventDefault()
    tabTrigger.show()
  })
})
    </script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
