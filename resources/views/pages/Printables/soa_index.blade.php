<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statement of Accounts</title>

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

        .border-line {
            border: 1px solid black;
        }

        .container {
            background: white;
            color: black !important;
            width: 8.5in !important;
            height: 13.8in !important;
            padding: 5px;
            position: relative;
        }

        .container .header {
            background-color: white;
            display: flex;
            /* border: 1px solid red; */
            padding: 5px 30px 0 30px;
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
            /* font-family:Georgia, 'Times New Roman', Times, serif; */
            font-weight: 900;
            line-height: 1.85rem;
            font-size: large;
        }

        .container .header .header-title .header-title-text .school-year p {
            font-weight: 700;
            font-style: italic;
            font-size: 1.15rem;
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

        .container .header .capellan-logo-wrapper p {
            padding-top: 0;
            font-weight: 500;
            font-style: italic;
        }

        hr {
            color: black;
            background: black;
            margin: 10px 30px 20px 30px;
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

        .container .content .summary-of-transaction {
            padding-top: 25px;
        }


        table {
            border: 1px solid black;
            padding-top: 30px;
            border-collapse: collapse
        }

        .container .content .transaction-table thead tr {
            background-color: #7183b8;
            border: 1px solid black;
            color: #000000;
            text-align: center;
            font-weight: bold;
        }

        .container .content .transaction-table th,
        .container .content .transaction-table td {
            border: 1px solid black;

        }

        .container .content .transaction-table tbody tr {
            border-bottom: 1px solid black;
            text-align: center;
        }

        .container .content .summary-of-transaction .transaction-table span {
            font-weight: 700;
        }


        footer>h3 {

            font-weight: 500;
            font-style: italic;
            padding: 10px;
            padding-top: 0;
            font-size: 1rem;
            width: 100%;
            text-align: center;
            bottom: 0;
            position: absolute;

        }

        .preview-title {
            display: flex;
            text-align: center;
            justify-content: center;
            gap: 10px;
            color: red;
            font-weight: 700;
            margin: 30px 400px 0 400px;
            padding: 10px;
        }

    </style>
</head>

<body>
    <div class="preview-title">
        Download
        <button onclick="generatepdf()" id="button">
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
        <div class="border-line">
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
                            <p>STATEMENT OF ACCOUNT</p>
                            <div class="school-year">
                                <p>A.Y. {{ $active_school_year->schoolyear->school_year }}</p>
                            </div>
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
                    <div class="student-info">
                        <p>Name: <span>{{ $students->last_name }}, {{ $students->first_name }}
                                {{ $students->middle_name }} {{ $students->extension }}</span></p>
                        <p>Grade/Strand: <span>{{ $students->enrollment->grade_level->grade_level }} -
                                {{ $students->enrollment->specialization->strand->strand }}
                                ({{ $students->enrollment->specialization->specialization }})</span></p>
                    </div>

                    <div class="summary-of-transaction">
                        <table class="transaction-table" style="width: 100%; border: 1px solid black;">
                            <thead>
                                <tr>
                                    <th colspan="5">Summary of Transactions</th>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <th>Particulars</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bills_pays as $bill_pay)
                                    @if ($loop->first)
                                        @php
                                            $bal = $bill_pay->billing_amt;
                                            $bal = $bal - $bill_pay->payment_amt;
                                        @endphp
                                    @else
                                        @php
                                            if ($bill_pay->billing_amt != null) {
                                                // echo 'null billing';
                                                $bal = $bal + $bill_pay->billing_amt;
                                            }
                                            if ($bill_pay->payment_amt != null) {
                                                // echo 'null payment';
                                                $bal = $bal - $bill_pay->payment_amt;
                                            }
                                            
                                            if ($bill_pay->memo_amt != null) {
                                                // echo 'null payment';
                                                if ($bill_pay->memo_type == 'Debit') {
                                                    $bal = $bal - $bill_pay->memo_amt;
                                                } else {
                                                    $bal = $bal + $bill_pay->memo_amt;
                                                }
                                            }
                                        @endphp
                                    @endif

                                    <tr>

                                        @if ($bill_pay->billing_date = $bill_pay->billing_date)
                                            <td> {{ $bill_pay->billing_date }} </td>
                                        @elseif ($bill_pay->transaction_date = $bill_pay->transaction_date)
                                            <td> {{ $bill_pay->transaction_date }} </td>
                                        @else
                                            <td> {{ $bill_pay->memo_date }}</td>
                                        @endif

                                        @if ($bill_pay->billing_particulars = $bill_pay->billing_particulars)
                                            <td> {{ $bill_pay->billing_particulars }} </td>
                                        @elseif ($bill_pay->payment_particulars = $bill_pay->payment_particulars)
                                            <td> {{ $bill_pay->payment_particulars }} </td>
                                        @else
                                            <td> {{ $bill_pay->memo_particulars }}</td>
                                        @endif


                                        @if ($bill_pay->billing_amt = $bill_pay->billing_amt)
                                            <td></td>
                                            <td> {{ $bill_pay->billing_amt }} </td>
                                        @elseif ($bill_pay->payment_amt = $bill_pay->payment_amt)
                                            <td> {{ $bill_pay->payment_amt }} </td>
                                            <td></td>
                                        @else
                                            @if ($bill_pay->memo_type == 'Debit')
                                                <td> {{ $bill_pay->memo_amt }} </td>
                                                <td></td>
                                            @else
                                                <td></td>
                                                <td> {{ $bill_pay->memo_amt }} </td>
                                            @endif
                                        @endif

                                        <td>{{ $bal }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" style="padding: 10px 0 10px 0"></td>
                                </tr>
                                <tr>

                                    <td colspan="2"></td>
                                    <td><strong>Balance</strong></td>
                                    <td><strong>{{ $balance }}</strong></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="footer">
                    <div class="signature">
                        <p>Signature Over Printed Name of Accountant</p>
                    </div>
                </div> -->
                <footer>
                    <h3>--- This is a system generated report ---</h3>
                </footer>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
        integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function generatepdf() {
            var element = document.getElementById('container');
            var opt = {
                margin: 0,
                filename: 'SOA - {{$students->last_name }}, {{ $students->first_name }} {{ $students->middle_name }} {{ $students->extension }}',
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
