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
      Reports

      <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Angle-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24"/>
            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
        </g>
    </svg><!--end::Svg Icon--></span>

      Contact Information Sheet
    </h5>
    <!--end::Page Title-->

</div>
<!--end::Info-->
@endsection

@section('title')
    Contact Information Sheet
@endsection

@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-label">
                    Contact Information Sheet
                </h3>
            </div>

        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="example">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Grade</th>
                        <th>Strand - Specialization</th>
                        <th>Contact No.</th>
                        <th>Address</th>
                        <th>Guardian</th>
                        <th>Guardian's Contact No.</th>
                    </tr>
                </thead>

                <tbody>
                     @foreach ($students as $student)

                        <tr>
                            <td>{{ $student->enrollment->student->last_name }}, {{ $student->enrollment->student->first_name }} {{ $student->enrollment->student->middle_name }} {{ $student->enrollment->student->extension }}</td>
                            <td>{{ $student->enrollment->grade_level->grade_level}}</td>
                            <td>{{ $student->enrollment->specialization->strand->strand }} - {{ $student->enrollment->specialization->specialization }}</td>
                            <td>{{ $student->enrollment->student->contact_num}}</td>
                            <td>{{ $student->enrollment->student->house_num}} {{ $student->enrollment->student->purok}} {{ $student->enrollment->student->brgy}} {{ $student->enrollment->student->municipality}}, {{ $student->enrollment->student->province}}</td>
                            <td>{{ $student->enrollment->student->g_name}}</td>
                            <td>{{ $student->enrollment->student->g_contact_num}}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
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
         var table = $('#example').DataTable({
             dom: "<'row'<'col-sm-6 col-md-6 d-flex justify-content-between'B><'col-sm-6 col-md-6'f>>" +
                 "tipr",
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

                 // Move the search input to the right
                 $('.filters th').eq(0).html('<div class="d-flex justify-content-end"><input type="text" placeholder="Search all..." /></div>');

                 var searchInput = $('.filters input');

                 searchInput.on('keyup change', function() {
                     api.search($(this).val()).draw();
                 });
             }
         });
     });

    </script>
@endsection

