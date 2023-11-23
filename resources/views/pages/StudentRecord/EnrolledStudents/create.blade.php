@extends('layout.default')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css">
    @livewireStyles
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
                        <small>Below are the subjects you can enroll for student {{ $student->full_name }}</small>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <a class="btn btn-secondary font-weight-bold btn-sm mr-1" href="{{ route('enrolled_student.index') }}">
                            {{-- return --}}
                            <i class="flaticon2-back"></i>
                            back
                        </a>


                    </div>
                </div>
                <livewire:subject.enroll-student-subject :student="$student">
            </div>
        </div>

    </div>
@endsection
@section('scripts')

@livewireScripts
@endsection
