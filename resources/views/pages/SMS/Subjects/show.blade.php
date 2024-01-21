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
    @livewireStyles()
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

        @livewire('subject.enrollment')

    </div>
@endsection
@section('scripts')
@livewireScripts()
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
        integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @stack('scripts')
@endsection
