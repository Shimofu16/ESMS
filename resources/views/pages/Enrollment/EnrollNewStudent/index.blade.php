{{-- Extends layout --}}
@extends('layout.default')

@section('styles')
    <style>
        #background {
            background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url('{{ asset('media/capellan/capellan-logo-ver2.png') }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center center;

        }
    </style>
@endsection

@section('info')
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">

        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
            Enrollment
            <span class="svg-icon svg-icon-primary svg-icon-2x">
                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Angle-right.svg--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                    viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999) " />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
            New Student
        </h5>
        <!--end::Page Title-->

    </div>
    <!--end::Info-->
@endsection

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
            <div class="card-body" id="background">

                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">

                        <form action="{{ route('enroll_new_student.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="lrn"> <span class="text-danger">*</span> LRN</label>
                                        <input type="number" class="form-control" id="lrn" name="lrn"
                                            placeholder="LRN" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="std_num">Student No.</label>
                                        <input type="number" class="form-control" id="std_num" name="std_num"
                                            placeholder="Student No.">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="section"> <span class="text-danger">*</span>
                                        {{-- <span class="text-danger">*</span> --}}
                                        School Year
                                    </label>
                                    <select class="custom-select custom-select-sm" name="school_year" required>
                                        <option selected disabled>Choose School Year</option>
                                        @foreach ($schoolyears as $schoolyear)
                                            <option value="{{ $schoolyear->id }}">{{ $schoolyear->school_year }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="section"> <span class="text-danger">*</span>
                                        {{-- <span class="text-danger">*</span> --}}
                                        Semester
                                    </label>
                                    <select class="custom-select custom-select-sm" name="sem" required>
                                        <option selected disabled>Choose Sem</option>
                                        @foreach ($sems as $sem)
                                            <option value="{{ $sem->id }}">Semester {{ $sem->sem }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>



                            </div>

                            <div class="row">

                                <div class="col-md-3">
                                    <label for="grade"> <span class="text-danger">*</span>
                                        {{-- <span class="text-danger">*</span> --}}
                                        Grade
                                    </label>
                                    <select class="custom-select custom-select-sm" name="grade_level" required>
                                        <option selected disabled>Choose Grade level</option>
                                        @foreach ($gradelevels as $gradelevel)
                                            <option value="{{ $gradelevel->id }}">{{ $gradelevel->grade_level }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="track"><span class="text-danger">*</span> Track:</label>
                                    {{-- <select class="custom-select custom-select-sm" name="track">

                                        <option selected disabled>Choose Track</option>
                                        @foreach ($tracks as $track)
                                            <option value={{ $track->id }}> {{ $track->track }}</option>
                                        @endforeach

                                    </select> --}}

                                    <select name="track" id="track" class="form-control" required>
                                        <option selected disabled>Select Track</option>
                                        @foreach ($tracks as $track)
                                            <option value="{{ $track->id }}">{{ $track->track }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    {{-- <label for="strand">
                                        Strand
                                    </label> --}}
                                    {{-- <select class="custom-select custom-select-sm" name="strand">

                                        <option selected disabled>Choose Strand</option>
                                        @foreach ($strands as $strand)
                                            <option value={{ $strand->id }}> {{ $strand->strand }}</option>
                                        @endforeach

                                    </select> --}}
                                    <div class="form-group">
                                        <label for="strand"> <span class="text-danger">*</span> Strand:</label>
                                        <select name="strand" id="strand" class="form-control" required></select>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    {{-- <label for="specialization">
                                        Specialization
                                    </label> --}}
                                    {{-- <select class="custom-select custom-select-sm" name="specialization">

                                        <option selected disabled>Choose Specialization</option>
                                        @foreach ($specializations as $specialization)
                                            <option value={{ $specialization->id }}>
                                                {{ $specialization->specialization }}</option>
                                        @endforeach

                                    </select> --}}
                                    <div class="form-group">
                                        <label for="specialization"><span class="text-danger">*</span>
                                            Specialization:</label>
                                        <select name="specialization" id="specialization" class="form-control"
                                            required></select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="section"> <span class="text-danger">*</span>
                                        {{-- <span class="text-danger">*</span> --}}
                                        Student Type
                                    </label>
                                    <select class="custom-select custom-select-sm" name="type" required>
                                        <option selected disabled>Choose Type</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Iregular">Iregular</option>
                                    </select>
                                </div>
                            </div>
                            <br>

                            <div class="text-center h2 pb-3 pt-5 my-5">
                                Student Information
                            </div>




                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_name"><span class="text-danger">*</span> Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            placeholder="Last Name" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="first_name"> <span class="text-danger">*</span> First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="middle_name">Middle Name</label>
                                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                                            placeholder="Middle Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="extension">Extension Name</label>
                                        <input type="text" class="form-control" id="extension" name="extension"
                                            placeholder="Extension Name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="civil_status"><span class="text-danger">*</span> Civil Status</label>
                                        <input type="text" class="form-control" id="civil_status" name="civil_status"
                                            placeholder="Civil Status" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="age"><span class="text-danger">*</span> Age</label>
                                        <input type="number" class="form-control" id="age" name="age"
                                            placeholder="Age" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="sex">
                                        {{-- <span class="text-danger">*</span> --}}
                                        <span class="text-danger">*</span> Sex
                                    </label>
                                    <select class="custom-select custom-select-sm" name="sex" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nationality"><span class="text-danger">*</span> Nationality</label>
                                        <input type="text" class="form-control" id="nationality" name="nationality"
                                            placeholder="Nationality" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="b_date"><span class="text-danger">*</span> Birthdate</label>
                                        <input type="date" class="form-control" id="b_date" name="b_date"
                                            placeholder="Birthdate" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contact_num">Contact Number</label>
                                        <input type="number" class="form-control" id="contact_num" name="contact_num"
                                            placeholder="Contact Number">
                                    </div>
                                </div>
                            </div>

                            <div class="text-center h2 pb-3 pt-5 my-5">
                                Address
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="house_num">House No./Street</label>
                                        <input type="text" class="form-control" id="house_num" name="house_num"
                                            placeholder="House No./Street">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="purok">Purok</label>
                                        <input type="text" class="form-control" id="purok" name="purok"
                                            placeholder="Purok">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="brgy"><span class="text-danger">*</span> Barangay</label>
                                        <input type="text" class="form-control" id="brgy" name="brgy"
                                            placeholder="Barangay" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="municipality"><span class="text-danger">*</span> Municipality</label>
                                        <input type="text" class="form-control" id="municipality" name="municipality"
                                            placeholder="Municipality" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="province"><span class="text-danger">*</span> Province</label>
                                        <input type="text" class="form-control" id="province" name="province"
                                            placeholder="Province" required>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center h2 pb-3 pt-5 my-5">
                                Parent's / Guardian's Information
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="f_name">Father's Name</label>
                                        <input type="text" class="form-control" id="f_name" name="f_name"
                                            placeholder="Father's Name">
                                        <small id="labelf_name" class="form-text text-info font-italic">(Last Name, First
                                            Name,
                                            Middle Name)</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="f_occu">Father's Occupation</label>
                                        <input type="text" class="form-control" id="f_occu" name="f_occu"
                                            placeholder="Father's Occupation">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="m_name">Mother's Name</label>
                                        <input type="text" class="form-control" id="m_name" name="m_name"
                                            placeholder="Mother's Name">
                                        <small id="labelm_name" class="form-text text-info font-italic">(Last Name, First
                                            Name,
                                            Middle Name)</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="m_occu">Mother's Occupation</label>
                                        <input type="text" class="form-control" id="m_occu" name="m_occu"
                                            placeholder="Mother's Occupation">
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="g_name"><span class="text-danger">*</span> Guardian's Name</label>
                                        <input type="text" class="form-control" id="g_name" name="g_name"
                                            placeholder="Guardian's Name" required>
                                        <small id="labelg_name" class="form-text text-info font-italic">(Last Name, First
                                            Name,
                                            Middle Name)</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="relationship"><span class="text-danger">*</span> Relationship</label>
                                        <input type="text" class="form-control" id="relationship" name="relationship"
                                            placeholder="Relationship" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="g_contact_num"><span class="text-danger">*</span> Contact No. of
                                            Guardian</label>
                                        <input type="number" class="form-control" id="g_contact_num"
                                            name="g_contact_num" placeholder="Contact No. of Guardian" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="g_add"><span class="text-danger">*</span> Address of
                                            Guardian</label>
                                        <input type="text" class="form-control" id="g_add" name="g_add"
                                            placeholder="Address of Guardian" required>
                                        <small id="labelg_address" class="form-text text-info font-italic">(House
                                            No./Street)
                                            (Purok) (Barangay) (Municipality) (Province)</small>
                                    </div>
                                </div>
                            </div>


                            <div class="text-center h2 pb-3 pt-5 my-5">
                                Previous School Information
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="prev_school"><span class="text-danger">*</span>School Last
                                            Attended</label>
                                        <input type="text" class="form-control" id="prev_school" name="prev_school"
                                            placeholder="School Last Attended" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="prev_school_type">
                                        {{-- <span class="text-danger">*</span> --}}
                                        <span class="text-danger">*</span> Previous School Type
                                    </label>
                                    <select class="custom-select custom-select-sm" name="prev_school_type" required>
                                        <option value="Public">Public</option>
                                        <option value="Private">Private</option>
                                        <option value="ALS">ALS</option>
                                        <option value="Transferee">Transferee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jhs_yrs"><span class="text-danger">*</span> No. of Years in
                                            JHS</label>
                                        <input type="text" class="form-control" id="jhs_yrs" name="jhs_yrs"
                                            placeholder="No. of Years in JHS" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="year_grad"><span class="text-danger">*</span> Year Graduated</label>
                                        <input type="text" class="form-control" id="year_grad" name="year_grad"
                                            placeholder="Year Graduated" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gen_ave"><span class="text-danger">*</span> General Average</label>
                                        <input type="text" class="form-control" id="gen_ave" name="gen_ave"
                                            placeholder="General Average" required>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center h2 pb-3 pt-5 my-5">
                                Educational Background
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prim_grade">Primary Grade</label>
                                        <input type="text" class="form-control" id="prim_grade" name="prim_grade"
                                            placeholder="Primary Grade">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prim_grade_yr">Year Graduated</label>
                                        <input type="text" class="form-control" id="prim_grade_yr"
                                            name="prim_grade_yr" placeholder="Year Graduated">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="intermediate">Intermediate</label>
                                        <input type="text" class="form-control" id="intermediate" name="intermediate"
                                            placeholder="Intermediate">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="intermediate_yr">Year Graduated</label>
                                        <input type="text" class="form-control" id="intermediate_yr"
                                            name="intermediate_yr" placeholder="Year Graduated">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="junior_hs">Junior High School</label>
                                        <input type="text" class="form-control" id="junior_hs" name="junior_hs"
                                            placeholder="Junior High School">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="junior_hs_yr">Year Graduated</label>
                                        <input type="text" class="form-control" id="junior_hs_yr" name="junior_hs_yr"
                                            placeholder="Year Graduated">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sr_hs">Senior High School</label>
                                        <input type="text" class="form-control" id="sr_hs" name="sr_hs"
                                            placeholder="Senior High School">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sr_hs_yr">Year Graduated</label>
                                        <input type="text" class="form-control" id="sr_hs_yr" name="sr_hs_yr"
                                            placeholder="Year Graduated">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="college">College</label>
                                        <input type="text" class="form-control" id="college" name="college"
                                            placeholder="College">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="college_yr">Year Graduated</label>
                                        <input type="text" class="form-control" id="college_yr" name="college_yr"
                                            placeholder="Year Graduated">
                                    </div>
                                </div>
                            </div> --}}
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
            <div class="card-footer d-flex justify-content-between">
                {{-- <a href="#" class="btn btn-light-primary font-weight-bold">Manage</a>
                <a href="#" class="btn btn-outline-secondary font-weight-bold">Learn more</a> --}}
            </div>
        </div>

    </div>

    {{-- <div class="card">
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <select name="country" id="track" class="form-control">
                        <option value="">Select Track</option>
                        @foreach ($tracks as $track)
                            <option value="{{ $track->id }}">{{ $track->track }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="state">Strand:</label>
                    <select name="state" id="strand" class="form-control"></select>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <select name="city" id="specialization" class="form-control"></select>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div> --}}
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#track").change(function() {
                var trackID = $(this).val();
                if (trackID) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('get_strand') }}',
                        data: {
                            "track_id": trackID
                        },
                        success: function(res) {
                            $("#strand").empty();
                            $("#strand").append(
                                '<option selected disabled>Select Strand</option>');
                            $.each(res, function(key, value) {
                                $("#strand").append('<option value="' + value.id +
                                    '">' + value.strand + '</option>');
                            });

                        }
                    });
                }
            });
            $('#strand').on('change', function() {
                var strandID = $(this).val();
                if (strandID) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('get_specialization') }}",
                        data: {
                            "strand_id": strandID
                        },
                        success: function(res) {
                            if (res) {
                                $("#specialization").empty();
                                $("#specialization").append(
                                    '<option selected disabled>Select Specialization</option>'
                                );
                                $.each(res, function(key, value) {
                                    $("#specialization").append('<option value="' +
                                        value.id + '">' + value.specialization +
                                        '</option>');
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
