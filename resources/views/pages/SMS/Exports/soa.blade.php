<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        tr.bg-template th {
            background-color: black;
            color: white;
        }

        table {
            font-size: 14px;
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
            padding: 0px 8px;
            font-size: 14px;
            font-family: Calibri !important;
            font-weight: 700 !important;
        }

        .bold {
            font-weight: 700 !important;
        }

        .bb-1 {
            border-bottom: 1px solid black;
        }

        .bt-1 {
            border-top: 1px solid black;
        }

        .bb-blue {
            border-bottom: 1px double blue;
        }

        .title,
        .label-title {}

        .title {
            font-size: 15px !important;
            font-family: Cambria !important;
            color: blue;

        }

        .sub-title {
            font-size: 12px;
            font-family: Calibri !important;
        }

        .label-title {
            font-size: 10px;
            font-family: Calibri !important;
        }
    </style>
</head>

<body>

    <div class="container border">
        <div class="row justify-content-center align-items-center my-5">
            <div class="d-flex flex-column " style="width: 200px">
                <button type="button" class="btn btn-primary mb-1" onclick="generatePDF()">Download</button>
                <a href="{{ route('transaction.index') }}" class="btn btn-outline-secondary">Back to Transactions</a>
            </div>
        </div>
        <div id="wrapper">
            @php
                $count = 1;
            @endphp
            @foreach ($payment_transactions as $payment_transaction)
                @if ($count > 4)
                    @php
                        $count = 1;
                    @endphp
                @endif

                @if ($count == 1 || $count == 3)
                    <div class="row">
                @endif

                <div class="col-md-6 {{ $count == 1 || $count == 2 ? 'mb-5' : '' }}">
                    <!-- Your SOA content goes here -->
                    <div class="d-flex justify-content-center align-items-center bb-blue px-auto">
                        <img src="{{ asset('media/logos/capellan_logo.png') }}" alt="logo" class="img-fluid"
                            loading="lazy" style="width: 25px; height: 25px;">
                        <h1 class="title bold mb-0 ms-2">
                            CAPELLAN INTITUTE OF TECHNOLOGY
                        </h1>
                    </div>
                    <h1 class="sub-title bold my-2 text-center">
                        STATEMENT OF ACCOUNTS
                    </h1>
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="d-flex">
                            <h1 class="label-title bold">
                                Name: &nbsp;
                            </h1>
                            <h1 class="sub-title  bb-1">
                                <strong>
                                    {{ Str::upper($payment_transaction->student->full_name_family_name_first) }}
                                </strong>
                            </h1>
                        </div>
                        <div class="d-flex">
                            <h1 class="label-title bold">
                                Grade Level: &nbsp;
                            </h1>
                            <h1 class="sub-title  bb-1">
                                <strong>
                                    {{ $payment_transaction->student->enrollment->gradeLevel_id == 1 ? '11' : '12' }}
                                </strong>
                            </h1>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="d-flex">
                            <h1 class="label-title bold">
                                Track/Strand: &nbsp;
                            </h1>
                            <h1 class="sub-title  bb-1">
                                <strong>
                                    {{ Str::upper($payment_transaction->student->enrollment->specialization->strand->track->track) }}
                                </strong>
                            </h1>
                        </div>
                        <div class="d-flex">
                            <h1 class="label-title bold">
                                LRN: &nbsp;
                            </h1>
                            <h1 class="sub-title  bb-1">
                                <strong>
                                    {{ Str::upper($payment_transaction->student->lrn) }}
                                </strong>
                            </h1>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="d-flex">
                            <h1 class="label-title bold">
                                Section: &nbsp;
                            </h1>
                            <h1 class="sub-title  bb-1">
                                <strong>
                                    {{ $payment_transaction->student->enrollment->section->section ? Str::upper($payment_transaction->student->enrollment->section->section) : 'No Section' }}
                                </strong>
                            </h1>
                        </div>
                        <div class="d-flex">
                            <h1 class="label-title bold">
                                Student #: &nbsp;
                            </h1>
                            <h1 class="sub-title  bb-1">
                                <strong>
                                    {{ Str::upper($payment_transaction->student->std_num) }}
                                </strong>
                            </h1>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="d-flex">
                            <h1 class="label-title bold">
                                Classification: &nbsp;
                            </h1>
                            <h1 class="sub-title  bb-1">
                                <strong>
                                    VPR
                                </strong>
                            </h1>
                        </div>
                        <div class="d-flex">
                            <h1 class="label-title bold">
                                Tuition Fee: &nbsp;
                            </h1>
                            <h1 class="sub-title  bb-1">
                                <strong>
                                    {{ number_format($payment_transaction->student->getTransactionFeeValueBy($payment_transaction->id, 'tuition')) }}
                                </strong>
                            </h1>
                        </div>
                    </div>
                    <table class="table table-bordered mb-2 pb-0">
                        <thead>
                            <tr>
                                <th scope="col" colspan="4" class="text-center bg-dark text-white">TUITION FEES
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="text-center">Monthly</th>
                                <th scope="col" class="text-center">Date</th>
                                <th scope="col" class="text-center">Amount</th>
                                <th scope="col" class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $transaction = $payment_transaction->transactions()->where('type', 'tuition')->first();
                                if (checkIfStudentHasBalance($transaction)) {
                                    $first_month = getFirstBalance($transaction, 'created_at');
                                } else {
                                    $first_month = $transaction->created_at;
                                }
                                $second_month = $first_month->addMonths(1);
                                $third_month = $first_month->addMonths(2);
                                $fourth_month = $first_month->addMonths(3);
                                $fifth_month = $first_month->addMonths(4);

                            @endphp
                            {{-- @dd(getBalanceByDate($transaction, getFirstBalance($transaction, 'created_at')->format('Y-m-d'), 'amount'), $transaction->created_at->addMonths(1), $first_month) --}}
                            <tr>
                                <td class="text-center">1<sup>st</sup></td>
                                <td class="text-center">
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ date('M d, Y', strtotime(getFirstBalance($transaction, 'created_at'))) }}
                                    @else
                                        {{ date('M d, Y', strtotime($transaction->created_at)) }}
                                    @endif
                                </td>
                                <td class="text-center">

                                    {{-- {{ getBalanceByDate($transaction, $first_month->format('Y-m-d'), 'amount') }} --}}
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ getBalanceByDate($transaction, getFirstBalance($transaction, 'created_at')->format('Y-m-d'), 'amount') }}
                                    @else
                                        {{ getBalanceByDate($transaction, $transaction->created_at, 'amount') }}
                                    @endif
                                </td>
                                <td>
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ getBalanceByDate($transaction, getFirstBalance($transaction, 'created_at')->format('Y-m-d'), 'amount') }}
                                    @else
                                        {{ getBalanceByDate($transaction, $transaction->created_at, 'amount') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2<sup>nd</sup></td>
                                <td class="text-center">
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ date('M d, Y', strtotime(getFirstBalance($transaction, 'created_at')->addMonths(1))) }}
                                    @else
                                        {{ date('M d, Y', strtotime($transaction->created_at->addMonths(1))) }}
                                    @endif
                                </td>
                                <td class="text-center">

                                    {{-- {{ getBalanceByDate($transaction, $first_month->format('Y-m-d'), 'amount') }} --}}
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ getBalanceByDate($transaction, getFirstBalance($transaction, 'created_at')->addMonths(1)->format('Y-m-d'), 'amount') }}
                                    @else
                                        {{ getBalanceByDate($transaction, $transaction->created_at->addMonths(1), 'amount') }}
                                    @endif
                                </td>
                                <td>
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ getBalanceByDate($transaction, getFirstBalance($transaction, 'created_at')->addMonths(1)->format('Y-m-d'), 'amount') }}
                                    @else
                                        {{ getBalanceByDate($transaction, $transaction->created_at->addMonths(1), 'amount') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3<sup>rd</sup></td>
                                <td class="text-center">
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ date('M d, Y', strtotime(getFirstBalance($transaction, 'created_at')->addMonths(2))) }}
                                    @else
                                        {{ date('M d, Y', strtotime($transaction->created_at->addMonths(2))) }}
                                    @endif
                                </td>
                                <td class="text-center">

                                    {{-- {{ getBalanceByDate($transaction, $first_month->format('Y-m-d'), 'amount') }} --}}
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ getBalanceByDate($transaction, getFirstBalance($transaction, 'created_at')->addMonths(2)->format('Y-m-d'), 'amount') }}
                                    @else
                                        {{ getBalanceByDate($transaction, $transaction->created_at->addMonths(2), 'amount') }}
                                    @endif
                                </td>
                                <td>
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ getBalanceByDate($transaction, getFirstBalance($transaction, 'created_at')->addMonths(2)->format('Y-m-d'), 'amount') }}
                                    @else
                                        {{ getBalanceByDate($transaction, $transaction->created_at->addMonths(2), 'amount') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4<sup>th</sup></td>
                                <td class="text-center">
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ date('M d, Y', strtotime(getFirstBalance($transaction, 'created_at')->addMonths(3))) }}
                                    @else
                                        {{ date('M d, Y', strtotime($transaction->created_at > addMonths(3))) }}
                                    @endif
                                </td>
                                <td class="text-center">

                                    {{-- {{ getBalanceByDate($transaction, $first_month->format('Y-m-d'), 'amount') }} --}}
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ getBalanceByDate($transaction, getFirstBalance($transaction, 'created_at')->addMonths(3)->format('Y-m-d'), 'amount') }}
                                    @else
                                        {{ getBalanceByDate($transaction, $transaction->created_at > addMonths(3), 'amount') }}
                                    @endif
                                </td>
                                <td>
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ getBalanceByDate($transaction, getFirstBalance($transaction, 'created_at')->addMonths(3)->format('Y-m-d'), 'amount') }}
                                    @else
                                        {{ getBalanceByDate($transaction, $transaction->created_at > addMonths(3), 'amount') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5<sup>th</sup></td>
                                <td class="text-center">
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ date('M d, Y', strtotime(getFirstBalance($transaction, 'created_at')->addMonths(4))) }}
                                    @else
                                        {{ date('M d, Y', strtotime($transaction->created_at->addMonths(4))) }}
                                    @endif
                                </td>
                                <td class="text-center">

                                    {{-- {{ getBalanceByDate($transaction, $first_month->format('Y-m-d'), 'amount') }} --}}
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ getBalanceByDate($transaction, getFirstBalance($transaction, 'created_at')->addMonths(4)->format('Y-m-d'), 'amount') }}
                                    @else
                                        {{ getBalanceByDate($transaction, $transaction->created_at->addMonths(4), 'amount') }}
                                    @endif
                                </td>
                                <td>
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ getBalanceByDate($transaction, getFirstBalance($transaction, 'created_at')->addMonths(4)->format('Y-m-d'), 'amount') }}
                                    @else
                                        {{ getBalanceByDate($transaction, $transaction->created_at->addMonths(4), 'amount') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-center bg-dark text-white">OTHER FEES</td>
                            </tr>
                            @php
                                $total_other_fees = 0;
                            @endphp
                            @forelse ($payment_transaction->transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->fee->name }}</td>
                                    <td class="text-center">
                                        @if (checkIfStudentHasBalance($transaction))
                                            {{ date('M d, Y', strtotime(getLatestBalance($transaction)->created_at)) }}
                                        @else
                                            {{ date('M d, Y', strtotime($transaction->created_at)) }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if (checkIfStudentHasBalance($transaction))
                                            @php
                                                $total_other_fees =
                                                    $total_other_fees +
                                                    getTotalAmountPayed($transaction)['total_amount'];
                                            @endphp
                                            {{ number_format(getTotalAmountPayed($transaction)['total_amount']) }}
                                        @else
                                            {{ number_format($transaction->amount) }}
                                            @php
                                                $total_other_fees = $total_other_fees + $transaction->amount;
                                            @endphp
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        &nbsp;
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Transactions</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                    <div class="p-2 d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="border p-2 d-flex justify-content-center align-items-center flex-column mb-2">
                                <span class="sub-title">
                                    <strong>Due date of Payment:</strong>
                                </span>
                                <span class="sub-title">
                                    <strong>
                                        @if (checkIfStudentHasBalance($transaction))
                                            {{ date('M d, Y', strtotime(getFirstBalance($transaction, 'created_at')->addMonth())) }}
                                        @else
                                            {{ date('M d, Y', strtotime($transaction->created_at->addMonth())) }}
                                        @endif
                                    </strong>
                                </span>
                            </div>
                            <div class="border p-2 d-flex justify-content-center align-items-center flex-column w-100">
                                <span class="sub-title">
                                    <strong>Cut off for Permit:</strong>
                                </span>
                                <span class="sub-title">
                                    <strong>
                                        @if (checkIfStudentHasBalance($transaction))
                                            {{ date('M d, Y', strtotime(getFirstBalance($transaction, 'created_at')->addMonths(4))) }}
                                        @else
                                            {{ date('M d, Y', strtotime($transaction->created_at->addMonths(4))) }}
                                        @endif
                                    </strong>
                                </span>
                            </div>
                        </div>
                        @php
                            $total = 0;
                            $total_tuition_fees = 0;
                        @endphp
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="p-2 d-flex justify-content-center align-items-center flex-column">
                                <span class="sub-title">
                                    <strong>Tuition Fees:</strong>
                                    <strong class="border-bottom border-dark"> &nbsp;&nbsp;
                                        @if (checkIfStudentHasBalance($transaction))
                                            @php
                                                $total_tuition_fees = getBalanceByDate(
                                                    $transaction,
                                                    getFirstBalance($transaction, 'created_at')->format('Y-m-d'),
                                                    'amount',
                                                ) +
                                                getBalanceByDate(
                                                    $transaction,
                                                    getFirstBalance($transaction, 'created_at')->addMonths(1)->format('Y-m-d'),
                                                    'amount',
                                                ) +
                                                getBalanceByDate(
                                                    $transaction,
                                                    getFirstBalance($transaction, 'created_at')->addMonths(2)->format('Y-m-d'),
                                                    'amount',
                                                ) +
                                                getBalanceByDate(
                                                    $transaction,
                                                    getFirstBalance($transaction, 'created_at')->addMonths(3)->format('Y-m-d'),
                                                    'amount',
                                                ) +
                                                getBalanceByDate(
                                                    $transaction,
                                                    getFirstBalance($transaction, 'created_at')->addMonths(4)->format('Y-m-d'),
                                                    'amount',
                                                )
                                                ;
                                            @endphp
                                            {{ number_format(getBalanceByDate($transaction, getFirstBalance($transaction, 'created_at')->format('Y-m-d'), 'amount')) }}
                                        @else
                                            @php
                                                $total_tuition_fees =
                                                    getBalanceByDate($transaction, $transaction->created_at, 'amount') +
                                                    getBalanceByDate(
                                                        $transaction,
                                                        $transaction->created_at->addMonths(1),
                                                        'amount',
                                                    ) +
                                                    getBalanceByDate(
                                                        $transaction,
                                                        $transaction->created_at->addMonths(2),
                                                        'amount',
                                                    ) +
                                                    getBalanceByDate(
                                                        $transaction,
                                                        $transaction->created_at->addMonths(3),
                                                        'amount',
                                                    ) +
                                                    getBalanceByDate(
                                                        $transaction,
                                                        $transaction->created_at->addMonths(4),
                                                        'amount',
                                                    );
                                            @endphp
                                            {{ number_format(getBalanceByDate($transaction, $transaction->created_at, 'amount')) }}
                                        @endif
                                        &nbsp;&nbsp;
                                    </strong>
                                </span>

                            </div>
                            <div class="p-2 d-flex justify-content-center align-items-center flex-column">
                                <span class="sub-title">
                                    <strong>Other Fees:</strong>
                                    <strong class="border-bottom border-dark"> &nbsp;&nbsp;
                                        {{ number_format($total_other_fees) }}
                                        &nbsp;&nbsp;
                                    </strong>
                                </span>

                            </div>
                            @php
                                $total = $total_tuition_fees + $total_other_fees;
                            @endphp
                            <div class="p-2 d-flex justify-content-center align-items-center flex-column">
                                <span class="sub-title">
                                    <strong>Total:</strong>
                                    <strong class="border-bottom border-dark"> &nbsp;&nbsp;
                                        {{ number_format($total) }}
                                        &nbsp;&nbsp;
                                    </strong>
                                </span>

                            </div>

                        </div>

                    </div>
                    <div class="p-2 d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                            <span class="sub-title bold border-bottom border-dark text-center">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MR. ABELARDO R. LANDICHO JR
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </span>
                            <h1 class="label-title bold text-center">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Assistant Technical Director
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </h1>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="sub-title bold border-bottom border-dark text-center">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MRS. GINNA C. SALAZAR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </span>
                            <h1 class="label-title bold text-center">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cashier &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </h1>
                        </div>
                    </div>

                    <!-- Add more details as needed -->
                </div>

                @if ($count == 2 || $count == 3 || $loop->last)
        </div> <!-- Close the row after 2 SOAs or on the last transaction -->
        @endif

        @if ($count == 4)
            <div class="page-break"></div> <!-- Page break for printing -->
        @endif

        @php
            $count++;
        @endphp
        @endforeach
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"
        integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        function generatePDF() {
            // Define the JavaScript function with a filename parameter
            console.log('print');
            var element = document.getElementById('wrapper');
            var opt = {
                pagebreak: {
                    mode: 'avoid-all',
                    before: '.page-break'
                },
                margin: .2,
                filename: 'SOA.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 1
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };
            console.log(element);
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>

</html>
