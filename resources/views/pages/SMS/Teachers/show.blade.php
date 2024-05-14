@extends('layout.default')


@section('styles')
    <style>
        tr.bg-orange th {
            background-color: #f8cbad;
        }

        table.table-bordered {
            border-collapse: collapse;
            border: 1px solid black;
            /* Adjust border width as needed */
        }

        table.table-bordered th,
        table.table-bordered td {
            border: 1px solid black;
            /* Adjust border width as needed */
            padding: 8px;
            /* Add padding to cells for better spacing */
        }
    </style>
@endsection
@section('info')
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">

        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
            @if ($type == 'schedules')
                Class Schedule
            @else
                Teacher Information
            @endif
        </h5>
        <!--end::Page Title-->

    </div>
    <!--end::Info-->
@endsection

@section('content')
    <div class="row mb-20">

        <div class="col-md-12">
            <div class="card card-custom mt-7">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chat-1 text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            @if ($type == 'schedules')
                                Class Schedule - {{ $teacher->full_name }}
                            @else
                                Teacher Information - {{ $teacher->full_name }}
                            @endif
                        </h3>
                        <small>Below are the scheduels of {{ $teacher->full_name }}</small>
                    </div>
                    <div class="card-toolbar">
                        <a class="btn btn-secondary font-weight-bold btn-sm mr-1" href="{{ route('teacher.index') }}">
                            {{-- return --}}
                            <i class="flaticon2-back"></i>
                            back
                        </a>
                        @if ($type == 'schedules')
                            <button class="btn btn-primary" onclick="generatePDF()">
                                <i class="fa-solid fa-file-arrow-down"></i>
                                Download
                            </button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if ($type == 'schedules')
                        <div id="wrapper" class="border p-3">
                            <div class="row flex-column text-center mb-3">
                                <div class="d-flex justify-content-center  align-items-center ">
                                    <div class="mb-auto mt-3 me-2">
                                        <img src="{{ asset('media/logos/capellan_logo.png') }}" alt="logo"
                                            class="img-fluid" style="width: 100px; height: 100px;">
                                    </div>
                                    <div class="ml-2 me-5 my-5">
                                        <h4 class="fw-bold"><strong>CAPELLAN INSTITUTE OF TECHNOLOGY</strong></h4>
                                        <h6 class="mb-4 text-center">San Pablo City Branch</h6>
                                        <h4 class="fw-bold mb-3">Class Schedule</h4>
                                        <h4 class="fw-bold mb-3">SY: {{ $setting['school_year'] }}</h4>
                                        <h4 class="fw-bold">
                                            {{ $setting['semester_id'] }}{{ $setting['semester_id'] == 1 ? 'st' : 'nd' }}
                                            Semester</h4>
                                    </div>
                                </div>
                                <div class="px-3 mt-5 d-flex justify-content-between">
                                    <h4 class="fw-bold mt-5"><strong>Teacher:</strong> {{ $teacher->full_name }}</h4>
                                    {{-- <h4 class="fw-bold mt-5">{{ ($setting->semester_id == 1? 'First' : 'Second') }} Semester</h4> --}}
                                </div>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table table-bordered mb-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Section</th>
                                        <th scope="col">Monday</th>
                                        <th scope="col">Tuesday</th>
                                        <th scope="col">Wednesday</th>
                                        <th scope="col">Thursday</th>
                                        <th scope="col">Friday</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($schedules as $schedule)
                                        @php
                                            $days = collect($schedule->days);
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="card bg-transparent border-0">
                                                    <div class="card-body px-1 text-center">
                                                        <h6>{{ $schedule->subject->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="card bg-transparent border-0">
                                                    <div class="card-body px-1 text-center">
                                                        <h6>{{ $schedule->section->section }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            @if ($days->contains('Monday'))
                                                <td class="px-1">
                                                    <div class="card bg-transparent border-0">
                                                        <div class="card-body px-1 text-center">
                                                            {{-- section, specialization, and time --}}
                                                            <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                                {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            @else
                                                <td class="px-1">
                                                    <div class="card border-0">
                                                        <div class="card-body px-1 text-center">
                                                            &nbsp;
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                            @if ($days->contains('Tuesday'))
                                                <td class="px-1">
                                                    <div class="card bg-transparent border-0">
                                                        <div class="card-body px-1 text-center">
                                                            {{-- section, specialization, and time --}}
                                                            <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                                {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            @else
                                                <td class="px-1">
                                                    <div class="card border-0">
                                                        <div class="card-body px-1 text-center">
                                                            &nbsp;
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                            @if ($days->contains('Wednesday'))
                                                <td class="px-1">
                                                    <div class="card bg-transparent border-0">
                                                        <div class="card-body px-1 text-center">
                                                            {{-- section, specialization, and time --}}
                                                            <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                                {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            @else
                                                <td class="px-1">
                                                    <div class="card border-0">
                                                        <div class="card-body px-1 text-center">
                                                            &nbsp;
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                            @if ($days->contains('Thursday'))
                                                <td class="px-1">
                                                    <div class="card bg-transparent border-0">
                                                        <div class="card-body px-1 text-center">
                                                            {{-- section, specialization, and time --}}
                                                            <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                                {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            @else
                                                <td class="px-1">
                                                    <div class="card border-0">
                                                        <div class="card-body px-1 text-center">
                                                            &nbsp;
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                            @if ($days->contains('Friday'))
                                                <td class="px-1">
                                                    <div class="card bg-transparent border-0">
                                                        <div class="card-body px-1 text-center">
                                                            {{-- section, specialization, and time --}}
                                                            <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                                {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            @else
                                                <td class="px-1">
                                                    <div class="card border-0">
                                                        <div class="card-body px-1 text-center">
                                                            &nbsp;
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <td colspan="6" class="text-center">
                                            No Schedules
                                        </td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between align-items-ceenter mt-5">
                                <div>
                                    <h4 class="fw-bold"><strong>Prepared By:</strong> </h4>
                                </div>
                                <div>
                                    <h4 class="fw-bold"><strong>Checked By:</strong>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </h4>
                                </div>
                            </div>

                        </div>
                    @else
                        <div class="d-flex flex-column">
                            <img src="{{ asset('storage/photos/' . $teacher->picture) }}" alt="teacher-picture"
                                class="rounded mb-3" style="height: 140px;width: 140px;">
                            <h5 class="fw-bold"><strong>Full Name:</strong> {{ $teacher->full_name }} </h5>
                            <h5 class="fw-bold"><strong>Email:</strong> {{ $teacher->email }} </h5>
                            <h5 class="fw-bold"><strong>Sex:</strong> {{ $teacher->sex }} </h5>
                            <h5 class="fw-bold"><strong>Phone Number:</strong> {{ $teacher->phone_number }} </h5>
                            <h5 class="fw-bold"><strong>Birthday:</strong>
                                {{ date('F d, Y', strtotime($teacher->birthday)) }} </h5>
                            <h5 class="fw-bold"><strong>Age:</strong> {{ $teacher->birthday->age }} </h5>
                            <h5 class="fw-bold"><strong>Address:</strong> {{ $teacher->address }} </h5>
                            <h5 class="fw-bold"><strong>Civil Status:</strong> {{ $teacher->civil_status }} </h5>
                            <h5 class="fw-bold"><strong>Height:</strong> {{ $teacher->height }} </h5>
                            <h5 class="fw-bold"><strong>Weight:</strong> {{ $teacher->weight }} </h5>
                            <h5 class="fw-bold"><strong>Nationality:</strong> {{ $teacher->nationality }} </h5>
                            <h5 class="fw-bold"><strong>Occupation:</strong> {{ $teacher->occupation }} </h5>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
        integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function generatePDF() {
            var element = document.getElementById('wrapper');
            var opt = {
                margin: 0,
                filename: '{{ $teacher->full_name }} - Class Schedule.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'landscape'
                }
            };
            html2pdf().set(opt).from(element).save();
        };
    </script>
@endsection
