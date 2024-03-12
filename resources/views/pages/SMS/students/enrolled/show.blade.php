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

      <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Angle-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24"/>
            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
        </g>
    </svg><!--end::Svg Icon--></span>

      Enrolled Students
      
      <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Angle-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24"/>
            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
        </g>
    </svg><!--end::Svg Icon--></span>
      
      View Student
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
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-center">
                                <div class="dropdown dropdown-inline">
                                    <a href="{{ route('sis.index', $student->enrollment->student->id) }}"
                                        class="btn btn-clean btn-hover-light-primary">
                                        <span class="text-primary">
                                            Print Student Information
                                        </span>
                                        <i class="flaticon2-printer"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        {{-- <ul class="navi navi-hover py-5">
                                            <li class="navi-item">
                                                <a href="{{ route('sis.index', $student->enrollment->student->id) }}" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon-attachment"></i>
                                                    </span>
                                                    <span class="navi-text text-center">Student Information Sheet</span>
                                                </a>
                                            </li>
                                             <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-list-3"></i>
                                                    </span>
                                                    <span class="navi-text">Contacts</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-rocket-1"></i>
                                                    </span>
                                                    <span class="navi-text">Groups</span>
                                                    <span class="navi-link-badge">
                                                        <span
                                                            class="label label-light-primary label-inline font-weight-bold">new</span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-bell-2"></i>
                                                    </span>
                                                    <span class="navi-text">Calls</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-gear"></i>
                                                    </span>
                                                    <span class="navi-text">Settings</span>
                                                </a>
                                            </li>
                                            <li class="navi-separator my-3"></li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-magnifier-tool"></i>
                                                    </span>
                                                    <span class="navi-text">Help</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-bell-2"></i>
                                                    </span>
                                                    <span class="navi-text">Privacy</span>
                                                    <span class="navi-link-badge">
                                                        <span
                                                            class="label label-light-danger label-rounded font-weight-bold">5</span>
                                                    </span>
                                                </a>
                                            </li> 
                                        </ul> --}}
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Toolbar-->
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
                                    <img class="rounded" src="{{ $student->image != null ? asset('storage/student/' . $student->image) : asset('media/capellan/no-profile-image.png')  }}"
                                        alt="Image" height="150px" width="150px">
                                   
                                </div>
                                {{-- <img clas="symbol rounded mx-auto d-block" src="{{ asset('media/logos/capellan_logo.png') }}" alt=""> --}}

                            </div>
                            <!--end::User-->
                            <!--begin::Contact-->
                            <div class="py-9 text-center">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span
                                        class="font-weight-bold m-auto font-weight-bolder text-center">{{ $student->enrollment->student->last_name }},
                                        {{ $student->enrollment->student->first_name }}
                                        {{ $student->enrollment->student->middle_name }}
                                        {{ $student->enrollment->student->extension }}</span>
                                        

                                    {{-- <p class="text-muted text-hover-primary">{{$student->enrollment->student->last_name}}, {{$student->enrollment->student->first_name}} {{$student->enrollment->student->middle_name}} {{$student->enrollment->student->extension}}</p> --}}
                                </div>
                                <div class="d-flex align-items-center mb-2 ">
                                    <span
                                        class="font-weight-bold m-auto font-weight-bolder">{{ $student->enrollment->student->std_num }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span
                                        class="font-weight-bold m-auto font-weight-bolder">{{ $student->enrollment->grade_level->grade_level }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span
                                        class="font-weight-bold m-auto font-weight-bolder">{{ $student->enrollment->specialization->strand->track->track }}:
                                        {{ $student->enrollment->specialization->strand->strand }}
                                        ({{ $student->enrollment->specialization->specialization }})</span>
                                </div>
                            </div>
                            <!--end::Contact-->
                            <!--begin::Nav-->
                            <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                                {{-- <div class="navi-item mb-2">
                                <a href="/metronic/demo1/custom/apps/profile/profile-1/overview.html" class="navi-link py-4">
                                    <span class="navi-icon mr-2">
                                        <span class="svg-icon">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
                                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span class="navi-text font-size-lg">Generate Enrollment Form</span>
                                </a>
                            </div> --}}



                                <ul class="nav nav-tabs navi-item mb-2" role="tablist">
                                    <li role="presentation" class="navi-link py-4 active">

                                        <span class="svg-icon svg-icon-2x px-4">
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
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
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
                                        <a href="#parent" aria-controls="profile" role="tab" data-toggle="tab"><span
                                                class="navi-text">Parent/Guardian Info</span></a>
                                    </li>

                                    <li role="presentation" class="navi-link py-4">
                                        <span class="svg-icon svg-icon-2x px-4">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Library.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
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
                                    {{-- <li role="presentation" class="navi-link py-4"><a href="#settings"
                                            aria-controls="settings" role="tab" data-toggle="tab">Documents</a></li> --}}

                                    <li role="presentation" class="navi-link py-4">

                                        <span class="svg-icon svg-icon-2x px-4">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Mail-attachment.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <path
                                                        d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>


                                        <a href="#documents" aria-controls="documents" role="tab"
                                            data-toggle="tab"><span class="navi-text">Documents Submission</span></a>
                                    </li>
                                    <li role="presentation" class="navi-link py-4 d-flex justify-content-center mt-5">
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#dropStudent">Drop
                                            this student</button>
                                    </li>
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
                                <h3 class="card-label font-weight-bolder text-light my-auto">Student Information</h3>
                                {{-- <span class="text-muted font-weight-bold font-size-sm mt-1">This is the student's
                                    information.</span> --}}
                            </div>
                            @can('Student Records Permission')
                            <div class="card-toolbar">
                                <a class="btn btn-success mr-2"
                                    href="{{ route('enrolled_student.edit', $student->enrollment->student->id) }}">
                                    <span class="menu-icon flaticon-edit-1">
                                    </span>
                                    Edit Info</a>
                                {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                            </div>
                            @endcan
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form class="form">
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
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->last_name }}"
                                                                disabled>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">First Name</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->first_name }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Middle
                                                            Name</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->middle_name }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Extension
                                                            Name</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->extension }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">LRN</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->lrn }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Birthday</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ \Carbon\Carbon::parse($student->enrollment->student->b_date )->format('F d, Y') }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Age</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->age }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Sex</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->sex }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Civil
                                                            Status</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->civil_status }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label
                                                            class="col-xl-3 col-lg-12 col-form-label">Nationality</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->nationality }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Contact
                                                            Number</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->contact_num }}"
                                                                disabled>
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
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->house_num }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Purok</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->purok }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Barangay</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->brgy }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label
                                                            class="col-xl-3 col-lg-12 col-form-label">Municipality</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->municipality }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Province</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->province }}"
                                                                disabled>
                                                        </div>
                                                    </div>


                                                </div>

                                                <!-- Parents/Guardians Information -->
                                                <div role="tabpanel" class="tab-pane" id="parent">
                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">Parents/Guardian Information
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Father's
                                                            Name</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->f_name }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Father's
                                                            Occupation</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->f_occu }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Mother's
                                                            Name</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->m_name }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Mother's
                                                            Occupation</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->m_occu }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Guardian's
                                                            Name</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->g_name }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label
                                                            class="col-xl-3 col-lg-12 col-form-label">Relationship</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->relationship }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Guardian's Contact
                                                            Number</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->g_contact_num }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Guardian's
                                                            Address</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->g_add }}"
                                                                disabled>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- School Information -->
                                                <div role="tabpanel" class="tab-pane" id="school">
                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">Previous School Information
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">School Last
                                                            Attended</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->prev_school }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Previous School
                                                            Type</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->prev_school_type }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">No. of Years in
                                                            JHS</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->jhs_yrs }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">Year
                                                            Graduated</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->year_grad }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-2">
                                                        <label class="col-xl-3 col-lg-12 col-form-label">General
                                                            Average</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input class="form-control form-control-sm form-control-solid"
                                                                type="text"
                                                                value="{{ $student->enrollment->student->gen_ave }}"
                                                                disabled>
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
                                                                    <td>{{ $student->enrollment->student->prim_grade }}
                                                                    </td>
                                                                    <td>{{ $student->enrollment->student->prim_grade_yr }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bolder">Intermediate Grade</td>
                                                                    <td>{{ $student->enrollment->student->intermediate }}
                                                                    </td>
                                                                    <td>{{ $student->enrollment->student->intermediate_yr }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bolder">Junior High School</td>
                                                                    <td>{{ $student->enrollment->student->junior_hs }}
                                                                    </td>
                                                                    <td>{{ $student->enrollment->student->junior_hs_yr }}
                                                                    </td>
                                                                </tr>
                                                                {{-- <tr>
                                                                    <td class="font-weight-bolder">Senior High School</td>
                                                                    <td>{{ $student->enrollment->student->sr_hs }}</td>
                                                                    <td>{{ $student->enrollment->student->sr_hs_yr }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-weight-bolder">College</td>
                                                                    <td>{{ $student->enrollment->student->college }}
                                                                    </td>
                                                                    <td>{{ $student->enrollment->student->college_yr }}
                                                                    </td>
                                                                </tr> --}}
                                                            </tbody>

                                                        </table>
                                                        <!--end: Datatable-->
                                                    </div>


                                                </div>

                                                <!-- Documents Information -->
                                                <div role="tabpanel" class="tab-pane" id="documents">
                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">Documents Submission</h5>
                                                        </div>
                                                    </div>

                                                    <ul class="list-group pl-5">

                                                        <p> <strong class="mr-3">Form 137:
                                                                @if (!empty($student->document->Form137))
                                                                    <span class="text-success"> Submitted</span>

                                                                    @if ($student->document->Form137_Document != null)
                                                                        <p class="mr-0 mb-0 font-italic font-weight-light">
                                                                            Document:
                                                                            <a
                                                                                href="{{ route('document.download', [$student->document->id, $student->document->Form137_Document]) }}">{{ $student->document->Form137_Document }}</a>
                                                                        </p>
                                                                    
                                                                    @endif
                                                                @else
                                                                    <span class="text-danger">Not Submitted</span>
                                                                @endif
                                                            </strong></p>
                                                        <p> <strong class="mr-3">JHS cert:
                                                                @if (!empty($student->document->JHS_cert))
                                                                    <span class="text-success"> Submitted</span>

                                                                    @if ($student->document->JHS_cert_Document != null)
                                                                        <p class="mr-0 mb-0 font-italic font-weight-light">
                                                                            Document:
                                                                            <a
                                                                                href="{{ route('document.download', [$student->document->id, $student->document->JHS_cert_Document]) }}">{{ $student->document->JHS_cert_Document }}</a>
                                                                        </p>
                                                                    @endif
                                                                @else
                                                                    <span class="text-danger">Not Submitted</span>
                                                                @endif
                                                            </strong></p>
                                                        <p> <strong class="mr-3">PSA (Xerox Copy):
                                                                @if (!empty($student->document->PSA))
                                                                    <span class="text-success"> Submitted</span>

                                                                    @if ($student->document->PSA_Document != null)
                                                                        <p class="mr-0 mb-0 font-italic font-weight-light">
                                                                            Document:
                                                                            <a
                                                                                href="{{ route('document.download', [$student->document->id, $student->document->PSA_Document]) }}">{{ $student->document->PSA_Document }}</a>
                                                                        </p>
                                                                    @endif
                                                                @else
                                                                    <span class="text-danger">Not Submitted</span>
                                                                @endif

                                                            </strong></p>
                                                        <p> <strong class="mr-3">Good Moral (Original Copy):
                                                                @if (!empty($student->document->GoodMoral))
                                                                    <span class="text-success"> Submitted</span>

                                                                    @if ($student->document->GoodMoral_Document != null)
                                                                        <p class="mr-0 mb-0 font-italic font-weight-light">
                                                                            Document:
                                                                            <a
                                                                                href="{{ route('document.download', [$student->document->id, $student->document->GoodMoral_Document]) }}">{{ $student->document->GoodMoral_Document }}</a>
                                                                        </p>
                                                                    @endif
                                                                @else
                                                                    <span class="text-danger">Not Submitted</span>
                                                                @endif
                                                            </strong></p>
                                                        <p> <strong class="mr-3">Card:
                                                                @if (!empty($student->document->Card))
                                                                    <span class="text-success"> Submitted</span>

                                                                    @if ($student->document->Card_Document != null)
                                                                        <p class="mr-0 mb-0 font-italic font-weight-light">
                                                                            Document:
                                                                            <a
                                                                                href="{{ route('document.download', [$student->document->id, $student->document->Card_Document]) }}">{{ $student->document->Card_Document }}</a>
                                                                        </p>
                                                                    @endif
                                                                @else
                                                                    <span class="text-danger">Not Submitted</span>
                                                                @endif
                                                            </strong></p>

                                                        {{-- <li class="list-group-item mx-5">
                                                            <p class="font-weight-bolder mb-0">Form 137: <span
                                                                    class="text-primary">Submitted</span></p>
                                                        </li>
                                                        <li class="list-group-item mx-5">
                                                            <p class="font-weight-bolder mb-0">NSO/PSA: <span
                                                                    class="text-danger">Not Submitted</span></p>
                                                        </li>
                                                        <li class="list-group-item mx-5">
                                                            <p class="font-weight-bolder mb-0">JHS Certificate: <span
                                                                    class="text-danger">Not Submitted</span></p>
                                                        </li>
                                                        <li class="list-group-item mx-5">
                                                            <p class="font-weight-bolder mb-0">Certificate of Good Moral:
                                                                <span class="text-danger">Not Submitted</span>
                                                            </p>
                                                        </li>
                                                        <li class="list-group-item mx-5">
                                                            <p class="font-weight-bolder mb-0">Card: <span
                                                                    class="text-danger">Not Submitted</span></p>
                                                        </li> --}}
                                                    </ul>



                                                    <div class="d-flex justify-content-end mt-5">
                                                        @if (!empty($student->document->student_id))
                                                            @if (empty($student->document->Form137 && $student->document->JHS_cert && $student->document->PSA && $student->document->GoodMoral && $student->document->Card))
                                                                <button type="button" data-toggle="modal"
                                                                    data-target="#submitDocumentUpdate"
                                                                    class="btn btn-sm btn-outline-primary"
                                                                    style="margin-bottom: 10px; float:right;">Submit
                                                                    Document (Update)
                                                                </button>
                                                            @endif
                                                        @else
                                                            <button type="button" class="btn btn-success mr-2"
                                                                data-toggle="modal" data-target="#submitDocument">
                                                                <span
                                                                    class="menu-icon 
                                                                flaticon-folder">
                                                                </span>
                                                                Submit Document</button>
                                                        @endif

                                                    </div>

                                                </div>

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

                <!-- Documents store Modal-->
                <div class="modal fade" id="submitDocument" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Requirements/Documents</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>


                            <form action="{{ route('document.store', $student->enrollment->student->id) }}"
                                method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    @method('POST')
                                    <div class="row mb-5">
                                        <div class="col-12 p-2 pl-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value="Submitted"
                                                            id="form137" name="form137">
                                                        <label class="form-check-label" for="form137">
                                                            Form 137
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="file" name="form137file">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-12 p-2 pl-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value="Submitted"
                                                            id="JHS_cert" name="JHS_cert">
                                                        <label class="form-check-label" for="JHS_cert">
                                                            JHS Certification
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="file" name="JHS_certfile">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-12 p-2 pl-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value="Submitted"
                                                            id="PSA" name="PSA">
                                                        <label class="form-check-label" for="PSA">
                                                            PSA (Xerox Copy)
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="file" name="PSAfile">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-12 p-2 pl-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value="Submitted"
                                                            id="goodmoral" name="goodmoral">
                                                        <label class="form-check-label" for="goodmoral">
                                                            Good Moral (Original Copy)
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="file" name="goodmoralfile">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-12 p-2 pl-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" value="Submitted"
                                                            id="Card" name="Card">
                                                        <label class="form-check-label" for="Card">
                                                            Card
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="file" name="Cardfile">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger mt-4" data-dismiss="modal">
                                        Cancel</button>
                                    <button type="submit" class="btn btn-primary mt-4 mr-2">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- Documents update Modal-->
                <div class="modal fade" id="submitDocumentUpdate" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Requirements/Documents</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>


                            <form action="{{ route('document.update', $student->id) }}" method="post"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    @method('POST')
                                    <div class="row mb-5">
                                        @if (!empty($student->document->Form137))
                                        @else
                                            <div class="col-12 p-2 pl-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox" value="Submitted"
                                                                id="form137" name="form137">
                                                            <label class="form-check-label" for="form137">
                                                                Form 137
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="file"
                                                                name="form137file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
    
                                        @if (!empty($student->document->JHS_cert))
                                        @else
                                            <div class="col-12 p-2 pl-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox" value="Submitted"
                                                                id="JHS_cert" name="JHS_cert">
                                                            <label class="form-check-label" for="JHS_cert">
                                                                JHS Certification
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="file"
                                                                name="JHS_certfile">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
    
                                        @if (!empty($student->document->PSA))
                                        @else
                                            <div class="col-12 p-2 pl-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox" value="Submitted"
                                                                id="PSA" name="PSA">
                                                            <label class="form-check-label" for="PSA">
                                                                PSA (Xerox Copy)
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="file" name="PSAfile">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
    
                                        @if (!empty($student->document->GoodMoral))
                                        @else
                                            <div class="col-12 p-2 pl-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox" value="Submitted"
                                                                id="goodmoral" name="goodmoral">
                                                            <label class="form-check-label" for="goodmoral">
                                                                Good Moral (Original Copy)
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="file"
                                                                name="goodmoralfile">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
    
                                        @if (!empty($student->document->Card))
                                        @else
                                            <div class="col-12 p-2 pl-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-check mt-2">
                                                            <input class="form-check-input" type="checkbox" value="Submitted"
                                                                id="Card" name="Card">
                                                            <label class="form-check-label" for="Card">
                                                                Card
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="file" name="Cardfile">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
    
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger mt-4" data-dismiss="modal">
                                        Cancel</button>
                                    <button type="submit" class="btn btn-primary mt-4 mr-2">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Drop Student Modal-->
                <div class="modal fade" id="dropStudent" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Are you sure to drop this student?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <form action="{{ route('enrolled_student.drop', $student->enrollment->student->id) }}"
                                method="post">
                                @csrf
                                @method('PUT')

                                <div class="col-md-12 pt-3">
                                    <label for="reason_fpr_dropout"> <span class="text-danger">*</span>
                                        Reason for Dropout
                                    </label>
                                    <select class="custom-select custom-select-sm" name="reason_for_dropout" required>
                                        <option selected="" disabled="">Choose Reason for Dropout</option>
                                        <option selected value="Armed Conflict">Armed Conflict</option>
                                        <option value="Calamities/Disasters">Calamities/Disasters</option>
                                        <option value="Child Labor, workChild Labor, work">Child Labor, work</option>
                                        <option value="Transferred to School Abroad">Transferred to School Abroad</option>
                                        <option value="Transferred to International School">Transferred to International School</option>
                                        <option value="Acceleration (No Longer attending class)">Acceleration (No Longer attending class)</option>
                                        <option value="Physical conditions of classroom">Physical conditions of classroom</option>
                                        <option value="Peer Influences">Peer Influences</option>
                                        <option value="Distance between home and school">Distance between home and school</option>
                                        <option value="Family problems/feuds">Family problems/feuds</option>
                                        <option value="Illness">Illness</option>
                                        <option value="Overage">Overage</option>
                                        <option value="Death">Death</option>    
                                        <option value="Drug Abuse">Drug Abuse</option>
                                        <option value="Poor academic performance">Poor academic performance</option>
                                        <option value="Lack of interest/Distractions">Lack of interest/Distractions</option>
                                        <option value="Had totake care of siblings">Had totake care of siblings</option>
                                        <option value="Early marriage/pregnancy">Early marriage/pregnancy</option>
                                        <option value="Parent's attitude toward schooling">Parent's attitude toward schooling</option>
                                    </select>
                                </div>

                                <div class="col text-center p-5">
                                    <button type="button" class="btn btn-danger mt-4" data-dismiss="modal">
                                        Cancel</button>
                                    <button type="submit" class="btn btn-primary mt-4 mr-2">Submit</button>
                                </div>
                            </form>
                        </div>
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
