{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('styles')
    <style>
        #myChart {
            height: 200;
            width: 200;
        }

        .background {
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
       Dashboard
    </h5>
    <!--end::Page Title-->

</div>
<!--end::Info-->
@endsection

@section('content')
    <div class="background">

        <div class="row">

            <div class="col-md-6 mt-5">
                <div class="col-11 bg-light-warning px-6 py-8 rounded-xl m-auto d-flex border border-primary">
                    <div class="col-6">
                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Address-card.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path
                                            d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
                                            fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <a href="#" class="text-primary font-weight-bold font-size-h4 mt-2">Enrolled Students</a>
                    </div>
                    <div class="col-6 d-flex justify-content-center align-items-center">
                        <h1 class="text-center text-primary  display-2 font-weight-bold">{{ $enrolled_students_cnt }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-5">    
                <div class="col-11 bg-light-warning px-6 py-8 rounded-xl m-auto d-flex border border-primary">

                    <div class="col-6">

                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Urgent-mail.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path
                                        d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z"
                                        fill="#000000" opacity="0.3"></path>
                                    <path
                                        d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">Active School Year</a>
                    </div>
                    <div class="col-6 d-flex justify-content-center align-items-center">
                        <h1 class="text-center text-primary display-4 font-weight-bold">
                            {{ $active_school_year->schoolyear->school_year }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5 mx-auto">

                <div class="col-11 bg-light-warning px-6 py-8 rounded-xl m-auto d-flex border border-primary">

                    <div class="col-6">

                        <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Mail-box.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M22,15 L22,19 C22,20.1045695 21.1045695,21 20,21 L4,21 C2.8954305,21 2,20.1045695 2,19 L2,15 L6.27924078,15 L6.82339262,16.6324555 C7.09562072,17.4491398 7.8598984,18 8.72075922,18 L15.381966,18 C16.1395101,18 16.8320364,17.5719952 17.1708204,16.8944272 L18.118034,15 L22,15 Z"
                                        fill="#000000" />
                                    <path
                                        d="M2.5625,13 L5.92654389,7.01947752 C6.2807805,6.38972356 6.94714834,6 7.66969497,6 L16.330305,6 C17.0528517,6 17.7192195,6.38972356 18.0734561,7.01947752 L21.4375,13 L18.118034,13 C17.3604899,13 16.6679636,13.4280048 16.3291796,14.1055728 L15.381966,16 L8.72075922,16 L8.17660738,14.3675445 C7.90437928,13.5508602 7.1401016,13 6.27924078,13 L2.5625,13 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>

                        <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">Active Semester</a>
                    </div>
                    <div class="col-6 d-flex justify-content-center align-items-center">
                        <h1 class="text-center text-primary display-4 font-weight-bold">Semester
                            {{ $active_school_year->sem->sem }}</h1>
                    </div>
                </div>

            </div>
        </div>

        <div class="row p-3">


            <div class="col-6">
                <table class="table table-active rounded table-bordered  mt-5"
                    style="outline-style: solid; outline-width:2px;">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th colspan="4">Grade 11</th>
                        </tr>
                        <tr>

                            <th>Strand/Specilization</th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spcs as $spc)
                            <tr>
                                <td>{{ $spc->specialization }}</td>
                                @php
                                    $male_cnt = 0;
                                    $female_cnt = 0;
                                    $total_cnt = 0;
                                @endphp
                                @foreach ($enrolled_students_g11->where('specialization_id', $spc->id) as $enrolled_student)
                                    @if ($enrolled_student->student->sex == 'Male')
                                        @php
                                            $male_cnt = $male_cnt + 1;
                                        @endphp
                                    @endif

                                    @if ($enrolled_student->student->sex == 'Female')
                                        @php
                                            $female_cnt = $female_cnt + 1;
                                            
                                        @endphp
                                    @endif
                                    @php
                                        $total_cnt = $female_cnt + $male_cnt;
                                    @endphp
                                @endforeach

                                <td>
                                    {{ $male_cnt }}
                                </td>
                                <td>
                                    {{ $female_cnt }}
                                </td>
                                <td>
                                    {{ $total_cnt }}

                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
            <div class="col-6">
                <table class="table table-active rounded table-bordered  mt-5"
                    style="outline-style: solid; outline-width:2px;">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th colspan="4">Grade 12</th>
                        </tr>
                        <tr>

                            <th>Strand/Specilization</th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Total</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spcs as $spc)
                            <tr>
                                <td>{{ $spc->specialization }}</td>
                                @php
                                    $male_cnt = 0;
                                    $female_cnt = 0;
                                    $total_cnt = 0;
                                @endphp

                                @foreach ($enrolled_students_g12->where('specialization_id', $spc->id) as $enrolled_student)
                                    @if ($enrolled_student->student->sex == 'Male' && $enrolled_student->student->status == 1)
                                        @php
                                            $male_cnt = $male_cnt + 1;
                                        @endphp
                                    @endif

                                    @if ($enrolled_student->student->sex == 'Female' && $enrolled_student->student->status == 1)
                                        @php
                                            $female_cnt = $female_cnt + 1;
                                            
                                        @endphp
                                    @endif
                                    @php
                                        $total_cnt = $female_cnt + $male_cnt;
                                    @endphp
                                @endforeach

                                <td>
                                    {{ $male_cnt }}
                                </td>
                                <td>
                                    {{ $female_cnt }}
                                </td>
                                <td>
                                    {{ $total_cnt }}

                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>

            {{-- <div class="col-6">
                

                @foreach ($sections as $section)
                <p>
                    {{ $section->specialization->specialization }}/ {{ $section->section }}
                </p>
                        
                    @foreach ($section->specialization->enrollment->where('section_id',$section->id) as $enrollment)

                    <p>{{ $enrollment->student->last_name}}</p>

                    @endforeach

                                        
                 @endforeach

            </div> --}}



            {{-- <div class="col-6">
                <h3>Grade 11</h3>
                @foreach ($spcs as $spc)
                        <h5>{{ $spc->strand->strand }}/{{ $spc->specialization }}
                        </h5>
                        @foreach ($spc->enrollment->where('gradelevel_id', 1) as $enrollment)
                            <ul>
                                <li>{{ $enrollment->student->last_name }}</li>
                            </ul>
                        @endforeach
                
                @endforeach
            </div> --}}

            {{-- <div class="col-6">
                <h3>Grade 12</h3>
                @foreach ($spcs as $spc)
                    <h5>{{ $spc->strand->strand }}/{{ $spc->specialization }}</h5>
                    @foreach ($spc->enrollment->where('gradelevel_id', 2) as $enrollment)
                        <ul>
                            <li>{{ $enrollment->student->last_name }}</li>
                        </ul>
                    @endforeach
                @endforeach
            </div> --}}
        </div>
    </div>
    @endsection


    {{-- Scripts Section --}}
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
            integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            ctx.height = 200;
            const labels = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange']
            const myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endsection
