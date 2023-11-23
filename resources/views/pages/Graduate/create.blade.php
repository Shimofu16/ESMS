{{-- Extends layout --}}
@extends('layout.default')
@section('info')
 <!--begin::Info-->
 <div class="d-flex align-items-center flex-wrap mr-2">

    <!--begin::Page Title-->
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
      Graduating Students
    </h5>
    <!--end::Page Title-->

</div>
<!--end::Info-->
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css">

    <style>
        thead input {
            width: 100%;
        }

        .background {
            background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url('{{ asset('media/capellan/capellan-logo-ver2.png') }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center center;

        }
    </style>
@endsection

{{-- Content --}}
@section('content')
    <div class="card card-custom" id="background">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">
                    List of Students
                    <div class="text-muted pt-2 font-size-sm">Below is the list of enrolled student this school year</div>
                </h3>
            </div>

        </div>

        <div class="background">
            <form action="{{ route('graduate.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <!--begin: Datatable-->
                
                <table class="table table-separate table-head-custom table-checkable" id="example">
                    <thead>
                        <tr>
                            <th>Check All</th>
                            <th>Full Name</th>
                            <th>Grade</th>
                            <th>Track</th>
                            <th>Strand</th>
                            <th>Specialization</th>
                        </tr>
                    </thead>

                    <tbody>

                            @foreach ($students as $student)
                                <tr>

                                    <td class="text-center"><input class="form-check-input" type="checkbox"
                                            name="student_id[]" value="{{ $student->enrollment->student->id }}"></td>
                                    <td>{{ $student->enrollment->student->last_name }},
                                        {{ $student->enrollment->student->first_name }}
                                        {{ $student->enrollment->student->middle_name }}</td>
                                    <td>{{ $student->enrollment->grade_level->grade_level }}</td>
                                    <td>{{ $student->enrollment->specialization->strand->track->track }}</td>
                                    <td>{{ $student->enrollment->specialization->strand->strand }}</td>
                                    <td>{{ $student->enrollment->specialization->specialization }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    <!--end: Datatable-->
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                </div>
            </form>
           
        </div>

    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>


    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#example thead');

            var table = $('#example').DataTable({
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
