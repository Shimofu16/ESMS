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
            Users
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
                            users
                        </h3>
                        <small>Below are the users</small>
                    </div>
                    <div class="card-toolbar">
                        <a class="btn btn-secondary font-weight-bold btn-sm mr-1" href="{{ route('user.index') }}">
                            {{-- return --}}
                            <i class="flaticon2-back"></i>
                            back
                        </a>

                    </div>
                </div>
                <div class="card-body">
                    <table class="table dataTable" id="users-table">
                        <thead>
                            <tr>
                                <th scope="col">Subject</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->activities as $activity)
                                <tr>
                                    <td>{{ $activity->subject }} </td>
                                    <td>{{ $activity->description }} </td>
                                    <td>{{ date('F d, Y - h:i:s A', strtotime($activity->created_at)) }}</td>
                                </tr>
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
