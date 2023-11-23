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
                        <button type="button" class="btn btn-primary font-weight-bold btn-sm mr-1" data-toggle="modal"
                            data-target="#add">
                            <i class="flaticon2-cube"></i>
                            Add Users
                        </button>
                        @include('pages.SMS.Users.modal._add')


                    </div>
                </div>
                <div class="card-body">
                    <table class="table dataTable" id="users-table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Role</th>
                                <th scope="col">Logs</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span>{{ $user->name }}</span>
                                            <small>{{ $user->email }}</small>
                                        </div>
                                    </td>

                                    <td>
                                        {{ Str::ucfirst($user->username) }}
                                    </td>
                                    <td>
                                        @isset($user->getRoleNames()[0])
                                            {{ Str::ucfirst($user->getRoleNames()[0]) }}
                                        @endisset
                                    </td>

                                    <td>
                                        <a class="btn btn-sm btn-outline-info"
                                            href="{{ route('user.show', ['id' => $user->id]) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="modal"
                                                data-target="#edit{{ $user->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            {{-- <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal"
                                                data-target="#delete{{ $user->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button> --}}
                                            @include('pages.SMS.Users.modal._edit')
                                            {{-- @include('pages.SMS.Users.modal._delete') --}}
                                        </div>
                                    </td>
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
    <script>
        $(document).ready(function() {
            $('#alert-passwordUpdate').hide();
            $('#alert-password_confirmationUpdate').hide();
            $('#showUpdate').click(function() {
                if ($(this).is(':checked')) {
                    $('#passwordUpdate').attr('type', 'text');
                    $('#password_confirmationUpdate').attr('type', 'text');
                    console.log('checked')
                } else {
                    $('#passwordUpdate').attr('type', 'password');
                    $('#password_confirmationUpdate').attr('type', 'password');
                    console.log('uncheked')
                }
            });
            /* check also if the password is 8 characters */
            $('#passwordUpdate').keyup(function() {
                if ($('#passwordUpdate').val()
                    .length >= 8) {
                    $('#passwordUpdate').css('border', '1px solid green');
                    $('#alert-passwordUpdate').hide();
                    $('#submitUpdate').prop('disabled', false);
                } else {
                    $('#passwordUpdate').css('border', '1px solid red');
                    $('#alert-passwordUpdate').show();
                    $('#alert-passwordUpdate').text('Password must be 8 characters');
                    $('#submitUpdate').prop('disabled', true);
                }
            });
            /* check if the password and confirm password are the same */
            $('#password_confirmationUpdate').keyup(function() {
                if ($('#passwordUpdate').val() == $('#password_confirmationUpdate').val()) {
                    $('#password_confirmationUpdate').css('border', '1px solid green');
                    $('#alert-password_confirmationUpdate').hide();
                    if ($('#passwordUpdate').val()
                        .length >= 8) {
                        $('#submitUpdate').prop('disabled', false);
                    }
                } else {
                    $('#password_confirmationUpdate').css('border', '1px solid red');
                    $('#alert-password_confirmationUpdate').show();
                    $('#alert-password_confirmationUpdate').text(
                        'Password and Confirm Password must be the same');
                    $('#submitUpdate').prop('disabled', true);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#alert-passwordCreate').hide();
            $('#alert-password_confirmationCreate').hide();
            $('#showCreate').click(function() {
                if ($(this).is(':checked')) {
                    $('#passwordCreate').attr('type', 'text');
                    $('#password_confirmationCreate').attr('type', 'text');
                    console.log('checked')
                } else {
                    $('#passwordCreate').attr('type', 'password');
                    $('#password_confirmationCreate').attr('type', 'password');
                    console.log('uncheked')
                }
            });
            /* check also if the password is 8 characters */
            $('#passwordCreate').keyup(function() {
                if ($('#passwordCreate').val()
                    .length >= 8) {
                    $('#passwordCreate').css('border', '1px solid green');
                    $('#alert-passwordCreate').hide();
                    $('#submitCreate').prop('disabled', false);
                } else {
                    $('#passwordCreate').css('border', '1px solid red');
                    $('#alert-passwordCreate').show();
                    $('#alert-passwordCreate').text('Password must be 8 characters');
                    $('#submitCreate').prop('disabled', true);
                }
            });
            /* check if the password and confirm password are the same */
            $('#password_confirmationCreate').keyup(function() {
                if ($('#passwordCreate').val() == $('#password_confirmationCreate').val()) {
                    $('#password_confirmationCreate').css('border', '1px solid green');
                    $('#alert-password_confirmationCreate').hide();
                    if ($('#passwordCreate').val()
                        .length >= 8) {
                        $('#submitCreate').prop('disabled', false);
                    }
                } else {
                    $('#password_confirmationCreate').css('border', '1px solid red');
                    $('#alert-password_confirmationCreate').show();
                    $('#alert-password_confirmationCreate').text(
                        'Password and Confirm Password must be the same');
                    $('#submitCreate').prop('disabled', true);
                }
            });
        });
    </script>
@endsection
