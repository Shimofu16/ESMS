<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CIT San Pablo Registration Form</title>
    <link rel="shortcut icon" href="{{ asset('media/logos/capellan_logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;


            /* background-image: url("../../../public/media/capellan/capellan-new-building-cropped.jpg"); */
            background-image: url('.../public/media/capellan/capellan-new-building-cropped.jpg');

            /* background:url("../../../public/media/capellan/capellan-new-building-cropped.jpg"); */


            min-height: 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;

            /* background-color: royalblue; */

            background: linear-gradient(to top left, #4169e1 23%, #ffdf00 91%);


        }

        .outer-container {

            max-width: 1100px;
            width: 100%;
            height: 90%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
            overflow: auto;
        }

        .container .title {
            font-size: 30px;
            font-weight: 700;
            position: relative;
        }

        .container .sub-title {
            font-size: 20px;
            font-weight: 700;
            position: relative;
        }

        .outer-container .container img {
            float: left;
            width: 50px;
            height: 50px;
            margin-right: 25px;

        }
    </style>
</head>

<body>

    {{-- @if (Session::has('ok'))

        <body onload="ok()">
    @endif --}}

    <div class="outer-container">
        <div class="container">
            <img src="{{ asset('media/logos/capellan_logo.png') }}" alt="logo" />
            <div class="title mb-3">CIT San Pablo - Student Registration Form</div>
            <div class="content">
                <form method="POST" action="{{ route('enrollmentForm.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 ">
                            <div class = "d-flex flex-column align-items-center ">
                            <div id="my_camera"></div>
                                <div>
                                    <input type=button class="btn btn-sm btn-primary" value="Capture"
                                    onClick="take_snapshot()">
                                </div>
                            </div>
                                <input type="hidden" name="image" class="image-tag">
                            </div>

                        <div class="col-md-6">
                            <div id="results">
                                
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
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

                            <select name="track" id="track" class="custom-select custom-select-sm" required>
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
                                <select name="strand" id="strand" class="custom-select custom-select-sm"
                                    required></select>
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
                                <label for="specialization"><span class="text-danger">*</span> Specialization:</label>
                                <select name="specialization" id="specialization" class="custom-select custom-select-sm"
                                    required></select>
                            </div>
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
                                <input type="number" class="form-control" id="g_contact_num" name="g_contact_num"
                                    placeholder="Contact No. of Guardian" required>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="g_add"><span class="text-danger">*</span> Address of Guardian</label>
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
                                <label for="jhs_yrs"><span class="text-danger">*</span> No. of Years in JHS</label>
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
                                <input type="text" class="form-control" id="prim_grade_yr" name="prim_grade_yr"
                                    placeholder="Year Graduated">
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
                    <div class="row d-flex justify-content-center">
                        <div class="col-4">

                            <button type="reset" class="btn btn-danger ml-3">Clear Form</button>
                            <button type="submit" class="btn btn-primary">Submit Form</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function ok() {
            Swal.fire({
                icon: 'success',
                title: 'Student Registered Successfully!',
                showConfirmButton: true,
            })
        }
    </script> --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#category-img-tag').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#cat_image").change(function() {
            readURL(this);
        });
    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
        Webcam.set({
            width: 490,
            height: 390,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img style = "width:480px; height:auto; padding:20px;" src="' + data_uri + '"/>';
            });
        }
    </script>

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
    {{-- @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"]) --}}
    @include('sweetalert::alert')
</body>

</html>
