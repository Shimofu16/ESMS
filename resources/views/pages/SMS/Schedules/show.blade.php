@extends('layout.default')

@section('styles')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css"> --}}
    {{-- <script src="{{ asset('fullcalendar-6.1.9/dist/index.global.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var schedules = {!! $schedules !!}
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    schedules.forEach(element => {

                    });
                ]
            });
            calendar.render();
        });
    </script> --}}
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Subject</th>
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
                                        <h6>{{ $schedule->subject->name }}</h6>
                                    </td>
                                    @if ($days->contains('Monday'))
                                        <td class="px-1">
                                            <div class="card">
                                                <div class="card-body px-1 text-center">
                                                    {{-- section, specialization, and time --}}

                                                    <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                        {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if ($days->contains('Tuesday'))
                                        <td class="px-1">
                                            <div class="card">
                                                <div class="card-body px-1 text-center">
                                                    {{-- section, specialization, and time --}}
                                                    <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                        {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if ($days->contains('Wednesday'))
                                        <td class="px-1">
                                            <div class="card">
                                                <div class="card-body px-1 text-center">
                                                    {{-- section, specialization, and time --}}
                                                    <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                        {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if ($days->contains('Thursday'))
                                        <td class="px-1">
                                            <div class="card">
                                                <div class="card-body px-1 text-center">
                                                    {{-- section, specialization, and time --}}
                                                    <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                        {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if ($days->contains('Friday'))
                                        <td class="px-1">
                                            <div class="card">
                                                <div class="card-body px-1 text-center">
                                                    {{-- section, specialization, and time --}}
                                                    <span>{{ date('h:i A', strtotime($schedule->start_time)) }} -
                                                        {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td></td>
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
