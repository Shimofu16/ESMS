@extends('layout.default')


@section('styles')
    <style>
        /* tr.bg-orange th {
                                background-color: #f8cbad;
                            } */

        table.table-bordered {
            border-collapse: collapse;
            border: 1px solid black;
            /* Adjust border width as needed */
        }

        table.table-bordered th,
        table.table-bordered td {
            border: 1px solid black;
            /* Adjust border width as needed */
            padding: 0px 8px;
            font-size: 16px;
            font-family: Calibri !important;
            font-weight: 700 !important;
        }

        .bold {
            font-weight: 700 !important;
        }

        .bb-1 {
            border-bottom: 1px solid black;
        }

        .bt-1 {
            border-top: 1px solid black;
        }

        .bb-dashed {
            border-bottom: 2px dashed black;
        }

        .title,
        .label-title {}

        .title {
            font-size: 23px !important;
            font-family: Cambria !important;

        }

        .sub-title {
            font-size: 17px;
            font-family: Calibri !important;
        }

        .label-title {
            font-size: 16px;
            font-family: Calibri !important;
        }
    </style>

    @livewireStyles()
    @stack('styles')
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

    @stack('scripts')
@endsection
