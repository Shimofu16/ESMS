@extends('layout.default')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css">
    @livewireStyles
@endsection

@section('info')
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">

        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
            Schedule
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
                            Schedule
                        </h3>
                        <small>Below are the schedule</small>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <button type="button" class="btn btn-primary font-weight-bold btn-sm mr-1" data-toggle="modal"
                            data-target="#add">
                            <i class="flaticon2-cube"></i>
                            Add Schedule
                        </button>
                        @include('pages.SMS.Schedules.modal._add')
                    </div>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>
                    <table class="table dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Teacher</th>
                                <th scope="col">Section</th>
                                <th scope="col">Specialization</th>
                                <th scope="col">Schedule</th>
                                <th scope="col">Semester</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $schedule->subject->name }}</td>
                                    <td>{{ $schedule->teacher->name }}</td>
                                    <td>
                                        <a href="{{ route('schedule.show', ['section_id' => $schedule->section_id]) }}">
                                            {{ $schedule->section->section }}
                                        </a>

                                    </td>
                                    <td>{{ $schedule->subject->specialization->specialization }}</td>
                                    <td>
                                        <span>
                                            @foreach ($schedule->days as $day)
                                                {{ $day }}
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </span><br>
                                        <span>At {{ date('h:i A', strtotime($schedule->start_time)) }} -
                                            {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                    </td>
                                    <td>{{ $schedule->subject->semester->sem }}</td>

                                    <td>
                                        <button class="btn btn-outline-danger btn-sm text-danger" data-toggle="modal"
                                            data-target="#delete{{ $schedule->id }}">
                                            <i class="fas fa-trash "></i>
                                        </button>
                                        @include('pages.SMS.Schedules.modal._delete')
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
    @livewireScripts
    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable({
                "paging": true,
                "ordering": false,
                "info": false,
                "searching": true,
            });
        });
    </script>
@endsection
