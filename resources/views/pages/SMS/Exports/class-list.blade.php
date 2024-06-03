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
            Class List - {{ $section->name }}
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
                            Class List - {{ $section->section }}
                        </h3>
                        <small>Below are the students that are enrolled to section  {{ $section->section }}</small>
                    </div>
                    <div class="card-toolbar">
                        <a class="btn btn-secondary font-weight-bold btn-sm mr-1" href="{{ url()->previous() }}">
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
                                    <h4 class="fw-bold mb-3">{{ $section->section }}</h4>
                                    <h4 class="fw-bold">{{ $section->specialization->specialization }}</h4>
                                    <h6 class="mb-4">Grade {{ $section->gradeLevel->grade_level }}</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table table-bordered mb-3">
                            <thead>
                                <tr class="bg-orange">
                                    <th scope="col">Name</th>
                                    <th scope="col">Gender</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->student->full_name }}</td>
                                        <td>{{ $student->student->sex }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')

    <script type="text/javascript">
        function generatePDF() {
            var element = document.getElementById('wrapper');
            var opt = {
                margin: 0,
                filename: 'Class List - {{ $section->section }}.pdf',
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
