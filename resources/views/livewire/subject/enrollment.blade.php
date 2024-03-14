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
                <label for="student_id" class="form-label fw-bold text-black">Students</label>
                <select class="form-control" name="student_id" id="student_id" wire:model='student_id'>
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
                <button class="btn btn-primary {{ session()->has('error') ? 'pe-none' : '' }}" onclick="generatePDF()"
                    wire:click='save' {{ session()->has('error') ? 'disabled' : '' }}>
                    <i class="fa-solid fa-file-arrow-down"></i>
                    Download PDF
                </button>
            </div>
            <div class="border p-3">
                <div id="wrapper">
                    <div class="row flex-column text-center mb-5">
                        <div class="d-flex justify-content-center  align-items-center ">
                            <div class="mb-auto mt-3 mr-2">
                                <img src="{{ asset('media/logos/capellan_logo.png') }}" alt="logo" class="img-fluid"
                                    loading="lazy" style="width: 100px; height: 100px;">
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
    
                        </tbody>
    
                    </table>
    
                </div>
            </div>

        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        function generatePDF() {
            var element = document.getElementById('wrapper');
            // var filenameElement = document.getElementById('filename');
            // var filename = filenameElement.textContent.trim(); // Get the text content of the filename element
            var filename = 'certificate_of_matriculation'; // Get the text content of the filename element
            var opt = {
                margin: .5,
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
