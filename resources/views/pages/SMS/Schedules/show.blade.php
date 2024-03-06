@extends('layout.default')

@section('styles')
<style>
    tr.bg-orange th {
        background-color: #f8cbad;
    }

    table.table-bordered {
        border-collapse: collapse;
        border: 1px solid black;
        /* Adjust border width as needed */
    }

    table.table-bordered th,
    table.table-bordered td {
        border: 1px solid black;
        /* Adjust border width as needed */
        padding: 8px;
        /* Add padding to cells for better spacing */
    }
</style>
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
                            Schedule - {{ $section->section }}
                        </h3>
                        <small>Below are the schedule</small>
                    </div>
                    <div class="card-toolbar">
                        <!-- Button trigger modal-->
                        <a class="btn btn-secondary font-weight-bold btn-sm mr-1" href="{{ route('schedule.index') }}">
                            {{-- return --}}
                            <i class="flaticon2-back"></i>
                            back
                        </a>
                    </div>
                </div>
                <div class="card-body container">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Subject</th>
                                <th scope="col">Section</th>
                                <th scope="col">Monday</th>
                                <th scope="col">Tuesday</th>
                                <th scope="col">Wednesday</th>
                                <th scope="col">Thursday</th>
                                <th scope="col">Friday</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($schedules as $schedule)
                                @php
                                    $days = collect($schedule->days);
                                @endphp
                                <tr>
                                    <td>
                                        <div class="card bg-transparent border-0">
                                            <div class="card-body px-1 text-center">
                                                    <h6>{{ $schedule->subject->name }}</h6>
                                                    <span>{{ $schedule->teacher->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="card bg-transparent border-0">
                                            <div class="card-body px-1 text-center">
                                                <h6>{{ $schedule->section->section }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    @if ($days->contains('Monday'))
                                        <td class="px-1">
                                            <div class="card bg-transparent border-0">
                                                <div class="card-body px-1 text-center">
                                                    {{-- section, specialization, and time --}}

                                                    <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                        {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-1">
                                            <div class="card border-0">
                                                <div class="card-body px-1 text-center">
                                                    &nbsp;
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                    @if ($days->contains('Tuesday'))
                                        <td class="px-1">
                                            <div class="card bg-transparent border-0">
                                                <div class="card-body px-1 text-center">
                                                    {{-- section, specialization, and time --}}
                                                    <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                        {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-1">
                                            <div class="card border-0">
                                                <div class="card-body px-1 text-center">
                                                    &nbsp;
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                    @if ($days->contains('Wednesday'))
                                        <td class="px-1">
                                            <div class="card bg-transparent border-0">
                                                <div class="card-body px-1 text-center">
                                                    {{-- section, specialization, and time --}}
                                                    <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                        {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-1">
                                            <div class="card border-0">
                                                <div class="card-body px-1 text-center">
                                                    &nbsp;
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                    @if ($days->contains('Thursday'))
                                        <td class="px-1">
                                            <div class="card bg-transparent border-0">
                                                <div class="card-body px-1 text-center">
                                                    {{-- section, specialization, and time --}}
                                                    <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                        {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-1">
                                            <div class="card border-0">
                                                <div class="card-body px-1 text-center">
                                                    &nbsp;
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                    @if ($days->contains('Friday'))
                                        <td class="px-1">
                                            <div class="card bg-transparent border-0">
                                                <div class="card-body px-1 text-center">
                                                    {{-- section, specialization, and time --}}
                                                    <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                        {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-1">
                                            <div class="card border-0">
                                                <div class="card-body px-1 text-center">
                                                    &nbsp;
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <td colspan="5" class="text-center">
                                    No Schedules
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
