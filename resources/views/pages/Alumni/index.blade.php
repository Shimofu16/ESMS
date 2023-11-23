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
      Student Records 

      <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Angle-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24"/>
            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
        </g>
    </svg><!--end::Svg Icon--></span>

      Alumni
    </h5>
    <!--end::Page Title-->

</div>
<!--end::Info-->
@endsection

@section('title')
    Alumni
@endsection

@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">
                    Alumni
                </h3>
            </div>
           
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="example">
                <thead>
                    <tr>

                        <th>Action</th>
                        <th>Name</th>
                        <th>Sex</th>
                        <th>Strand - Specialization</th>
                        <th>Year Graduated</th>
                    </tr>
                </thead>

                <tbody>
                     @foreach ($students as $student)
                        
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong">
                                    View
                                  </button>
                            </td>
                            <td>{{ $student->enrollment->student->last_name }}, {{ $student->enrollment->student->first_name }} {{ $student->enrollment->student->middle_name }} {{ $student->enrollment->student->extension }}</td>
                            <td>{{ $student->enrollment->student->sex }}</td>
                            <td>{{ $student->enrollment->specialization->strand->strand }} - {{ $student->enrollment->specialization->specialization }}</td>
                            <td>{{ $student->enrollment->student->shs_yr_graduated }}</td>
                        </tr>
                    @endforeach 
                </tbody>

            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->


    <!-- View Modal-->
   
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Student Basic Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="row mb-5">
                <div class="col-8">
                    <div class="form-group">
                        <label> Student Name</label>
                        {{-- <p class="form-control form-control-sm form-control-solid" type="text" value="{{ $student->enrollment->student->last_name }}, {{ $student->enrollment->student->first_name }} {{ $student->enrollment->student->middle_name }} {{ $student->enrollment->student->extension }}" disabled> --}}
                            <p class="bg-secondary p-2">{{ $student->enrollment->student->last_name }}, {{ $student->enrollment->student->first_name }} {{ $student->enrollment->student->middle_name }} {{ $student->enrollment->student->extension }}</p>
                        </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>LRN </label>
                        {{-- <input class="form-control form-control-sm form-control-solid" type="text" value="{{ $student->enrollment->student->lrn }}" disabled> --}}
                        <p class="bg-secondary p-2">{{ $student->enrollment->student->lrn }}</p>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-8">
                    <div class="form-group">
                        <label> Sex</label>
                        <p class="bg-secondary p-2">{{ $student->enrollment->student->sex }}</p>
                        {{-- <input class="form-control form-control-sm form-control-solid" type="text" value="{{ $student->enrollment->student->sex }}" disabled> --}}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Nationality </label>
                        <p class="bg-secondary p-2">{{ $student->enrollment->student->nationality }}</p>
                        {{-- <input class="form-control form-control-sm form-control-solid" type="text" value="{{ $student->enrollment->student->nationality }}" disabled> --}}
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-8">
                    <div class="form-group">
                        <label> Birthdate</label>
                        <p class="bg-secondary p-2">{{ $student->enrollment->student->b_date }}</p>
                        {{-- <input class="form-control form-control-sm form-control-solid" type="text" value="{{ $student->enrollment->student->b_date }}" disabled> --}}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Contact Number </label>
                        <p class="bg-secondary p-2">{{ $student->enrollment->student->contact_num }}</p>
                        {{-- <input class="form-control form-control-sm form-control-solid" type="text" value="{{ $student->enrollment->student->contact_num }}" disabled> --}}
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <div class="form-group">
                        <label> Address</label>
                        <p class="bg-secondary p-2">{{ $student->enrollment->student->house_num }} {{ $student->enrollment->student->purok }} {{ $student->enrollment->student->brgy }} {{ $student->enrollment->student->municipality }} {{ $student->enrollment->student->province }}</p>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-8">
                    <div class="form-group">
                        <label> Father's Name</label>
                        <p class="bg-secondary p-2">{{ $student->enrollment->student->f_name }}</p>
                        {{-- <input class="form-control form-control-sm form-control-solid" type="text" value="{{ $student->enrollment->student->f_name }}" disabled> --}}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Mother's Name</label>
                        <p class="bg-secondary p-2">{{ $student->enrollment->student->m_name }}</p>
                        {{-- <input class="form-control form-control-sm form-control-solid" type="text" value="{{ $student->enrollment->student->m_name }}" disabled> --}}
                    </div>
                </div>
            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('#example thead');

            var table = $('#example').DataTable({
                dom: "<'row'<'col-sm-12 col-md-12 d-flex justify-content-between'Bl>>" + "tipr",
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    // 'csvHtml5',
                    'pdfHtml5',
                    'print'
                ],

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

