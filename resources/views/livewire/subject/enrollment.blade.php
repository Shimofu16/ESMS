<div class="col-md-12">
    <div class="card card-custom mt-7">
        <div class="card-header">
            <div class="card-title">
                Subject Enrollment
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                @if (session()->has('error'))
                    <div class="col-12">
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="student_id" class="form-label fw-bold text-black">Students</label>
                    <input list="students" type="text" name="student_id" id="student_id" class="form-control"
                        wire:model.lazy='student_id' autofocus required>
                    <datalist id="students">
                        @foreach ($students as $student)
                            <option wire:key="{{ $student->id }}" value="{{ $student->std_num }}">
                                {{ $student->full_name }}
                            </option>
                        @endforeach
                    </datalist>
                </div>
                <div class="col-6">
                    @if (!$isRegular)
                        <label for="subject_id" class="form-label fw-bold text-black">Subjects</label>
                        <select name="subject_id" id="subject_id" wire:model.live='subject_id' class="form-control  p-0"
                            required>
                            @if ($student_id)
                                <option value="">Select subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}"
                                        @if (old('subject_id') == $subject->id) selected @endif>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            @else
                                <option value="">Select student First</option>
                            @endif
                        </select>
                    @endif
                </div>
            </div>
            <div class="row justify-content-center my-3">
                <button class="btn btn-primary {{ session()->has('error') ? 'pe-none' : '' }}" wire:click="generatePDF"
                    {{ session()->has('error') ? 'disabled' : '' }}>
                    <i class="fa-solid fa-file-arrow-down"></i>
                    Download PDF
                </button>
            </div>
            <div class="border p-3">
                <div id="wrapper">
                    <div class="row flex-column text-center mb-3">
                        <div class="d-flex justify-content-between mb-3 px-4">
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Student Number: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $student_number }}
                                </h1>

                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    LRN.: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $student_lrn }}
                                </h1>

                            </div>
                        </div>
                        <div class="d-flex justify-content-between  align-items-center ">
                            <div class="div"></div>
                            <div class="div d-flex">
                                <div class="mb-auto mr-2">
                                    <img src="{{ asset('media/logos/capellan_logo.png') }}" alt="logo"
                                        class="img-fluid" loading="lazy" style="width: 65px; height: 65px;">
                                </div>
                                <div>
                                    <h1 class="title bold mt-3">
                                        CAPELLAN INTITUTE OF TECHNOLOGY
                                    </h1>
                                    <h1 class="sub-title mt-2">
                                        Pasig City / San Pablo City
                                    </h1>
                                    <h1 class="sub-title mt-2">
                                        Tel. (02) 8641-5648 / (049) 501-1468
                                    </h1>
                                    <h1 class="sub-title mt-2 bold">
                                        (CERTIFICATE OF MATRICULATION)
                                    </h1>
                                </div>
                            </div>
                            <div class="div">
                                <img src="{{ asset($image) }}" alt="Student Photo" class="img-fluid" loading="lazy"
                                    style="width: 96px; height: 96px;">
                            </div>

                        </div>
                        <div class="d-flex justify-content-between mb-3 px-4">
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Name: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $name }}
                                </h1>

                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Strand: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $strand }}
                                </h1>

                            </div>

                        </div>
                        <div class="d-flex justify-content-between mb-3 px-4">
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Program: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $program }}
                                </h1>
                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    School Year: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $school_year['school_year'] }}
                                </h1>

                            </div>

                        </div>
                        <div class="d-flex justify-content-between mb-3 px-4">

                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Grade Level: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $grade_level }}
                                </h1>

                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Semester: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    @if ($semester)
                                        {{ $semester }}{{ $semester == 1 ? 'st' : 'nd' }}
                                    @endif
                                </h1>

                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Date Enrolled: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    @if ($date_enrolled)
                                        {{ date('M d, Y', strtotime($date_enrolled)) }}
                                    @endif
                                </h1>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-3 px-4">
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Total Amount of Tuition Fee: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ number_format($total_tuition_fee, 2) }}
                                </h1>

                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Others: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ number_format($total_other_fees, 2) }}
                                </h1>

                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Total: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ number_format($total, 2) }}
                                </h1>
                            </div>
                        </div>
                    </div>
                    <!-- Table with stripped rows -->
                    <table class="table table-bordered mb-1">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center label-title">O.R NO.</th>
                                <th scope="col" class="text-center label-title">PARTICULARS</th>
                                <th scope="col" class="text-center label-title">AMOUNT</th>
                                <th scope="col" class="text-center label-title">BALANCE</th>
                                <th scope="col" class="text-center label-title">DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <td> &nbsp;</td>
                                    <td>
                                        <span class="label-title">
                                            {{ $transaction->fee->name }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="label-title">
                                            @if (checkIfStudentHasBalance($transaction))
                                                {{ number_format(getTotalAmountPayed($transaction)['total_amount'], 2) }}
                                            @else
                                                {{ number_format($transaction->amount, 2) }}
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span class="label-title">
                                            @if (checkIfStudentHasBalance($transaction))
                                                {{ number_format(getLatestBalance($transaction)->balance, 2) }}
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span class="label-title">
                                            @if (checkIfStudentHasBalance($transaction))
                                                {{ date('M d, Y', strtotime(getLatestBalance($transaction)->created_at)) }}
                                            @else
                                                {{ date('M d, Y', strtotime($transaction->created_at)) }}
                                            @endif
                                        </span>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5" class="text-center"> Select student to view transactions</td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                    <div class="row flex-column text-center">
                        <div class="d-flex justify-content-between px-4">
                            <div class="d-flex">
                                <h1 class="label-title bold my-3">
                                    Cashier's Copy
                                </h1>
                            </div>
                            <div class="d-flex">
                            </div>
                        </div>
                    </div>
                    <div class="bb-dashed mb-5" id="page2"></div>
                    {{-- <div class=" mb-5" id="page2"></div> --}}
                    <div class="row flex-column text-center mb-3">
                        <div class="d-flex justify-content-between mb-3 px-4">
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Student Number: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $student_number }}
                                </h1>

                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    LRN.: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $student_lrn }}
                                </h1>

                            </div>
                        </div>
                        <div class="d-flex justify-content-center  align-items-center ">
                            <div class="mb-auto mr-2">
                                <img src="{{ asset('media/logos/capellan_logo.png') }}" alt="logo"
                                    class="img-fluid" loading="lazy" style="width: 65px; height: 65px;">
                            </div>
                            <div>
                                <h1 class="title bold mt-3">
                                    CAPELLAN INTITUTE OF TECHNOLOGY
                                </h1>
                                <h1 class="sub-title mt-2">
                                    Pasig City / San Pablo City
                                </h1>
                                <h1 class="sub-title mt-2">
                                    Tel. (02) 8641-5648 / (049) 501-1468
                                </h1>
                                <h1 class="sub-title mt-2 bold">
                                    (CERTIFICATE OF ENROLLMENT)
                                </h1>
                            </div>

                        </div>
                        <div class="d-flex justify-content-between mb-3 px-4">
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Name: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $name }}
                                </h1>

                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Strand: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $strand }}
                                </h1>

                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-3 px-4">
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Program: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $program }}
                                </h1>
                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    School Year: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $school_year['school_year'] }}
                                </h1>

                            </div>

                        </div>
                        <div class="d-flex justify-content-between mb-3 px-4">

                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Grade Level: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    {{ $grade_level }}
                                </h1>

                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Semester: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    @if ($semester)
                                        {{ $semester }}{{ $semester == 1 ? 'st' : 'nd' }}
                                    @endif
                                </h1>

                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Date Enrolled: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    @if ($date_enrolled)
                                        {{ date('M d, Y', strtotime($date_enrolled)) }}
                                    @endif
                                </h1>
                            </div>
                        </div>
                    </div>
                    <!-- Table with stripped rows -->
                    <table class="table table-bordered mb-1">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center label-title">SUBJECTS</th>
                                <th scope="col" class="text-center label-title">TIME</th>
                                <th scope="col" class="text-center label-title">DAY</th>
                                <th scope="col" class="text-center label-title">ROOM</th>
                                <th scope="col" class="text-center label-title">TEACHER</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schedules as $schedule)
                                <tr>
                                    <td>
                                        <span class="label-title">
                                            {{ $schedule->subject->name }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="label-title">
                                            {{ date('H:i A', strtotime($schedule->start_time)) }} -
                                            {{ date('H:i A', strtotime($schedule->end_time)) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="label-title">
                                            @foreach ($schedule->days as $day)
                                                {{ Str::ucfirst(toShort($day, 3)) }}{{ !$loop->last ? ',' : '' }}
                                            @endforeach
                                        </span>
                                        {{-- @dd($schedule->days) --}}
                                    </td>
                                    <td>
                                        <span class="label-title">
                                            @if ($isRegular)
                                                {{ $schedule->section->section }}
                                            @else
                                                 To Be Announce
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <span class="label-title">
                                            {{ $schedule->teacher->full_name }}
                                        </span>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5" class="text-center"> Select student to view schedules</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="row flex-column text-center">
                        <div class="d-flex justify-content-between px-4">
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Old/New: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </h1>

                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    In Charge of Enrollment: &nbsp;
                                </h1>
                                <h1 class="label-title  mt-3 bb-1">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="row flex-column text-center">
                        <div class="d-flex justify-content-between px-4">
                            <div class="d-flex">
                                <h1 class="label-title bold mt-3">
                                    Approved By: &nbsp;
                                </h1>

                            </div>
                        </div>
                    </div>
                    <div class="row flex-column text-center mt-2">
                        <div class="d-flex justify-content-between px-4">
                            <div class="d-flex">
                                <h1 class="label-title bold bt-1">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Technical Director &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </h1>
                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold bt-1">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registrar
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </h1>
                            </div>
                            <div class="d-flex">
                                <h1 class="label-title bold bt-1">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Student`s Signature
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        window.addEventListener('generatePDF', event => {

            // Define the JavaScript function with a filename parameter
            console.log('print');
            var element = document.getElementById('wrapper');
            var opt = {
                // pagebreak: { mode: 'avoid-all', before: '#page2' },
                margin: .2,
                filename: event.detail.filename + '.pdf',
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
            // console.log( html2pdf().set(opt).from(element).save());
        })
    </script>
@endpush
