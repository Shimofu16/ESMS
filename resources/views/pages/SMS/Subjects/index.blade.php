@extends('layout.default')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css">
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
                        <small>Below are the subjects in Grade {{ $grade_level_id == 1 ? '11' : '12' }}</small>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <button type="button" class="btn btn-primary font-weight-bold btn-sm mr-3" data-toggle="modal"
                            data-target="#add">
                            <i class="flaticon2-cube"></i>
                            Add Subject
                        </button>
                        @include('pages.SMS.Subjects.modal._add')
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                                Specializations
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach ($specializations as $specialization)
                                    <li><a class="dropdown-item"
                                            href="{{ route('subject.index', ['grade_level_id' => $grade_level_id, 'specialization_id' => $specialization->id]) }}">{{ $specialization->specialization }}</a>
                                    </li>
                                @endforeach
                                <li><a href="{{ route('subject.index', ['grade_level_id' => $grade_level_id]) }}"
                                        class="dropdown-item">Reset</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">

                        <li class="nav-item">
                            <button class="nav-link text-active-primary ms-0 me-10 py-5 active" data-toggle="tab"
                                data-target="#first-sem">First
                                Semester</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link text-active-primary ms-0 me-10 py-5" data-toggle="tab"
                                data-target="#second-sem">Second
                                Semester</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active first-sem p-3" id="first-sem">
                            <table class="table dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Code</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Units</th>
                                        @if ($specialization_id == null)
                                            <th scope="col">Specialization</th>
                                        @endif
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($firstSemSubjects as $firstSemSubject)
                                        <tr>
                                            <td>{{ $firstSemSubject->code }}</td>
                                            <td>{{ $firstSemSubject->name }}</td>
                                            <td>{{ $firstSemSubject->unit }}</td>
                                            @if ($specialization_id == null)
                                                <td>{{ $firstSemSubject->specialization->specialization }}</td>
                                            @endif
                                            <td class="text-center">
                                                <button class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $firstSemSubject->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $firstSemSubject->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @php
                                            $subject = $firstSemSubject;
                                        @endphp
                                        @include('pages.SMS.Subjects.modal._edit')
                                        @include('pages.SMS.Subjects.modal._delete')
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="tab-pane fade second-sem pt-3" id="second-sem">
                            <table class="table dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Code</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Units</th>
                                        @if ($specialization_id == null)
                                            <th scope="col">Specialization</th>
                                        @endif
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($secondSemSubjects as $secondSemSubject)
                                        <tr>
                                            <td>{{ $secondSemSubject->code }}</td>
                                            <td>{{ $secondSemSubject->name }}</td>
                                            <td>{{ $secondSemSubject->unit }}</td>
                                            @if ($specialization_id == null)
                                                <td>{{ $secondSemSubject->specialization->specialization }}</td>
                                            @endif
                                            <td class="text-center">
                                                <button class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $secondSemSubject->id }}">
                                                    <i class="fas fa-edit text-primary"></i>
                                                </button>
                                                <button class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $secondSemSubject->id }}">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @php
                                            $subject = $secondSemSubject;
                                        @endphp
                                        @include('pages.SMS.Subjects.modal._edit')
                                        @include('pages.SMS.Subjects.modal._delete')
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
    <script src=""></script>
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable({
                "paging": true,
                "ordering": false,
                "info": false,
                "searching": true,
                // "scrollY": "300px",
                // "scrollCollapse": true,
                // "paging": false,
            });
        });
    </script>
@endsection
