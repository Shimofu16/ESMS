{{-- Extends layout --}}
@extends('layout.default')


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

@section('info')
 <!--begin::Info-->
 <div class="d-flex align-items-center flex-wrap mr-2">

    <!--begin::Page Title-->
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
      Accounting

      <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Angle-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24"/>
            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
        </g>
    </svg><!--end::Svg Icon--></span>

      Billing

      <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Angle-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24"/>
            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
        </g>
    </svg><!--end::Svg Icon--></span>

      Add Batch Billing
    </h5>
    <!--end::Page Title-->

</div>
<!--end::Info-->
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
            <form action="{{route('batch.store')}}" method="POST">
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

                <div class="row d-flex justify-content-center mb-4">
                    <div class="col-11">
                        <div class="card card-custom border border-secondary">

                            <div class="card-header font-italic font-weight-bold text-primary mt-5">
                                Please provide the particulars, amount, and date of the billing that will be assigned to the selected students.
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Particulars <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Input Particulars" name="billing_particulars" required/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Amount<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="Input Amount" name="billing_amt" required/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" placeholder="Input Date" name="billing_date" required/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Submit Form</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>


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
