{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css">

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
      Accounting

      <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Angle-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24"/>
            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
        </g>
    </svg><!--end::Svg Icon--></span>

      Report

      <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Angle-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24"/>
            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999) "/>
        </g>
    </svg><!--end::Svg Icon--></span>

      View
    </h5>
    <!--end::Page Title-->

</div>
<!--end::Info-->
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Profile Personal Information-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <!--end::Aside-->
                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-8">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Header-->
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark mt-3">Report Information</h3>
                                {{-- <span class="text-muted font-weight-bold font-size-sm mt-1">Update the Student's
                                    Billing</span> --}}
                            </div>

                            <div class="text-end mt-3">
                                <a href="{{ route('soa.index', $students->enrollment->student->id) }}"
                                    class="btn btn-clean btn-hover-light-primary">
                                    <i class="flaticon2-print"></i>
                                    <span class="text-primary">
                                        Print Statement of Account
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form class="form">
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="font-weight-bold mb-6 text-center">Student Info</h5>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Name of Student</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                            value="{{ $students->last_name }}, {{ $students->first_name }} {{ $students->middle_name }} {{ $students->extension }}"
                                            disabled>
                                    </div>
                                </div>

                                <br>
                                <hr>
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="font-weight-bold mt-10 mb-6 text-center">Billings Info</h5>
                                    </div>
                                </div>

                                <!--begin: Datatable-->
                                <table class="table table-separate table-head-custom table-checkable" id="example">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Particulars</th>
                                            <th>Debit</th>
                                            <th>Credit</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($bills_pays as $bill_pay)
                                            @if ($loop->first)
                                                @php
                                                    $bal = $bill_pay->billing_amt;
                                                    $bal = $bal - $bill_pay->payment_amt;
                                                @endphp
                                            @else
                                                @php
                                                    if ($bill_pay->billing_amt != null) {
                                                        // echo 'null billing';
                                                        $bal = $bal + $bill_pay->billing_amt;
                                                    }
                                                    if ($bill_pay->payment_amt != null) {
                                                        // echo 'null payment';
                                                        $bal = $bal - $bill_pay->payment_amt;
                                                    }
                                                    
                                                    if ($bill_pay->memo_amt != null) {
                                                        // echo 'null payment';
                                                        if ($bill_pay->memo_type == 'Debit') {
                                                            $bal = $bal - $bill_pay->memo_amt;
                                                        } else {
                                                            $bal = $bal + $bill_pay->memo_amt;
                                                        }
                                                    }
                                                @endphp
                                            @endif

                                            <tr>

                                                @if ($bill_pay->billing_date = $bill_pay->billing_date)
                                                    <td> {{ $bill_pay->billing_date }} </td>
                                                @elseif ($bill_pay->transaction_date = $bill_pay->transaction_date)
                                                    <td> {{ $bill_pay->transaction_date }} </td>
                                                @else
                                                    <td> {{ $bill_pay->memo_date }}</td>
                                                @endif

                                                @if ($bill_pay->billing_particulars = $bill_pay->billing_particulars)
                                                    <td> {{ $bill_pay->billing_particulars }} </td>
                                                @elseif ($bill_pay->payment_particulars = $bill_pay->payment_particulars)
                                                    <td> {{ $bill_pay->payment_particulars }} </td>
                                                @else
                                                    <td> {{ $bill_pay->memo_particulars }}</td>
                                                @endif


                                                @if ($bill_pay->billing_amt = $bill_pay->billing_amt)
                                                    <td></td>
                                                    <td> {{ $bill_pay->billing_amt }} </td>
                                                @elseif ($bill_pay->payment_amt = $bill_pay->payment_amt)
                                                    <td> {{ $bill_pay->payment_amt }} </td>
                                                    <td></td>
                                                @else
                                                    @if ($bill_pay->memo_type == 'Debit')
                                                        <td> {{ $bill_pay->memo_amt }} </td>
                                                        <td></td>
                                                    @else
                                                        <td></td>
                                                        <td> {{ $bill_pay->memo_amt }} </td>
                                                    @endif
                                                @endif

                                                <td>{{ $bal }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td><strong>Balance</strong></td>
                                            <td><strong>{{ $balance }}</strong></td>
                                        </tr>
                                    </tbody>

                                </table>
                                <!--end: Datatable-->




                            </div>
                            <!--end::Body-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Profile Personal Information-->
        </div>
        <!--end::Container-->
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
@endsection
