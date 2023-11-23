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
                            Add Students to Section
                        </h3>
                        <small>Below are the students without section</small>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        {{-- <button type="button" class="btn btn-primary font-weight-bold btn-sm" data-toggle="modal"
                            data-target="#section"><i class="flaticon2-cube"></i>
                            Add Section
                        </button> --}}
                    </div>
                </div>
                <form action="{{ route('add_student_to_section.store') }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">

                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>Check</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Strand/Specialization</th>
                                    <th scope="col">Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($student_without_sections->where('status',1) as $student)
                                    <tr>

                                        <td class="text-center"> <input class="form-check-input" type="checkbox"
                                                name="student_id[]" value="{{ $student->id }}">
                                        </td>
                                        <td>{{ $student->last_name }}, {{ $student->first_name }}
                                            {{ $student->middle_name }}
                                        </td>

                                        <td>{{ $student->enrollment->grade_level->grade_level }} </td>

                                        <td>{{ $student->enrollment->specialization->strand->strand }} / <strong>
                                                {{ $student->enrollment->specialization->specialization }} </strong></td>
                                        <td> {{ $student->sex }}</td>
                                    @empty
                                        <td colspan="5" class="text-warning text-center ">No Data for not Enrrolled
                                            Student</td>
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
                                    <option value="{{ $section->id }}">{{ $section->specialization->specialization }} -
                                        {{ $section->section }} - {{ $section->gradelevel->grade_level }}</option>
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
                               <span data-toggle="tooltip" data-placement="top" title="{{ $section->specialization->specialization }}"> {{ slug($section->specialization->specialization) }}</span> - {{ $section->section }}
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="{{ route('section.show',['id' => $section->id]) }}" class="btn btn-primary font-weight-bold btn-sm">
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
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#example thead');

            var table = $('#example').DataTable({
                // dom: "<'row'<'col-sm-12 col-md-12 d-flex justify-content-between'Bl>>" + "tipr",
                // buttons: [
                //     'copyHtml5',
                //     'excelHtml5',
                //     // 'csvHtml5',
                //     'pdfHtml5',
                //     'print'
                // ],

                orderCellsTop: true,
                fixedHeader: true,
                initComplete: function() {
                    var api = this.api();

                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function(colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            $(cell).html('<input type="text" placeholder="' + title + '" />');

                            // On every keypress in this input
                            $(
                                    'input',
                                    $('.filters th').eq($(api.column(colIdx).header()).index())
                                )
                                .off('keyup change')
                                .on('keyup change', function(e) {
                                    e.stopPropagation();

                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr =
                                    '({search})'; //$(this).parents('th').find('select').val();

                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != '' ?
                                            regexr.replace('{search}', '(((' + this.value +
                                                ')))') :
                                            '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();

                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
            });
        });
    </script>
@endsection
