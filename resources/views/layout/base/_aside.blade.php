{{-- Aside --}}

@php
    $kt_logo_image = 'logo-light.png';
@endphp

@if (config('layout.brand.self.theme') === 'light')
    @php $kt_logo_image = 'logo-dark.png' @endphp
@elseif (config('layout.brand.self.theme') === 'dark')
    @php $kt_logo_image = 'logo-light.png' @endphp
@endif

<div class="aside aside-left {{ Metronic::printClasses('aside', false) }} d-flex flex-column flex-row-auto"
    id="kt_aside">

    {{-- Brand --}}
    <div class="brand flex-column-auto {{ Metronic::printClasses('brand', false) }}" id="kt_brand">
        <div class="brand-logo">
            <a href="{{ url('/') }}">
                <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/capellan-name-logo.png') }}"
                    width="180px" />
            </a>
        </div>

        @if (config('layout.aside.self.minimize.toggle'))
            <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                {{ Metronic::getSVG('media/svg/icons/Navigation/Angle-double-left.svg', 'svg-icon-xl') }}
            </button>
        @endif

    </div>

    {{-- Aside menu --}}
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        @if (config('layout.aside.self.display') === false)
            <div class="header-logo">
                <a href="{{ url('/') }}">
                    <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/capellan-name-logo.png') }}"
                        width="180px" />
                </a>
            </div>
        @endif

        <div id="kt_aside_menu" class="aside-menu my-4 {{ Metronic::printClasses('aside_menu', false) }}"
            data-menu-vertical="1" {{ Metronic::printAttrs('aside_menu') }}>

            <ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
                <!--begin::Menu Nav-->

                @can('view-dashboard')
                    <li class="menu-item" aria-haspopup="true">
                        <a href="{{ route('dashboard.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                        <path
                                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                @endcan

                {{-- @can('Enrollment Permission')
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-icon fas fa-users">

                            </span>
                            <span class="menu-text">Enrollment</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">

                            <ul class="menu-subnav">

                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{ route('enroll_new_student.create') }}" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-line">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">New Students</span>
                                        <span class="menu-label">
                                            <span class="label label-rounded label-primary"><?= $count_user ?></span>
                                        </span>

                                    </a>

                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{ route('enroll_existing_student.create') }}" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-line">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Existing Student</span>

                                    </a>

                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{ route('import_student.create') }}" class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-line">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Import Student</span>

                                    </a>

                                </li>


                            </ul>
                        </div>
                    </li>
                @endcan --}}

                @can('manage-enrollments')
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-icon fas fa-address-book">

                            </span>
                            <span class="menu-text">Student Records</span>
                            <span class="menu-label">
                                <span
                                    class="label label-rounded label-primary">{{ getStudentsByStatus(0)->count() }}</span>
                            </span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">

                            <ul class="menu-subnav">
                                @can('manage-students-enrolled')
                                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{ route('students.enrolled.index') }}" class="menu-link menu-toggle">
                                            <i class="menu-bullet menu-bullet-line">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Enrolled Students</span>
                                            {{-- <span class="menu-label">
                                                <span
                                                    class="label label-rounded label-primary">{{ getStudentsByStatus(1)->count() }}</span>
                                            </span> --}}
                                        </a>
                                    </li>
                                @endcan
                                @can('manage-students-pending')
                                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{ route('students.enrollee.index') }}" class="menu-link menu-toggle">
                                            <i class="menu-bullet menu-bullet-line">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Pending Students</span>
                                            <span class="menu-label">
                                                <span
                                                    class="label label-rounded label-primary">{{ getStudentsByStatus(0)->count() }}</span>
                                            </span>
                                        </a>
                                    </li>
                                @endcan
                                @can('manage-students-enrolled')
                                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{ route('subject.create') }}" class="menu-link menu-toggle">
                                            <i class="menu-bullet menu-bullet-line">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Enrollment</span>

                                        </a>

                                    </li>
                                @endcan
                                @can('manage-alumni')
                                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{ route('alumni.index') }}" class="menu-link menu-toggle">
                                            <i class="menu-bullet menu-bullet-line">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Alumni</span>
                                            {{-- <span class="menu-label">
                                                <span
                                                    class="label label-rounded label-primary">{{ getStudentsByStatus(3)->count() }}</span>
                                            </span> --}}
                                        </a>
                                    </li>
                                @endcan
                                @can('manage-dropouts')
                                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{ route('dropout.index') }}" class="menu-link menu-toggle">
                                            <i class="menu-bullet menu-bullet-line">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Dropouts</span>
                                            {{-- <span class="menu-label">
                                                <span
                                                    class="label label-rounded label-primary">{{ getStudentsByStatus(2)->count() }}</span>
                                            </span> --}}
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan
                @can('manage-sections')
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{ route('section.index',['grade_level_id' =>  1, 'specialization_id' => 1]) }}" class="menu-link menu-toggle">
                            <span class="menu-icon fas fa-user-plus">
                            </span>
                            <span class="menu-text">Sections</span>

                        </a>
                    </li>
                @endcan
                @can('manage-accounting')
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-icon fas fa-money-bill">

                            </span>
                            <span class="menu-text">Accounting</span>
                            <span class="menu-label">
                                <span
                                    class="label label-rounded label-primary">{{ \App\Models\SMS\PaymentTransaction::count() }}</span>
                            </span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">

                            <ul class="menu-subnav">
                                @can('manage-fees')
                                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{ route('fee.index') }}" class="menu-link menu-toggle">
                                            <i class="menu-bullet menu-bullet-line">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Fees</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('manage-transactions')
                                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="{{ route('transaction.index') }}" class="menu-link menu-toggle">
                                            <i class="menu-bullet menu-bullet-line">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">Payment Transactions</span>
                                            <span class="menu-label">
                                                <span
                                                    class="label label-rounded label-primary">{{ \App\Models\SMS\PaymentTransaction::count() }}</span>
                                            </span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage-reports')
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-icon fas fa-print">

                            </span>
                            <span class="menu-text">Reports</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">

                            <ul class="menu-subnav">
                                <li class="menu-item menu-item-parent" aria-haspopup="true">
                                    <span class="menu-link">
                                        <span class="menu-text">Reports</span>
                                    </span>
                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{ route('yearly_report.index') }}" class="menu-link menu-toggle py-2">
                                        <i class="flaticon-folder pr-3 pt-2">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Yearly Students Report</span>
                                    </a>

                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{ route('student_list.index') }}" class="menu-link menu-toggle py-2">
                                        <i class="flaticon-folder pr-3 pt-2">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Students List Report</span>
                                    </a>

                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{ route('document_submission.index') }}"
                                        class="menu-link menu-toggle py-2">
                                        <i class="flaticon-folder pr-3 pt-2">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Document Submission Report</span>
                                    </a>

                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{ route('contact_info_sheet.index') }}" class="menu-link menu-toggle py-2">
                                        <i class="flaticon-folder pr-3 pt-2">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Contact Information Sheet</span>
                                    </a>

                                </li>

                            </ul>
                        </div>
                    </li>
                @endcan
                @can('add-alumni')
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{ route('graduate.create') }}" class="menu-link menu-toggle">
                            <span class="menu-icon fas fa-graduation-cap">
                            </span>
                            <span class="menu-text">Add Graduates</span>

                        </a>
                    </li>
                @endcan

                @can('manage-system-maintenance')
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{ route('sys_main.index') }}" class="menu-link menu-toggle">
                            <span class="menu-icon fas fa-cog">
                            </span>
                            <span class="menu-text">System Maintenance</span>

                        </a>
                    </li>
                @endcan

                {{-- @can('Register User Permission')
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{ url('/register') }}" class="menu-link menu-toggle">
                            <span class="menu-icon fas fa-user-plus">
                            </span>
                            <span class="menu-text">Register New User</span>

                        </a>
                    </li>
                @endcan --}}

                @can('manage-subjects')
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="javascript:;" class="menu-link menu-toggle">
                            <span class="menu-icon fas fa-solid fa-book-open"></span>
                            <span class="menu-text">Subjects</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="menu-submenu">

                            <ul class="menu-subnav">

                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{ route('subject.index', ['grade_level_id' => 1]) }}"
                                        class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-line">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Grade 11</span>

                                    </a>

                                </li>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="{{ route('subject.index', ['grade_level_id' => 2]) }}"
                                        class="menu-link menu-toggle">
                                        <i class="menu-bullet menu-bullet-line">
                                            <span></span>
                                        </i>
                                        <span class="menu-text">Grade 12</span>

                                    </a>

                                </li>



                            </ul>
                        </div>
                    </li>
                @endcan

                {{-- @can('manage-teachers')
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{ route('teacher.index') }}" class="menu-link menu-toggle">
                            <span class="menu-icon fas fa-chalkboard-teacher">
                            </span>
                            <span class="menu-text">Teachers</span>

                        </a>
                    </li>
                @endcan

                @can('manage-schedules')
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{ route('schedule.index') }}" class="menu-link menu-toggle">
                            <span class="menu-icon fas fa-calendar-week">
                            </span>
                            <span class="menu-text">Schedules</span>

                        </a>
                    </li>
                @endcan --}}
                @can('manage-users')
                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                        <a href="{{ route('user.index') }}" class="menu-link menu-toggle">
                            <span class="menu-icon fas fa-users-cog">
                            </span>
                            <span class="menu-text">Users</span>

                        </a>
                    </li>
                @endcan
            </ul>
            <!--end::Menu Nav-->
        </div>
    </div>

</div>
