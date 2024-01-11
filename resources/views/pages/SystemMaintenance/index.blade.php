@extends('layout.default')

@section('info')
 <!--begin::Info-->
 <div class="d-flex align-items-center flex-wrap mr-2">

    <!--begin::Page Title-->
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
      System Maintenance
    </h5>
    <!--end::Page Title-->

</div>
<!--end::Info-->
@endsection

{{-- Content --}}
@section('content')
    <div class="row">
        {{-- Bgein Tracks Table --}}
        <div class="col-md-6">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chat-1 text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            Tracks
                            {{-- <small>sub title</small> --}}
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <button type="button" class="btn btn-primary font-weight-bold btn-sm" data-toggle="modal"
                            data-target="#track"><i class="flaticon2-cube"></i>
                            Add Track
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Track Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tracks as $track)
                                <tr>
                                    <td>{{ $track->id }}</td>
                                    <td>{{ $track->track }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    {{-- <a href="#" class="btn btn-light-primary font-weight-bold">Manage</a>
                            <a href="#" class="btn btn-outline-secondary font-weight-bold">Learn more</a> --}}
                </div>
            </div>
        </div>
        {{-- End Tracks Table --}}


        {{-- Bgein Strand Table --}}
        <div class="col-md-6">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chat-1 text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            Strands
                            {{-- <small>sub title</small> --}}
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <button type="button" class="btn btn-primary font-weight-bold btn-sm" data-toggle="modal"
                            data-target="#strand"><i class="flaticon2-cube"></i>
                            Add Strand
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Strand</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($strands as $strand)
                                <tr>
                                    <td>{{ $strand->id }}</td>
                                    <td>{{ $strand->strand }} - ({{ $strand->track->track }} )</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    {{-- <a href="#" class="btn btn-light-primary font-weight-bold">Manage</a>
                            <a href="#" class="btn btn-outline-secondary font-weight-bold">Learn more</a> --}}
                </div>
            </div>
        </div>
        {{-- End Strand Table --}}


        {{-- Bgein Specialization Table --}}
        <div class="col-md-6">
            <div class="card card-custom mt-7">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chat-1 text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            Specialization
                            {{-- <small>sub title</small> --}}
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <button type="button" class="btn btn-primary font-weight-bold btn-sm" data-toggle="modal"
                            data-target="#specialization"><i class="flaticon2-cube"></i>
                            Add Specialization
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Specialization Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($specializations as $specialization)
                                <tr>
                                    <td>{{ $specialization->id }}</td>
                                    <td> {{ $specialization->specialization }} /
                                        {{ $specialization->strand->strand }} - ({{ $strand->track->track }} )
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    {{-- <a href="#" class="btn btn-light-primary font-weight-bold">Manage</a>
                            <a href="#" class="btn btn-outline-secondary font-weight-bold">Learn more</a> --}}
                </div>
            </div>
        </div>
        {{-- End Specialization Table --}}

        <div class="col-md-6">
            <div class="card card-custom mt-7">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chat-1 text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            Sections
                            {{-- <small>sub title</small> --}}
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <button type="button" class="btn btn-primary font-weight-bold btn-sm" data-toggle="modal"
                            data-target="#section"><i class="flaticon2-cube"></i>
                            Add Section
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">Section</th>
                                <th scope="col">Specialization Name</th>
                                <th scope="col">Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sections as $section)
                                <tr>
                                    <td>
                                        <a href="{{ route('schedule.show', ['section_id' => $section->id]) }}">
                                            {{ $section->section }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $section->specialization->specialization }}
                                    </td>
                                    <td>
                                        {{ $section->gradelevel->grade_level }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    {{-- <a href="#" class="btn btn-light-primary font-weight-bold">Manage</a>
                            <a href="#" class="btn btn-outline-secondary font-weight-bold">Learn more</a> --}}
                </div>
            </div>
        </div>
        {{-- End Specialization Table --}}

        {{-- Bgein SchoolYear Table --}}
        <div class="col-md-6">
            <div class="card card-custom mt-7">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chat-1 text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            School Year
                            {{-- <small>sub title</small> --}}
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <button type="button" class="btn btn-primary font-weight-bold btn-sm" data-toggle="modal"
                            data-target="#school_year"><i class="flaticon2-cube"></i>
                            Add School Year
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">School Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schoolYears as $schoolYear)
                                <tr>
                                    <td>{{ $schoolYear->id }}</td>
                                    <td> {{ $schoolYear->school_year }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        {{-- End SchoolYearTable --}}

        {{-- Bgein SchoolYear Table --}}
        <div class="col-md-6">
            <div class="card card-custom mt-7">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chat-1 text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            Active School Year and Sem
                            <small></small>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        @if ($active_schoolYear_sems == null)
                            {{-- <button type="button" class="btn btn-primary font-weight-bold btn-sm" data-toggle="modal"
                                data-target="#school_year"><i class="flaticon2-cube"></i>
                                Add School Year
                            </button> --}}
                        @else
                            <button type="button" class="btn btn-primary font-weight-bold btn-sm act_sy_sem-edit"
                                data-toggle="modal"
                                data-target="#change_school_year"
                                data-uid="{{ $active_schoolYear_sems->id }}"
                                data-sy="{{  $active_schoolYear_sems->schoolyear->id }}"
                                data-sem="{{ $active_schoolYear_sems->sem->id }}">
                                </i>
                                Update
                            </button>
                        @endif

                    </div>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">School Year</th>
                                <th>Sem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $active_schoolYear_sems->schoolyear->school_year }}</td>
                                <td>{{ $active_schoolYear_sems->sem->sem }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        {{-- End SchoolYearTable --}}
    </div>

    <!-- Track Modal-->
    <div class="modal fade" id="track" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Register Track</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{{ route('track.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Track <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Track" name="track" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Strand Modal-->
    <div class="modal fade" id="strand" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Register Strand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{{ route('strand.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="strand">Select Track <span class="text-danger">*</span></label>
                                <select class="form-control" id="track" name="track">
                                    @foreach ($tracks as $track)
                                        <option value={{ $track->id }}> {{ $track->track }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Strand Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Strand" name="strand" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Specialization Modal-->
    <div class="modal fade" id="specialization" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Register Specialization</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{{ route('specialization.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="strand">Select Strand <span class="text-danger">*</span></label>
                                <select class="form-control" id="strand" name="strand">

                                    @foreach ($strands as $strand)
                                        <option value={{ $strand->id }}> {{ $strand->strand }} -
                                            ({{ $strand->track->track }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Specialization Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Specialization"
                                name="specialization" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Section Modal-->
    <div class="modal fade" id="section" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Register Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{{ route('section.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="strand">Select Specialization <span class="text-danger">*</span></label>
                                <select class="form-control" id="specialization" name="specialization">

                                    @foreach ($specializations as $specialization)
                                        <option value={{ $specialization->id }}>
                                            {{ $specialization->specialization }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="strand">Select Grade Level <span class="text-danger">*</span></label>
                                <select class="form-control" id="gradelevel" name="gradelevel">

                                    @foreach ($gradelevels as $gradelevel)
                                        <option value={{ $gradelevel->id }}>
                                            {{ $gradelevel->grade_level }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Section Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter section"
                                name="section" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Active School Year and Sem Modal-->
    <div class="modal fade" id="change_school_year" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Active School Year and Sem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form id="update" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>School Year (e.g. 2000-2001) <span class="text-danger">*</span></label>
                            <select class="custom-select custom-select-sm" name="schhol_year">
                                <option selected disabled>Choose School Year</option>
                                @foreach ($schoolYears as $schoolyear)
                                    <option value="{{ $schoolyear->id }}">{{ $schoolyear->school_year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Semester (e.g. Semester 1) <span class="text-danger">*</span></label>
                            <select class="custom-select custom-select-sm" name="sem">
                                <option selected disabled>Choose Sem</option>
                                @foreach ($sems as $sem)
                                    <option value="{{ $sem->id }}">Semester {{ $sem->sem }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- SchoolYear Modal-->
    <div class="modal fade" id="school_year" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> Add School Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form action="{{ route('school_year.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>School Year (e.g. 2000-2001) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter School Year" name="school_year" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    {{-- <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script> --}}

    <script>
        $(document).ready(function() {

            $('.act_sy_sem-edit').each(function() {
                $(this).click(function(event) {
                    $('#update').attr("action", "/act_sy_sem/update/" + $(this).data('uid') + "");
                    $('select[name="schhol_year"]').val($(this).data('sy'));
                    $('select[name="sem"]').val($(this).data('sem'));

                });
            });
        });
    </script>
@endsection
