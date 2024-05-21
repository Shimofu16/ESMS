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
            Fees
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
                            Fee
                        </h3>
                        <small>Below are the Fees</small>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        @can('add-fee')
                            <button type="button" class="btn btn-primary font-weight-bold btn-sm mr-1" data-toggle="modal"
                                data-target="#add">
                                <i class="flaticon2-cube"></i>
                                Add Fee
                            </button>
                            @include('pages.SMS.Fees.modal._add')
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <table class="table dataTable">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Amount</th>
                                @can('delete-fee')
                                    <th scope="col" class="text-center">Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fees as $fee)
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <h5 class="mb-0"> {{ $fee->name }}</h5>
                                            <small>{{ $fee->description }}</small>
                                        </div>
                                    </td>
                                    <td>{{ $fee->type }}</td>
                                    <td>PHP {{ number_format($fee->amount, 2) }}</td>
                                    <td class="text-center">
                                        @can('edit-fee')
                                            <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                data-target="#edit{{ $fee->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        @endcan
                                        @can('delete-fee')
                                            <button class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                                data-target="#delete{{ $fee->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                                @can('edit-fee')
                                    @include('pages.SMS.Fees.modal._edit')
                                @endcan
                                @can('delete-fee')
                                    @include('pages.SMS.Fees.modal._delete')
                                @endcan
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
