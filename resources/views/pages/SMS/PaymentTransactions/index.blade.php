@extends('layout.default')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css">
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
                            Payment Transactions - SY:
                        </h3>
                        <small>Below are the Payment Transactions for SY: </small>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <button type="button" class="btn btn-primary font-weight-bold btn-sm mr-1" data-toggle="modal"
                            data-target="#add">
                            <i class="flaticon2-cube"></i>
                            Add transaction
                        </button>
                        @include('pages.SMS.PaymentTransactions.modal._add')

                    </div>
                </div>
                <div class="card-body">
                    <table class="table dataTable">
                        <thead>
                            <tr>
                                <th scope="col">Student</th>
                                <th scope="col">Mode of payment</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Payment</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->student->full_name }}</td>
                                    <td>{{ $transaction->mode_of_payment }}</td>
                                    <td>PHP {{ number_format($transaction->total_amount, 2) }}</td>
                                    <td>PHP {{ number_format($transaction->amount, 2) }}</td>
                            @endforeach
                        </tbody>
                      


                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
    <script src=""></script>
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable({
                "paging": true,
                "ordering": false,
                "info": false,
                "searching": true,
                // "scrollY": "300px",
                // "scrollCollapse": true,
                // "paging": false,
            });
            $('#fee').DataTable({
                "paging": true,
                "ordering": false,
                "info": false,
                "searching": false,
                // "scrollY": "300px",
                // "scrollCollapse": true,
                // "paging": false,
            });
        });
    </script>
@endsection
