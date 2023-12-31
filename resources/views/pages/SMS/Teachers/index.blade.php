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
            Teachers
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
                            Teachers
                        </h3>
                        <small>Below are the teachers</small>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <button type="button" class="btn btn-primary font-weight-bold btn-sm mr-1" data-toggle="modal"
                            data-target="#add">
                            <i class="flaticon2-cube"></i>
                            Add Teachers
                        </button>
                        @include('pages.SMS.Teachers.modal._add')

                    </div>
                </div>
                <div class="card-body">
                    <table class="table dataTable">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Contact No</th>
                                <th scope="col">Age</th>
                                <th scope="col">Gender</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <h5 class="mb-0"> {{ $teacher->name }}</h5>
                                            <small>{{ $teacher->email }}</small>
                                        </div>
                                    </td>
                                    <td>{{ $teacher->contact }}</td>
                                    <td>{{ $teacher->age }}</td>
                                    <td>{{ $teacher->gender }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="#edit{{ $teacher->id }}">
                                            <i class="fas fa-edit text-primary"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                            data-target="#delete{{ $teacher->id }}">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                                @include('pages.SMS.Teachers.modal._edit')
                                @include('pages.SMS.Teachers.modal._delete')
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
