{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <div class="content d-flex flex-column flex-column-fluid pt-0" id="kt_content">
        <!--begin::Subheader-->
        <!--end::Subheader-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon-profile-1 text-primary"></i>
                    </span>
                    <h3 class="card-label">
                        Enroll New Student
                        {{-- <small>sub title</small> --}}
                    </h3>
                </div>
            </div>
            <div class="card-body"  id="background">

                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">

                        <form action="{{ route('import_student.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="lrn"> <span class="text-danger">*</span> Import Excel File</label>
                                        <input type="file" class="form-control" name="file" placeholder="Excel" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">

                                <button type="reset" class="btn btn-danger mr-2">Clear Form</button>
                                <button type="submit" class="btn btn-primary">Submit Form</button>

                            </div>
                        </form>

                        {{-- </div> --}}
                        <!--end::Row-->

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->

            </div>
        </div>

    </div>

@endsection


