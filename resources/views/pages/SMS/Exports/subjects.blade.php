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
            padding: 2px !important;
            /* Add padding to cells for better spacing */
        }
    </style>
@endsection
@section('info')
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">

        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
            Subjects
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
                            Subjects
                        </h3>
                        <small>Below are the subjects you can enroll for student {{ $student->full_name }}</small>
                    </div>
                    <div class="card-toolbar">
                        <a class="btn btn-secondary font-weight-bold btn-sm mr-1" href="{{ route('students.enrolled.index') }}">
                            {{-- return --}}
                            <i class="flaticon2-back"></i>
                            back
                        </a>
                        <button class="btn btn-primary" onclick="generatePDF()"><i class="fa-solid fa-file-arrow-down"></i>
                            Download</button>


                    </div>
                </div>
                <div class="card-body">
                    <div id="wrapper" class="border p-3">
                        <div class="row flex-column text-center">
                            <div class="d-flex justify-content-center  align-items-center ">
                                <div class="mb-auto mt-3">
                                    <img src="{{ asset('media/logos/capellan_logo.png') }}" alt="logo" class="img-fluid"
                                        style="width: 100px; height: 100px;">
                                </div>
                                <div class="ms-1 me-5 mt-5">
                                    <h4 class="fw-bold">CAPELLAN INSTITUTE OF TECHNOLOGY</h4>
                                    <h6 class="mb-4 text-center">San Pablo City Branch</h6>
                                    <h4 class="fw-bold mb-3">{{ $specialization->strand->strand }}</h4>
                                    <h4 class="fw-bold">{{ $specialization->specialization }}</h4>
                                    <h6 class="mb-4">Grade {{ $gradeLevel->grade_level }} - {{ $semester }}</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table table-bordered mb-3">
                            <thead>
                                <tr class="bg-orange">
                                    <th scope="col" class="text-center">Core Subjects</th>
                                    <th scope="col" class="text-center">Grade</th>
                                    <th scope="col" class="text-center">To be Taken</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coreSubjects as $coreSubject)
                                    <tr>
                                        <td>
                                            {{ $coreSubject->code }} -
                                            {{ $coreSubject->name }}
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                @if (count($appliedSubjects) != 0)
                                    <tr class="bg-orange">
                                        <th scope="col" class="text-center">APPLIED & SPECIALIZATION</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                @endif
                                @foreach ($appliedSubjects as $appliedSubject)
                                    <tr>
                                        <td>
                                            {{ $appliedSubject->code }} -
                                            {{ $appliedSubject->name }}
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <table class="table table-bordered mb-5">
                            <thead>
                                <tr class="bg-orange">
                                    <th scope="col" colspan="3" class="text-center">Section {{ $section->section }}
                                    </th>
                                </tr>
                                <tr class="bg-orange">
                                    <th scope="col" class="text-center">Teacher</th>
                                    <th scope="col" class="text-center">Subject</th>
                                    <th scope="col" class="text-center">Day and Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $schedule->teacher->name }}</td>
                                        <td>{{ $schedule->subject->name }}</td>
                                        <td>
                                            <span>
                                                @foreach ($schedule->days as $day)
                                                    {{ $day }},
                                                    @if ($loop->last)
                                                        {{ $day }}
                                                    @endif
                                                @endforeach
                                            </span><br>
                                            <span>At {{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        <!-- End Table with stripped rows -->
                        <div class="d-flex justify-content-between mt-5 pt-5">
                            <div class="mt-5">
                                <h5 class="pt-3 text-center" style="border-top: 2px #000 solid ">Signature over printed
                                    name (Registrar)</h5>
                            </div>
                            <div class="mt-5">
                                <h5 class="pt-3 text-center" style="border-top: 2px #000 solid ">Signature over printed
                                    name (Student)</h5>
                            </div>
                        </div>
                    </div>

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
                filename: '{{ $student->full_name }}.pdf',
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
                    orientation: 'portrait'
                }
            };
            html2pdf().set(opt).from(element).save();
        };
    </script>
@endsection
