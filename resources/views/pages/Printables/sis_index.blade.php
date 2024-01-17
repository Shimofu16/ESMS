{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIS Layout</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* background-color: aqua; */
        }

        .border {
            margin: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 8.5in;
            height: 11in;
            background: white;
            color: black !important;
            width: 8.5in;
            height: 13.97in;
            padding: 5px;
        }

        .container .header {
            background-color: white;
            display: flex;
            /* border: 1px solid red; */
            padding: 10px 30px 0 30px;
            /* justify-content: space-between; */
        }

        .container .header .deped-logo-wrapper {
            /* padding-left: 50px; */
            padding-left: 30px;
            flex: 1;

        }

        .container .header .deped-logo-wrapper .deped-logo img {
            width: 80px;
            height: auto;
            padding: 15px;
        }

        .container .header .header-title .header-title-text {
            text-align: center;
            flex: 3;

        }

        .container .header .header-title .header-title-text p {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: 900;
            line-height: 1.85rem;
            font-size: large;
        }

        .container .header .capellan-logo-wrapper {
            padding-right: 30px;
            flex: 1;
            text-align: end;
        }

        .container .header .capellan-logo-wrapper .capellan-logo img {
            width: 80px;
            height: auto;
            padding: 15px;
        }

        hr {
            color: black;
            background: black;
            margin: 0 30px 20px 30px;
        }

        .container .content {
            padding-left: 30px;
            padding-right: 30px;
            line-height: 1.7rem;
        }

        .container .content p {
            font-weight: 700;
        }

        .container .content span {
            font-weight: 400;
        }

        .container .content .grade-content {
            display: flex;
            padding-top: 10px;
        }

        .container .content .grade-content .grade-content-left {
            flex: 2;
        }


        .container .content .grade-content .grade-content-right {
            flex: 1;
        }

        .container .content .age-content {
            display: flex;
            /* padding-top: 10px; */
        }

        .container .content .age-content .age {
            flex: 1;
        }


        .container .content .age-content .sex {
            flex: 1;
        }


        .container .content .age-content .nationality {
            flex: 1;
        }

        .container .content .parents-info-content {
            display: flex;
        }

        .container .content .parents-info-content-left {
            flex: 2;
        }

        .container .content .parents-info-content-right {
            flex: 1;
        }

        .container .content .yrs-jhs-content {
            display: flex;
        }

        .container .content .yrs-jhs-content .yrs-jhs {
            flex: 1;
        }

        .container .content .yrs-jhs-content .yr-graduated {
            flex: 1;
        }

        .container .content .yrs-jhs-content .gen-ave {
            flex: 1;
        }




        .container .content .educ-background-content h4 {
            text-align: center;
            padding-top: 30px;
            padding-bottom: 10px;
        }


        .container .content .educ-background-content .educ-background-content-table table {
            border: 1px solid black;
        }

        .container .content .educ-background-content-table thead tr {
            background-color: #4169e1;
            border: 1px solid black;
            color: #000000;
            text-align: center;
            font-weight: bold;
        }

        .container .content .educ-background-content-table th,
        .container .content .educ-background-content-table td {
            border: 1px solid black;
            padding: 3px 5px;
        }

        .container .content .educ-background-content-table tbody tr {
            border-bottom: 1px solid black;
        }

        .container .content .educ-background-content .educ-background-content-table span {
            font-weight: 700;
        }

        .container .content .requirements-content {
            text-align: center;
            padding-top: 30px;
            padding-bottom: 10px;
        }

        .container .content .requirements-content fieldset {
            padding: 10px 20px;
        }

        .container .content .requirements-content fieldset legend {
            padding: 0px 30px;
            text-align: center;
            font-weight: 700;
        }

        .container .content .note-content {
            margin: 10px 20px 20px 20px;
            padding-bottom: 0px;
        }

        .container .content .note-content p {
            font-style: italic;
            font-size: 0.75rem;
            line-height: 1rem;

        }

        .container .content .signature {
            display: flex;
            justify-content: space-between;
            margin-top: 80px;
        }



        .container .content .signature p {
            border-top: 2px solid black;
        }

        .preview-title {
            display: flex;
            text-align: left;
            color: red;
            font-weight: 700;
            margin: 30px 400px 0 400px;
            padding: 10px;
            background-color: aliceblue;

        }

        .preview-title>button {
            margin-left: 580px;
        }
    </style>
</head>

<body>
    <div class="preview-title">
        Preview
        <button>
            <span class="svg-icon svg-icon-primary svg-icon-2x">
                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/Download.svg--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path
                            d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        <rect fill="#000000" opacity="0.3"
                            transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000) "
                            x="11" y="1" width="2" height="14" rx="1" />
                        <path
                            d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999) " />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </button>
    </div>
    <div class="border">
        <div class="border-line" style="border: 1px solid black;">
            <div class="container" id="container">
                <div class="header">
                    <div class="deped-logo-wrapper">
                        <div class="deped-logo">
                            <img src="{{ asset('media/capellan/deped.png') }}" alt="deped-logo">
                        </div>
                    </div>
                    <div class="header-title">
                        <div class="header-title-text">
                            <p>CAPELLAN INSTITUTE OF TECHNOLOGY</p>
                            <p>SAN PABLO CITY BRANCH</p>
                            <br>
                            <p>STUDENT INFORMATION SHEET</p>
                        </div>
                    </div>
                    <div class="capellan-logo-wrapper">
                        <div class="capellan-logo">
                            <img src="{{ asset('media/capellan/capellan-logo-ver2.png') }}" alt="capellan-logo">
                        </div>
                    </div>
                </div>
                <hr>

                <div class="content">
                    <div class="grade-content">
                        <div class="grade-content-left">
                            <p>Grade: <span>11 Tech-Voc ICT-Programming</span> </p>
                            <p>Name: <span>Kheyzel Malabanan Nugoy</span></p>
                            <p>Contact Number: <span>0912345****</span></p>
                        </div>
                        <div class="grade-content-right">
                            <p>LRN: <span>123456789123</span></p>
                            <p>Birthdate: <span>10/11/1999</span></p>
                            <p>Civil Status: <span>Single</span></p>
                        </div>
                    </div>

                    <div class="age-content">
                        <div class="age">
                            <p>Age: <span>22</span></p>
                        </div>
                        <div class="sex">
                            <p>Sex: <span>Female</span> </p>
                        </div>
                        <div class="nationality">
                            <p>Nationality: <span>Filipino</span></p>
                        </div>
                    </div>

                    <div class="address-content">
                        <p>Address: <span>15 Brgy Lamot 2 Calauan, Laguna</span></p>
                    </div>

                    <div class="parents-info-content">
                        <div class="parents-info-content-left">
                            <p>Father's Name: <span>Rogelio Nugoy</span></p>
                            <p>Mother's Name: <span>Consolacion Nugoy</span></p>
                            <p>Guardian's Name: <span>Consolacion Nugoy</span></p>
                        </div>
                        <div class="parents-info-content-right">
                            <p>Occupation: <span>Deceased</span></p>
                            <p>Occupation: <span>House Wife</span></p>
                            <p>Relationship: <span>Mother</span></p>
                        </div>
                    </div>

                    <div class="guardian-address-content">
                        <p>Address of Guardian: <span>15 Purok 1 Brgy Lamot 2 Calauan, Laguna </span></p>
                        <p>Contact Number of Guardian: <span>09*********</span></p>
                        <p>School Last Attended: <span>Dayap National Integrated High School Dayap MAIN</span></p>
                    </div>

                    <div class="yrs-jhs-content">
                        <div class="yrs-jhs">
                            <p>No. of Years in JHS: <span>4</span></p>
                        </div>
                        <div class="yr-graduated">
                            <p>Year Graduated: <span>2016</span></p>
                        </div>
                        <div class="gen-ave">
                            <p>General Average: <span>99.99</span></p>
                        </div>
                    </div>

                    <div class="educ-background-content">
                        <h4>EDUCATIONAL BACKGROUND</h4>

                        <table class="educ-background-content-table" style="width: 100%; border: 1px solid black;">
                            <thead>
                                <tr>
                                    <th colspan="2"></th>
                                    <th>Year Graduated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span>Primary Grade</span></td>
                                    <td>Calauan Central Elementary School
                                    </td>
                                    <td>2006</td>
                                </tr>
                                <tr>
                                    <td><span>Intermediate</span></td>
                                    <td>Calauan Central Elementary School
                                    </td>
                                    <td>2012</td>
                                </tr>
                                <tr>
                                    <td><span>Junior High School</span></td>
                                    <td>Dayap National Integrated High School - Dayap Main
                                    </td>
                                    <td>2016</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="requirements-content">

                        <fieldset>
                            <legend>REQUIREMENTS:</legend>

                            <div>
                                <input type="checkbox" id="form137" name="scales">
                                <label for="scales">Form 137</label>
                            </div>
                            <div>
                                <input type="checkbox" id="psa" name="horns">
                                <label for="horns">NSO/PSA</label>
                            </div>
                            <div>
                                <input type="checkbox" id="card" name="horns">
                                <label for="horns">JHS Certification</label>
                            </div>
                            <div>
                                <input type="checkbox" id="goodmoral" name="horns">
                                <label for="horns">Cerificate of Good Moral</label>
                            </div>
                            <div>
                                <input type="checkbox" id="card" name="horns">
                                <label for="horns">CARD</label>
                            </div>
                            <div>
                                <input type="checkbox" id="vaxxcard" name="horns">
                                <label for="horns">Vaccination Card</label>
                            </div>
                        </fieldset>

                    </div>

                    <div class="note-content">
                        <p><strong>I/We hereby certify that all information written in this enrollment form is true and
                                accurate. If accepted as student of Capellan Institute of Technology San Pablo, we/I
                                shall abide with the school rules/policies. </strong></p>
                    </div>

                    <div class="signature">
                        <div class="sign-left">
                            <p>Name of Adviser and Signature</p>
                        </div>
                        <div class="sign-right">
                            <p>Name of Student and Signature</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>

</html> --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }}
    {{ Metronic::printClasses('html') }}>

<head>
    <meta charset="utf-8" />

    {{-- Title Section --}}
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('media/logos/capellan_logo.png') }}" />

    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}

    {{-- Global Theme Styles (used by all pages) --}}
    @foreach (config('layout.resources.css') as $style)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}"
            rel="stylesheet" type="text/css" />
    @endforeach

    {{-- Layout Themes (used by all pages) --}}
    @foreach (Metronic::initThemes() as $theme)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}"
            rel="stylesheet" type="text/css" />
    @endforeach

    {{-- Includable CSS --}}
    @yield('styles')

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* background-color: aqua; */
        }

        .border {
            margin: 50px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center;
        }

        .container {
            width: 8.5in;
            height: 11in;
            background: white;
            color: black !important;
            width: 8.5in;
            height: 13.97in;
            padding: 5px;
        }

        .container .header {
            background-color: white;
            display: flex;
            /* border: 1px solid red; */
            padding: 10px 30px 0 30px;
            /* justify-content: space-between; */
        }

        .container .header .deped-logo-wrapper {
            /* padding-left: 50px; */
            padding-left: 30px;
            flex: 1;

        }

        .container .header .deped-logo-wrapper .deped-logo img {
            width: 80px;
            height: auto;
            padding: 15px;
        }

        .container .header .header-title .header-title-text {
            text-align: center;
            flex: 3;

        }

        .container .header .header-title .header-title-text p {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-weight: 900;
            line-height: 1.85rem;
            font-size: large;
        }

        .container .header .capellan-logo-wrapper {
            padding-right: 30px;
            flex: 1;
            text-align: end;
        }

        .container .header .capellan-logo-wrapper .capellan-logo img {
            width: 80px;
            height: auto;
            padding: 15px;
        }

        hr {
            color: black;
            background: black;
            margin: 0 30px 20px 30px;
        }

        .container .content {
            padding-left: 30px;
            padding-right: 30px;
            line-height: 1.7rem;
        }

        .container .content p {
            font-weight: 700;
        }

        .container .content span {
            font-weight: 400;
        }

        .container .content .grade-content {
            display: flex;
            padding-top: 10px;
        }

        .container .content .grade-content .grade-content-left {
            flex: 2;
        }


        .container .content .grade-content .grade-content-right {
            flex: 1;
        }

        .container .content .age-content {
            display: flex;
            /* padding-top: 10px; */
        }

        .container .content .age-content .age {
            flex: 1;
        }


        .container .content .age-content .sex {
            flex: 1;
        }


        .container .content .age-content .nationality {
            flex: 1;
        }

        .container .content .parents-info-content {
            display: flex;
        }

        .container .content .parents-info-content-left {
            flex: 2;
        }

        .container .content .parents-info-content-right {
            flex: 1;
        }

        .container .content .yrs-jhs-content {
            display: flex;
        }

        .container .content .yrs-jhs-content .yrs-jhs {
            flex: 1;
        }

        .container .content .yrs-jhs-content .yr-graduated {
            flex: 1;
        }

        .container .content .yrs-jhs-content .gen-ave {
            flex: 1;
        }


        .container .content .educ-background-content h4 {
            text-align: center;
            padding-top: 30px;
            padding-bottom: 10px;
        }


        .container .content .educ-background-content .educ-background-content-table table {
            border: 1px solid black;
        }

        .container .content .educ-background-content-table thead tr {
            background-color: #4169e1;
            border: 1px solid black;
            color: #000000;
            text-align: center;
            font-weight: bold;
        }

        .container .content .educ-background-content-table th,
        .container .content .educ-background-content-table td {
            border: 1px solid black;
            padding: 3px 5px;
        }

        .container .content .educ-background-content-table tbody tr {
            border-bottom: 1px solid black;
        }

        .container .content .educ-background-content .educ-background-content-table span {
            font-weight: 700;
        }

        .container .content .requirements-content {
            text-align: center;
            padding-top: 30px;
            padding-bottom: 10px;
        }

        .container .content .requirements-content fieldset {
            padding: 10px 20px;
        }

        .container .content .requirements-content fieldset legend {
            padding: 0px 30px;
            text-align: center;
            font-weight: 700;
        }

        .container .content .note-content {
            margin: 10px 20px 20px 20px;
            padding-bottom: 0px;
        }

        .container .content .note-content p {
            font-style: italic;
            font-size: 0.75rem;
            line-height: 1rem;

        }

        .container .content .signature {
            display: flex;
            justify-content: space-between;
            margin-top: 80px;
        }



        .container .content .signature p {
            border-top: 2px solid black;
        }

        .preview-title {
            display: flex;
            text-align: center;
            color: red;
            font-weight: 700;
            margin: 30px 400px 0 400px;
            padding: 10px;
           
            background-color: aliceblue;

        }

        .preview-title>button {
            margin-left: 330px;
        }
    </style>

</head>

<body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

    @if (config('layout.page-loader.type') != '')
        @include('layout.partials._page-loader')
    @endif

    @if (config('layout.self.layout') == 'blank')
        <div class="d-flex flex-column flex-root">
            @yield('content')
        </div>
    @else
        @include('layout.base._header-mobile')

        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">

                @if (config('layout.aside.self.display'))
                    @include('layout.base._aside')
                @endif

                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                    @include('layout.base._header')

                    <div class="content {{ Metronic::printClasses('content', false) }} d-flex flex-column flex-column-fluid"
                        id="kt_content">

                        {{-- @if (config('layout.subheader.display'))
                        @if (array_key_exists(config('layout.subheader.layout'), config('layout.subheader.layouts')))
                            @include('layout.partials.subheader._'.config('layout.subheader.layout'))
                        @else
                            @include('layout.partials.subheader._'.array_key_first(config('layout.subheader.layouts')))
                        @endif
                    @endif --}}
                        <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
                            <div
                                class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Page Title-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                        Preview </h5>
                                    <!--end::Page Title-->

                                </div>
                                <!--end::Info-->


                            </div>
                        </div>
                        <!-- //// -->

                        <div>
                            <div class="preview-title">
                                Download
                                <button onclick="generatepdf()" id="button">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/Download.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <rect fill="#000000" opacity="0.3"
                                                    transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                                    x="11" y="1" width="2" height="14" rx="1" />
                                                <path
                                                    d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999) " />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </button>
                            </div>
                            <div class="border">
                                <div class="border-line" style="border: 1px solid black;">
                                    <div class="container" id="container">
                                        <div class="header">
                                            <div class="deped-logo-wrapper">
                                                <div class="deped-logo">
                                                    <img src="{{ asset('media/capellan/deped.png') }}"
                                                        alt="deped-logo" style = "width:110px;"  >
                                                </div>
                                            </div>
                                            <div class="header-title">
                                                <div class="header-title-text">
                                                    <p>CAPELLAN INSTITUTE OF TECHNOLOGY</p>
                                                    <p>SAN PABLO CITY BRANCH</p>
                                                    <br>
                                                    <p>STUDENT INFORMATION SHEET</p>
                                                </div>
                                            </div>
                                            <div class="capellan-logo-wrapper">
                                                <div class="capellan-logo">
                                                    <img src="{{ asset('media/capellan/capellan-logo-ver2.png') }}"
                                                        alt="capellan-logo"  style = "width:110px;">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <hr style="margin-top: 70px; margin-bottom:0px;" >
                                        <div class="content">
                                            <div class="grade-content">
                                                <div class="grade-content-left">
                                                    <p>Grade: <span>{{ $student->enrollment->grade_level->grade_level }} - {{ $student->enrollment->specialization->strand->strand }} ({{ $student->enrollment->specialization->specialization }})</span> </p>
                                                    <p>Name: <span>{{ $student->enrollment->student->last_name }}, {{ $student->enrollment->student->first_name }} {{ $student->enrollment->student->middle_name }} {{ $student->enrollment->student->extension }}</span></p>
                                                    <p>Contact Number: <span>{{ $student->enrollment->student->contact_num }}</span></p>
                                                </div>
                                                <div class="grade-content-right">
                                                    <p>LRN: <span>{{ $student->enrollment->student->lrn }}</span></p>
                                                    <p>Birthdate: <span>{{\Carbon\Carbon::parse($student->enrollment->student->b_date )->format('F d, Y')}}</span></p>
                                                    <p>Civil Status: <span>{{ $student->enrollment->student->civil_status }}</span></p>
                                                </div>
                                            </div>

                                            <div class="age-content">
                                                <div class="age">
                                                    <p>Age: <span>{{ $student->enrollment->student->age }}</span></p>
                                                </div>
                                                <div class="sex">
                                                    <p>Sex: <span>{{ $student->enrollment->student->sex }}</span> </p>
                                                </div>
                                                <div class="nationality">
                                                    <p>Nationality: <span>{{ $student->enrollment->student->nationality }}</span></p>
                                                </div>
                                            </div>

                                            <div class="address-content">
                                                <p>Address: <span>{{ $student->enrollment->student->house_num }} {{ $student->enrollment->student->purok }} {{ $student->enrollment->student->brgy }} {{ $student->enrollment->student->municipality }}, {{ $student->enrollment->student->province }}</span></p>
                                            </div>

                                            <div class="parents-info-content">
                                                <div class="parents-info-content-left">
                                                    <p>Father's Name: <span>{{ $student->enrollment->student->f_name }}</span></p>
                                                    <p>Mother's Name: <span>{{ $student->enrollment->student->m_name }}</span></p>
                                                    <p>Guardian's Name: <span>{{ $student->enrollment->student->g_name }}</span></p>
                                                </div>
                                                <div class="parents-info-content-right">
                                                    <p>Occupation: <span>{{ $student->enrollment->student->f_occu }}</span></p>
                                                    <p>Occupation: <span>{{ $student->enrollment->student->m_occu }}</span></p>
                                                    <p>Relationship: <span>{{ $student->enrollment->student->relationship }}</span></p>
                                                </div>
                                            </div>

                                            <div class="guardian-address-content">
                                                <p>Address of Guardian: <span>{{ $student->enrollment->student->g_add }}
                                                    </span></p>
                                                <p>Contact Number of Guardian: <span>{{ $student->enrollment->student->g_contact_num }}</span></p>
                                                <p>School Last Attended: <span>{{ $student->enrollment->student->prev_school }}</span></p>
                                            </div>

                                            <div class="yrs-jhs-content">
                                                <div class="yrs-jhs">
                                                    <p>No. of Years in JHS: <span>{{ $student->enrollment->student->jhs_yrs }}</span></p>
                                                </div>
                                                <div class="yr-graduated">
                                                    <p>Year Graduated: <span>{{ $student->enrollment->student->year_grad }}</span></p>
                                                </div>
                                                <div class="gen-ave">
                                                    <p>General Average: <span>{{ $student->enrollment->student->gen_ave }}</span></p>
                                                </div>
                                            </div>

                                            <div class="educ-background-content">
                                                <h4>EDUCATIONAL BACKGROUND</h4>

                                                <table class="educ-background-content-table"
                                                    style="width: 100%; border: 1px solid black;">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2"></th>
                                                            <th>Year Graduated</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><span>Primary Grade</span></td>
                                                            <td>{{ $student->enrollment->student->prim_grade }}
                                                            </td>
                                                            <td>{{ $student->enrollment->student->prim_grade_yr }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Intermediate</span></td>
                                                            <td>{{ $student->enrollment->student->intermediate }}
                                                            </td>
                                                            <td>{{ $student->enrollment->student->intermediate_yr }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Junior High School</span></td>
                                                            <td>{{ $student->enrollment->student->junior_hs }}
                                                            </td>
                                                            <td>{{ $student->enrollment->student->junior_hs_yr }}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="requirements-content">

                                                <fieldset>
                                                    <legend>REQUIREMENTS:</legend>

                                                    <div>
                                                        
                                                        <input type="checkbox" id="form137" name="scales" 
                                                        @if ($student->document->Form137_Document != null)
                                                        checked disabled
                                                    @endif
                                                        >
                                                        <label for="scales">Form 137</label>
                                                    </div>
                                                    <div>
                                                        <input type="checkbox" id="psa" name="psa"
                                                        @if ($student->document->JHS_cert_Document != null)
                                                        checked disabled
                                                    @endif
                                                        >
                                                        <label for="psa">NSO/PSA</label>
                                                    </div>
                                                    <div>
                                                        <input type="checkbox" id="card" name="card"
                                                        @if ($student->document->PSA_Document != null)
                                                        checked disabled
                                                    @endif
                                                        >
                                                        <label for="card">JHS Certification</label>
                                                    </div>
                                                    <div>
                                                        <input type="checkbox" id="goodmoral" name="goodmoral"
                                                        @if ($student->document->GoodMoral_Document != null)
                                                        checked disabled
                                                    @endif
                                                        >
                                                        <label for="goodmoral">Cerificate of Good Moral</label>
                                                    </div>
                                                    <div>
                                                        <input type="checkbox" id="card" name="horns"
                                                        @if ($student->document->Card_Document != null)
                                                        checked disabled
                                                    @endif
                                                        >
                                                        <label for="horns">CARD</label>
                                                    </div>
                                                    <div>
                                                        <input type="checkbox" id="vaxxcard" name="vaxxcard"
                                                        >
                                                        <label for="vaxxcard">Vaccination Card</label>
                                                    </div>
                                                </fieldset>

                                            </div>

                                            <div class="note-content">
                                                <p><strong>I/We hereby certify that all information written in this
                                                        form is true and
                                                        accurate. If accepted as student of Capellan Institute of
                                                        Technology San Pablo, we/I
                                                        shall abide with the school rules/policies. </strong></p>
                                            </div>

                                            <div class="signature">
                                                <div class="sign-left">
                                                    <p>Name of Adviser and Signature</p>
                                                </div>
                                                <div class="sign-right">
                                                    <p>Name of Student and Signature</p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  //// -->

                    </div>

                    @include('layout.base._footer')
                </div>
            </div>
        </div>

    @endif

    @if (config('layout.self.layout') != 'blank')

        @if (config('layout.extras.search.layout') == 'offcanvas')
            @include('layout.partials.extras.offcanvas._quick-search')
        @endif

        @if (config('layout.extras.notifications.layout') == 'offcanvas')
            @include('layout.partials.extras.offcanvas._quick-notifications')
        @endif

        @if (config('layout.extras.quick-actions.layout') == 'offcanvas')
            @include('layout.partials.extras.offcanvas._quick-actions')
        @endif

        @if (config('layout.extras.user.layout') == 'offcanvas')
            @include('layout.partials.extras.offcanvas._quick-user')
        @endif

        @if (config('layout.extras.quick-panel.display'))
            @include('layout.partials.extras.offcanvas._quick-panel')
        @endif

        @if (config('layout.extras.toolbar.display'))
            @include('layout.partials.extras._toolbar')
        @endif

        @if (config('layout.extras.chat.display'))
            @include('layout.partials.extras._chat')
        @endif

        @include('layout.partials.extras._scrolltop')

    @endif


    {{-- <script>var HOST_URL = "{{ route('quick-search') }}";</script> --}}

    {{-- Global Config (global config for global JS scripts) --}}
    <script>
        var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!};
    </script>

    {{-- Global Theme JS Bundle (used by all pages) --}}
    @foreach (config('layout.resources.js') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach

    {{-- Includable JS --}}
    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
        integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function generatepdf() {
            var element = document.getElementById('container');
            var opt = {
                margin: 0,
                filename: 'SIS - {{ $student->enrollment->student->last_name }}, {{ $student->enrollment->student->first_name }} {{ $student->enrollment->student->middle_name }} {{ $student->enrollment->student->extension }}',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'legal',
                    orientation: 'portrait'
                }
            };
            html2pdf().set(opt).from(element).save();
        };
    </script>

</body>

</html>
