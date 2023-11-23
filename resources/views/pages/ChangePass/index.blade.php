{{-- Extends layout --}}
@extends('layout.default')


@section('info')
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">

        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
            Change Password
        </h5>
        <!--end::Page Title-->

    </div>
    <!--end::Info-->
@endsection

@section('content')
    <div class="background">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <form action="{{ route('changePass.update')}}" method="POST">
                        @csrf

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> <span class="text-danger">*</span> Old Password</label>
                                    <input type="password" class="form-control" name="old_password" placeholder="Enter old password">
                                
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> <span class="text-danger">*</span> New password</label>
                                    <input type="password" class="form-control" name="new_password" placeholder="Enter new password">
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> <span class="text-danger">*</span> Confirm New Password</label>
                                    <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm password">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    
@endsection
