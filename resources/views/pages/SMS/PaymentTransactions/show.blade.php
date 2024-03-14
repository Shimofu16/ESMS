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
            Payment Transactions - Fees
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
                            Payment Transactions - Fees
                        </h3>
                        <small>Below are the Payment Transactions for SY: {{ $active_school_year }} </small>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <a href="{{ route('transaction.index') }}" class="btn btn-primary font-weight-bold btn-sm mr-3">
                            Back to transactions
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                                Fee Types
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach (getFeeTypes() as $fee)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('transaction.show', ['transaction_id' => $transaction_id, 'fee_type' => $fee]) }}">{{ Str::ucfirst($fee) }}</a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{ route('transaction.show', ['transaction_id' => $transaction_id]) }}"
                                        class="dropdown-item">Reset</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table dataTable">
                        <thead>
                            <tr>
                                <th scope="col">Fee</th>
                                <th scope="col">Fee Amount</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Balances</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->fee->name }}</td>
                                    <td>PHP {{ number_format($transaction->fee_amount, 2) }}</td>
                                    <td>PHP {{ number_format($transaction->amount, 2) }}</td>
                                    <td>
                                        @if ($transaction->balances->count() > 0)
                                            <button class="btn btn-outline-info btn-sm" data-toggle="modal"
                                                data-target="#balances{{ $transaction->id }}">
                                                <i class="fas fa-eye"></i>
                                                View
                                            </button>
                                            @include('pages.SMS.PaymentTransactions.modal._balances')
                                        @endif
                                    </td>
                                    <td>{{ date('M d, Y', strtotime($transaction->created_at)) }}</td>
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
        });
    </script>
@endsection
