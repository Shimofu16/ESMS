{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">

    <style>
        thead input {
            width: 100%;
        }
    </style>
@endsection

@section('info')
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">

        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
            Sections
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
                            Add Students to Section -  {{ $specialization->specialization }} ({{ $grade_level->grade_level }})
                        </h3>
                        {{-- <small>{{ $grade_level->grade_level }} - {{ $specialization->specialization }}</small> --}}
                    </div>
                    <div class="card-toolbar">
                        <div class="dropdown mr-2">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                id="grade_levels" data-toggle="dropdown" aria-expanded="false">
                                Grade Levels
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="grade_levels">
                                @foreach ($grade_levels as $item)
                                    <li><a class="dropdown-item"
                                            href="{{ route('section.index', ['grade_level_id' => $item->id, 'specialization_id' => $specialization->id]) }}">{{ $item->grade_level }}</a>
                                    </li>
                                @endforeach
                                <li><a href="{{ route('section.index', ['grade_level_id' => $item->id, 'specialization_id' => $specialization->id]) }}"
                                        class="dropdown-item">Reset</a></li>
                            </ul>

                        </div>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                                Specializations
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach ($specializations as $item)
                                    <li><a class="dropdown-item"
                                            href="{{ route('section.index', ['grade_level_id' => $grade_level->id, 'specialization_id' => $item->id]) }}">{{ $item->specialization }}</a>
                                    </li>
                                @endforeach
                                <li><a href="{{ route('section.index', ['grade_level_id' => $grade_level->id, 'specialization_id' => $item->id]) }}"
                                        class="dropdown-item">Reset</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <form action="{{ route('add_student_to_section.store') }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">

                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Gender</th>
                                    <th>Check</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr>

                                        <td>{{ $student->full_name }}</td>
                                        <td> {{ $student->sex }}</td>
                                        <td>
                                            <input class="form-check-input" type="checkbox" name="student_id[]"
                                                value="{{ $student->id }}">
                                        </td>
                                    @empty
                                        <td colspan="3" class="text-warning text-center ">No Data</td>
                                @endforelse
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-center align-items-center">
                        <div class="col-md-9">
                            <select class="custom-select custom-select-sm" name="section_id">
                                <option selected disabled>Select Section</option>

                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->section }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="card-footer text-center p-5">
                        <button type="submit" class="btn btn-primary btn-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="row">
        @foreach ($sections as $section)
            <div class="col-md-6">
                <div class="card card-custom mt-7">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="card-title ">
                            <span class="card-icon">
                                <i class="flaticon2-chat-1 text-primary"></i>
                            </span>
                            <h3 class="card-label">
                                {{ $section->gradelevel->grade_level }} -
                                <span data-toggle="tooltip" data-placement="top"
                                    title="{{ $section->specialization->specialization }}">
                                    {{ slug($section->specialization->specialization) }}</span> - {{ $section->section }}
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="{{ route('section.show', ['id' => $section->id]) }}"
                                class="btn btn-primary font-weight-bold btn-sm">
                                <i class="flaticon2-cube"></i>
                                Class List
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <td></td>
                                    <th scope="col">Name</th>
                                    <th scope="col">Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($section->specialization->enrollment->where('section_id', $section->id)->where('school_year_id', '=', $active->active_SY_id)->where('sem_id','=', $active->active_sem_id) as $enrollment)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $enrollment->student->last_name }},
                                            {{ $enrollment->student->first_name }}
                                            {{ $enrollment->student->middle_name }}
                                        </td>
                                        <td>
                                            {{ $enrollment->student->sex }}
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="4" class="text-center">
                                        No Students Yet
                                    </td>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cel

            var table = $('#example').DataTable();
        });
    </script>
@endsection
