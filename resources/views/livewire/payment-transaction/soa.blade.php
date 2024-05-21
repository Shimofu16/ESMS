<div class="container border">
    <div class="d-flex justify-content-center align-items-center my-5 ">
        <div class="card" style="width: 400px">
            @if (session()->has('error'))
                <div class="card-header">
                    <div class="col-12">
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="card-body">
                <div class="d-flex flex-column">
                    <div class="col-12">
                        <label for="grade_level_id" class="form-label fw-bold text-black">Grade Level</label>
                        <select name="grade_level_id" id="grade_level_id" wire:model.live='grade_level_id'
                            class="form-control">
                            <option value="">Select Grade Level</option>
                            @foreach ($grade_levels as $grade_level)
                                <option value="{{ $grade_level->id }}"
                                    @if (old('grade_level_id') == $grade_level->id) selected @endif>
                                    {{ $grade_level->grade_level }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-12">
                        <label for="section_id" class="form-label fw-bold text-black">Section</label>
                        <select name="section_id" id="section_id" wire:model='section_id' class="form-control">
                            <option value="">Select section</option>
                            @forelse ($sections as $section)
                                <option value="{{ $section->id }}" @if (old('section_id') == $section->id) selected @endif>
                                    {{ $section->section }}
                                </option>
                            @empty
                                <option value="" selected>
                                    Select Grade Level First.
                                </option>
                            @endforelse
                        </select>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex flex-column">
                    <button type="button" class="btn btn-primary mb-1" onclick="generatePDF()">Download</button>
                    <a href="{{ route('transaction.index') }}" class="btn btn-outline-secondary">Back to
                        Transactions</a>
                </div>
            </div>
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
                            $transaction_tuition = $payment_transaction->transactions()->where('type', 'tuition')->first();
                            if (checkIfStudentHasBalance($transaction_tuition)) {
                                $first_month = getFirstBalance($transaction_tuition, 'created_at');
                            } else {
                                $first_month = $transaction_tuition->created_at;
                            }
                            $second_month = $first_month->addMonths(1);
                            $third_month = $first_month->addMonths(2);
                            $fourth_month = $first_month->addMonths(3);
                            $fifth_month = $first_month->addMonths(4);

                        @endphp
                        {{-- @dd(
                            $first_month,
                            $second_month,
                            $third_month,
                            $fourth_month,
                            $fifth_month,
                        ) --}}
                        <tr>
                            <td class="text-center">1<sup>st</sup></td>
                            <td class="text-center">
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ date('M d, Y', strtotime(getFirstBalance($transaction_tuition, 'created_at'))) }}
                                @else
                                    {{ date('M d, Y', strtotime($transaction_tuition->created_at)) }}
                                @endif
                            </td>
                            <td class="text-center">

                                {{-- {{ getBalanceByDate($transaction_tuition, $first_month->format('Y-m-d'), 'amount') }} --}}
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ getBalanceByDate($transaction_tuition, getFirstBalance($transaction_tuition, 'created_at')->format('Y-m-d'), 'amount') }}
                                @else
                                    {{ getBalanceByDate($transaction_tuition, $transaction_tuition->created_at, 'amount') }}
                                @endif
                            </td>
                            <td>
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ getBalanceByDate($transaction_tuition, getFirstBalance($transaction_tuition, 'created_at')->format('Y-m-d'), 'amount') }}
                                @else
                                    {{ getBalanceByDate($transaction_tuition, $transaction_tuition->created_at, 'amount') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2<sup>nd</sup></td>
                            <td class="text-center">
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ date('M d, Y', strtotime(getFirstBalance($transaction_tuition, 'created_at')->addMonths(1))) }}
                                @else
                                    {{ date('M d, Y', strtotime($transaction_tuition->created_at->addMonths(1))) }}
                                @endif
                            </td>
                            <td class="text-center">

                                {{-- {{ getBalanceByDate($transaction_tuition, $first_month->format('Y-m-d'), 'amount') }} --}}
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ getBalanceByDate($transaction_tuition, getFirstBalance($transaction_tuition, 'created_at')->addMonths(1)->format('Y-m-d'), 'amount') }}
                                @else
                                    {{ getBalanceByDate($transaction_tuition, $transaction_tuition->created_at->addMonths(1), 'amount') }}
                                @endif
                            </td>
                            <td>
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ getBalanceByDate($transaction_tuition, getFirstBalance($transaction_tuition, 'created_at')->addMonths(1)->format('Y-m-d'), 'amount') }}
                                @else
                                    {{ getBalanceByDate($transaction_tuition, $transaction_tuition->created_at->addMonths(1), 'amount') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3<sup>rd</sup></td>
                            <td class="text-center">
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ date('M d, Y', strtotime(getFirstBalance($transaction_tuition, 'created_at')->addMonths(2))) }}
                                @else
                                    {{ date('M d, Y', strtotime($transaction_tuition->created_at->addMonths(2))) }}
                                @endif
                            </td>
                            <td class="text-center">

                                {{-- {{ getBalanceByDate($transaction_tuition, $first_month->format('Y-m-d'), 'amount') }} --}}
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ getBalanceByDate($transaction_tuition, getFirstBalance($transaction_tuition, 'created_at')->addMonths(2)->format('Y-m-d'), 'amount') }}
                                @else
                                    {{ getBalanceByDate($transaction_tuition, $transaction_tuition->created_at->addMonths(2), 'amount') }}
                                @endif
                            </td>
                            <td>
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ getBalanceByDate($transaction_tuition, getFirstBalance($transaction_tuition, 'created_at')->addMonths(2)->format('Y-m-d'), 'amount') }}
                                @else
                                    {{ getBalanceByDate($transaction_tuition, $transaction_tuition->created_at->addMonths(2), 'amount') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4<sup>th</sup></td>
                            <td class="text-center">
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ date('M d, Y', strtotime(getFirstBalance($transaction_tuition, 'created_at')->addMonths(3))) }}
                                @else
                                    {{ date('M d, Y', strtotime($transaction_tuition->created_at->addMonths(3))) }}
                                @endif
                            </td>
                            <td class="text-center">

                                {{-- {{ getBalanceByDate($transaction_tuition, $first_month->format('Y-m-d'), 'amount') }} --}}
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ getBalanceByDate($transaction_tuition, getFirstBalance($transaction_tuition, 'created_at')->addMonths(3)->format('Y-m-d'), 'amount') }}
                                @else
                                    {{ getBalanceByDate($transaction_tuition, $transaction_tuition->created_at->addMonths(3), 'amount') }}
                                @endif
                            </td>
                            <td>
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ getBalanceByDate($transaction_tuition, getFirstBalance($transaction_tuition, 'created_at')->addMonths(3)->format('Y-m-d'), 'amount') }}
                                @else
                                    {{ getBalanceByDate($transaction_tuition, $transaction_tuition->created_at->addMonths(3), 'amount') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5<sup>th</sup></td>
                            <td class="text-center">
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ date('M d, Y', strtotime(getFirstBalance($transaction_tuition, 'created_at')->addMonths(4))) }}
                                @else
                                    {{ date('M d, Y', strtotime($transaction_tuition->created_at->addMonths(4))) }}
                                @endif
                            </td>
                            <td class="text-center">

                                {{-- {{ getBalanceByDate($transaction_tuition, $first_month->format('Y-m-d'), 'amount') }} --}}
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ getBalanceByDate($transaction_tuition, getFirstBalance($transaction_tuition, 'created_at')->addMonths(4)->format('Y-m-d'), 'amount') }}
                                @else
                                    {{ getBalanceByDate($transaction_tuition, $transaction_tuition->created_at->addMonths(4), 'amount') }}
                                @endif
                            </td>
                            <td>
                                @if (checkIfStudentHasBalance($transaction_tuition))
                                    {{ getBalanceByDate($transaction_tuition, getFirstBalance($transaction_tuition, 'created_at')->addMonths(4)->format('Y-m-d'), 'amount') }}
                                @else
                                    {{ getBalanceByDate($transaction_tuition, $transaction_tuition->created_at->addMonths(4), 'amount') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-center bg-dark text-white">OTHER FEES</td>
                        </tr>
                        @php
                            $total_other_fees = 0;
                        @endphp
                        @forelse ($payment_transaction->transactions()->where('type', '!=', 'tuition')->get() as $transaction)
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
                                                $total_other_fees + getTotalAmountPayed($transaction)['total_amount'];
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
                                    @if (checkIfStudentHasBalance($transaction))
                                        {{ number_format(getTotalAmountPayed($transaction)['total_amount']) }}
                                    @else
                                        {{ number_format($transaction->amount) }}
                                    @endif
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
                                    @if (checkIfStudentHasBalance($transaction_tuition))
                                        {{ date('M d, Y', strtotime(getFirstBalance($transaction_tuition, 'created_at')->addMonth())) }}
                                    @else
                                        {{ date('M d, Y', strtotime($transaction_tuition->created_at->addMonth())) }}
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
                                    @if (checkIfStudentHasBalance($transaction_tuition))
                                        {{ date('M d, Y', strtotime(getFirstBalance($transaction_tuition, 'created_at')->addMonths(4))) }}
                                    @else
                                        {{ date('M d, Y', strtotime($transaction_tuition->created_at->addMonths(4))) }}
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
                                        @php

                                            if (checkIfStudentHasBalance($transaction_tuition)) {
                                                $total_tuition_fees =
                                                    getBalanceByDate(
                                                        $transaction_tuition,
                                                        getFirstBalance($transaction_tuition, 'created_at')->format('Y-m-d'),
                                                        'amount',
                                                    ) +
                                                    getBalanceByDate(
                                                        $transaction_tuition,
                                                        getFirstBalance($transaction_tuition, 'created_at')
                                                            ->addMonths(1)
                                                            ->format('Y-m-d'),
                                                        'amount',
                                                    ) +
                                                    getBalanceByDate(
                                                        $transaction_tuition,
                                                        getFirstBalance($transaction_tuition, 'created_at')
                                                            ->addMonths(2)
                                                            ->format('Y-m-d'),
                                                        'amount',
                                                    ) +
                                                    getBalanceByDate(
                                                        $transaction_tuition,
                                                        getFirstBalance($transaction_tuition, 'created_at')
                                                            ->addMonths(3)
                                                            ->format('Y-m-d'),
                                                        'amount',
                                                    ) +
                                                    getBalanceByDate(
                                                        $transaction_tuition,
                                                        getFirstBalance($transaction_tuition, 'created_at')
                                                            ->addMonths(4)
                                                            ->format('Y-m-d'),
                                                        'amount',
                                                    );
                                                getBalanceByDate(
                                                    $transaction_tuition,
                                                    getFirstBalance($transaction_tuition, 'created_at')->format('Y-m-d'),
                                                    'amount',
                                                );
                                            } else {
                                                $total_tuition_fees =
                                                    getBalanceByDate(
                                                        $transaction_tuition,
                                                        $transaction_tuition->created_at->format('Y-m-d'),
                                                        'amount',
                                                    ) +
                                                    getBalanceByDate(
                                                        $transaction_tuition,
                                                        $transaction_tuition->created_at->addMonths(1)->format('Y-m-d'),
                                                        'amount',
                                                    ) +
                                                    getBalanceByDate(
                                                        $transaction_tuition,
                                                        $transaction_tuition->created_at->addMonths(2)->format('Y-m-d'),
                                                        'amount',
                                                    ) +
                                                    getBalanceByDate(
                                                        $transaction_tuition,
                                                        $transaction_tuition->created_at->addMonths(3)->format('Y-m-d'),
                                                        'amount',
                                                    ) +
                                                    getBalanceByDate(
                                                        $transaction_tuition,
                                                        $transaction_tuition->created_at->addMonths(4)->format('Y-m-d'),
                                                        'amount',
                                                    );
                                            }

                                        @endphp
                                        {{ number_format($total_tuition_fees) }}

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
        @php
            $count = 1;
        @endphp
        <div class="page-break"></div> <!-- Page break for printing -->
    @endif

    @php
        $count++;
    @endphp
    @endforeach
</div>
</div>
