@extends('layout.default')

@section('styles')
    <link rel="stylesheet" href="{{ asset('select2-4.1.0-rc.0/css/select2.min.css') }}">
    @livewireStyles
@endsection

@section('info')
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">

        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
            Payment Transactions
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
                            Create Transaction
                        </h3>
                        {{-- <small>Below are the Payment Transactions for SY: </small> --}}
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <a href="{{ route('transaction.index') }}" class="btn btn-primary font-weight-bold btn-sm mr-1">
                            Back to transactions
                        </a>

                    </div>
                </div>
                <div class="card-body">
                    @livewire('payment-transaction.create', ['students' => $students, 'student_id' => $student_id])
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    @livewireScripts
    <script src="{{ asset('select2-4.1.0-rc.0/js/select2.min.js') }}"></script>
    @stack('scripts')
@endsection
