<div class="col-md-12">
    <div class="card card-custom mt-7">
        <div class="card-header">
            <div class="card-title">
                Subject Enrollment
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <label for="student_id" class="form-label fw-bold text-black">Students</label>
                    <select class="form-control" name="student_id" id="student_id"
                        wire:model='student_id'>
                        <option value="">Select a student</option>
                        @foreach ($students as $key => $student)
                            <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('section')
                        <div class="text-info">{{ $message }}</div>
                    @enderror
                    @error('schedule')
                        <div class="text-info">{{ $message }}</div>
                    @enderror
                    @error('subject')
                        <div class="text-info">{{ $message }}</div>
                    @enderror
            </div>
            <div class="row justify-content-center my-3">
                <button class="btn btn-primary {{ $hasError ? 'pe-none' : '' }}" onclick="generatePDF()" wire:click='save' {{ $hasError ? 'disabled' : '' }}>
                    <i class="fa-solid fa-file-arrow-down"></i>
                    Download PDF
                </button>
            </div>
            <div id="wrapper" class="border p-3">
                <div class="row flex-column text-center mb-5">
                    <div class="d-flex justify-content-center  align-items-center ">
                        <div class="mb-auto mt-3 mr-2">
                            <img src="{{ asset('media/logos/capellan_logo.png') }}" alt="logo" class="img-fluid"
                                loading="lazy" style="width: 100px; height: 100px;">
                        </div>
                        <div class="ms-1 me-5 mt-5">
                            <h4 class="fw-bold">CAPELLAN INSTITUTE OF TECHNOLOGY</h4>
                            <h6 class="mb-4 text-center">San Pablo City Branch</h6>
                            <h4 class="fw-bold mb-3">
                                {{ empty($specialization->strand->strand) ? '' : $specialization->strand->strand }}</h4>
                            <h4 class="fw-bold">
                                {{ empty($specialization->specialization) ? '' : $specialization->specialization }}</h4>
                            <h6 class="mb-4">
                                {{ empty($gradeLevel->grade_level) ? '' : $gradeLevel->grade_level }} -
                                {{ empty($semester) ? '' : $semester }}</h6>
                            <h4 class="my-4" id="filename">{{ empty($selected_student->full_name) ? '' : $selected_student->full_name }}</h4>
                        </div>
                    </div>
                </div>
                <!-- Table with stripped rows -->
                <table class="table table-bordered mb-3">
                    <thead>
                        <tr class="bg-orange">
                            <th scope="col" class="text-center">Core Subjects</th>
                            <th scope="col" class="text-center">Grade</th>
                            <th scope="col" class="text-center">To be Taken</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($coreSubjects as $coreSubject)
                            <tr>
                                <td>
                                    {{ $coreSubject->code }} -
                                    {{ $coreSubject->name }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td></td>
                                <td>no core subjects</td>
                                <td></td>
                            </tr>
                        @endforelse
                        @if (count($appliedSubjects) != 0)
                            <tr class="bg-orange">
                                <th scope="col" class="text-center">APPLIED & SPECIALIZATION</th>
                                <th></th>
                                <th></th>
                            </tr>
                        @endif
                        @forelse ($appliedSubjects as $appliedSubject)
                            <tr>
                                <td>
                                    {{ $appliedSubject->code }} -
                                    {{ $appliedSubject->name }}
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td></td>
                                <td>no applied subjects</td>
                                <td></td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
                <table class="table table-bordered mb-5">
                    <thead>
                        <tr class="bg-orange">
                            <th scope="col" colspan="3" class="text-center">Section
                                {{ empty($section->section) ? '' : $section->section }}
                            </th>
                        </tr>
                        <tr class="bg-orange">
                            <th scope="col" class="text-center">Teacher</th>
                            <th scope="col" class="text-center">Subject</th>
                            <th scope="col" class="text-center">Day and Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->teacher->name }}</td>
                                <td>{{ $schedule->subject->name }}</td>
                                <td>
                                    <span>
                                        @foreach ($schedule->days as $day)
                                            {{ $day }},
                                            @if ($loop->last)
                                                {{ $day }}
                                            @endif
                                        @endforeach
                                    </span><br>
                                    <span>At {{ date('h:i A', strtotime($schedule->start_time)) }} -
                                        {{ date('h:i A', strtotime($schedule->end_time)) }}</span>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td></td>
                                <td>no schedules</td>
                                <td></td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
                <!-- End Table with stripped rows -->
                <div class="d-flex justify-content-between mt-5 pt-5">
                    <div class="mt-5">
                        <h5 class="pt-3 text-center" style="border-top: 2px #000 solid ">Signature over printed
                            name (Registrar)</h5>
                    </div>
                    <div class="mt-5">
                        <h5 class="pt-3 text-center" style="border-top: 2px #000 solid ">Signature over printed
                            name (Student)</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        function generatePDF() {
            var element = document.getElementById('wrapper');
            var filenameElement = document.getElementById('filename');
            var filename = filenameElement.textContent.trim(); // Get the text content of the filename element
            var opt = {
                margin: 0,
                filename: filename + '.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };
            html2pdf().set(opt).from(element).save();
        };
    </script>
@endpush
