<div class="bg-white shadow-md rounded p-[1rem] mb-4 flex flex-col my-2 mx-2">
    <form wire:submit.prevent="save">
        <div class="head flex justify-between items-center p-2 mb-2  rounded text-white"
            style="background-color: #6C757D;">
            <div class="text-left border rounded p-2 ">
                {{ $current_step }}/{{ $total_step }}
            </div>
            <div class="w-100 text-center">
                <span class="font-bold">{{ $titles[$current_step - 1] }}</span>
            </div>
            <div class="text-left  rounded p-2" style="color: #6C757D;">
                1/5
            </div>
        </div>
        <div class="body w-full">
            <div class="grid sm:grid-cols-4 lg:grid-cols-6  gap-4 sm:gap-3 ">
                @switch($current_step)
                    @case(1)
                        <div class="col-span-2 lg:col-span-3">
                            <label for="student_lrn" class="block text-sm font-medium leading-6 text-gray-900">LRN</label>
                            <div class="mt-2">
                                <input type="number" name="student_lrn" id="student_lrn" wire:model='student_lrn'
                                    class="block w-full @error('student_lrn')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('student_lrn')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror

                        </div>
                        <div class="col-span-2 lg:col-span-3 ">
                            <label for="student_no" class="block text-sm font-medium leading-6 text-gray-900">Student
                                No.</label>
                            <div class="mt-2">
                                <input type="strong" name="student_no" id="student_no" wire:model='student_no'
                                    placeholder="XX-XXXXX"
                                    class="block w-full @error('student_no')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('student_no')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                            <div class="mt-2">
                                <input type="text" name="first_name" id="first_name" wire:model='first_name'
                                    class="block w-full @error('first_name')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('first_name')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3 ">
                            <label for="middle_name" class="block text-sm font-medium leading-6 text-gray-900">Middle
                                name</label>
                            <div class="mt-2">
                                <input type="text" name="middle_name" id="middle_name" wire:model='middle_name'
                                    class="block w-full @error('middle_name')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('middle_name')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3 ">
                            <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                            <div class="mt-2">
                                <input type="text" name="last_name" id="last_name" wire:model='last_name'
                                    class="block w-full @error('last_name')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('last_name')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3 ">
                            <label for="extension_name" class="block text-sm font-medium leading-6 text-gray-900">Extension
                                name</label>
                            <div class="mt-2">
                                <input type="text" name="extension_name" id="extension_name" wire:model='extension_name'
                                    class="block w-full @error('extension_name')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('extension_name')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 ">
                            <label for="civil_status" class="block text-sm font-medium leading-6 text-gray-900">Civil
                                Status</label>
                            <div class="mt-2">
                                <select id="civil_status" wire:model='civil_status'
                                    class="block w-full @error('civil_status')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option selected value="">Choose a Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                </select>
                            </div>
                            @error('civil_status')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 ">
                            <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Gender</label>
                            <div class="mt-2">
                                <select id="gender" wire:model='gender'
                                    class="block w-full @error('gender')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option selected value="">Choose gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            @error('gender')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 ">
                            <label for="birth_date"
                                class="block text-sm font-medium leading-6 text-gray-900">Birthdate</label>
                            <div class="mt-2">
                                <input type="date" name="birth_date" id="birth_date" wire:model='birth_date'
                                    class="block w-full @error('birth_date')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('birth_date')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3 ">
                            <label for="nationality"
                                class="block text-sm font-medium leading-6 text-gray-900">Nationality</label>
                            <div class="mt-2">
                                <input type="text" name="nationality" id="nationality" wire:model='nationality'
                                    class="block w-full @error('nationality')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('nationality')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3 ">
                            <label for="contact_no" class="block text-sm font-medium leading-6 text-gray-900">Contact
                                no.</label>
                            <div class="mt-2">
                                <input type="text" name="contact_no" id="contact_no" wire:model='contact_no'
                                    class="block w-full @error('contact_no')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('contact_no')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3 ">
                            <label for="grade_level_id" class="block text-sm font-medium leading-6 text-gray-900">Grade
                                Level</label>
                            <div class="mt-2">
                                <select id="grade_level_id" wire:model="grade_level_id"
                                    class="block w-full @error('grade_level_id')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option selected value="">Choose level</option>
                                    @foreach ($grade_levels as $key => $grade_level)
                                        <option value="{{ $key }}">{{ $grade_level }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('grade_level_id')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3 ">
                            <label for="track_id" class="block text-sm font-medium leading-6 text-gray-900">Track</label>
                            <div class="mt-2">
                                <select id="track_id" wire:model="track_id"
                                    class="block w-full @error('track_id')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option selected value="">Choose track</option>
                                    @foreach ($tracks as $key => $track)
                                        <option value="{{ $key }}">{{ $track }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('track_id')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3 ">
                            <label for="strand_id" class="block text-sm font-medium leading-6 text-gray-900">Strand</label>
                            <div class="mt-2">
                                <select id="strand_id" wire:model="strand_id"
                                    class="block w-full @error('strand_id')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @if ($strands)
                                        <option selected value="">Choose strand</option>
                                        @foreach ($strands as $key => $strand)
                                            <option value="{{ $key }}">{{ $strand }}</option>
                                        @endforeach
                                    @else
                                        <option selected value="">Choose track first</option>
                                    @endif
                                </select>
                            </div>
                            @error('strand_id')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3 ">
                            <label for="specialization_id"
                                class="block text-sm font-medium leading-6 text-gray-900">Specialization</label>
                            <div class="mt-2">
                                <select id="specialization_id" wire:model="specialization_id"
                                    class="block w-full @error('specialization_id')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @if ($specializations)
                                        <option selected value="">Choose specialization</option>
                                        @foreach ($specializations as $key => $specialization)
                                            <option value="{{ $key }}">{{ $specialization }}</option>
                                        @endforeach
                                    @else
                                        <option selected value="">Choose strand first</option>
                                    @endif
                                </select>
                            </div>
                            @error('specialization_id')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="student_photo" class="block text-sm font-medium leading-6 text-gray-900">Student
                                Photo</label>
                            <div class="mt-2">
                                <input type="file" name="student_photo" id="student_photo" wire:model='student_photo'
                                    class="block w-full @error('student_photo') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('student_photo')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3 ">
                            <label for="student_type" class="block text-sm font-medium leading-6 text-gray-900">Type</label>
                            <div class="mt-2">
                                <select id="student_type" wire:model="student_type"
                                    class="block w-full @error('student_type')
                        border-red-500
                        @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option selected value="">Choose type</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Iregular">Iregular</option>

                                </select>
                            </div>
                            @error('student_type')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    @break

                    @case(2)
                        <div class="col-span-2 lg:col-span-3">
                            <label for="house_no" class="block text-sm font-medium leading-6 text-gray-900">House
                                No./Street</label>
                            <div class="mt-2">
                                <input type="text" name="house_no" id="house_no" wire:model='house_no'
                                    class="block w-full @error('house_no') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('house_no')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="purok" class="block text-sm font-medium leading-6 text-gray-900">Purok</label>
                            <div class="mt-2">
                                <input type="text" name="purok" id="purok" wire:model='purok'
                                    class="block w-full @error('purok') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('purok')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="barangay" class="block text-sm font-medium leading-6 text-gray-900">Barangay</label>
                            <div class="mt-2">
                                <input type="text" name="barangay" id="barangay" wire:model='barangay'
                                    class="block w-full @error('barangay') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('barangay')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="municipality"
                                class="block text-sm font-medium leading-6 text-gray-900">Municipality</label>
                            <div class="mt-2">
                                <input type="text" name="municipality" id="municipality" wire:model='municipality'
                                    class="block w-full @error('municipality') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('municipality')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="province" class="block text-sm font-medium leading-6 text-gray-900">Province</label>
                            <div class="mt-2">
                                <input type="text" name="province" id="province" wire:model='province'
                                    class="block w-full @error('province') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('province')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    @break

                    @case(3)
                        <div class="col-span-2 lg:col-span-3">
                            <label for="father_name" class="block text-sm font-medium leading-6 text-gray-900">Father`s
                                name</label>
                            <div class="mt-2">
                                <input type="text" name="father_name" id="father_name" wire:model='father_name'
                                    class="block w-full @error('father_name') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <small id="labelf_name" class="text-gray-500">(Last Name, First
                                    Name,
                                    Middle Name)</small>
                            </div>
                            @error('father_name')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="father_occupation" class="block text-sm font-medium leading-6 text-gray-900">Father's
                                Occupation</label>
                            <div class="mt-2">
                                <input type="text" name="father_occupation" id="father_occupation"
                                    wire:model='father_occupation'
                                    class="block w-full @error('father_occupation') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('father_occupation')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="mother_name" class="block text-sm font-medium leading-6 text-gray-900">Mother`s
                                name</label>
                            <div class="mt-2">
                                <input type="text" name="mother_name" id="mother_name" wire:model='mother_name'
                                    class="block w-full @error('mother_name') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <small id="labelf_name" class="text-gray-500">(Last Name, First
                                    Name,
                                    Middle Name)</small>
                            </div>
                            @error('mother_name')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="mother_occupation" class="block text-sm font-medium leading-6 text-gray-900">Mother`s
                                Occupation</label>
                            <div class="mt-2">
                                <input type="text" name="mother_occupation" id="mother_occupation"
                                    wire:model='mother_occupation'
                                    class="block w-full @error('mother_occupation') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('mother_occupation')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="guardian_name" class="block text-sm font-medium leading-6 text-gray-900">Guardian`s
                                name</label>
                            <div class="mt-2">
                                <input type="text" name="guardian_name" id="guardian_name" wire:model='guardian_name'
                                    class="block w-full @error('guardian_name') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <small id="labelf_name" class="text-gray-500">(Last Name, First
                                    Name,
                                    Middle Name)</small>
                            </div>
                            @error('guardian_name')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="guardian_relationship"
                                class="block text-sm font-medium leading-6 text-gray-900">Relationship</label>
                            <div class="mt-2">
                                <input type="text" name="guardian_relationship" id="guardian_relationship"
                                    wire:model='guardian_relationship'
                                    class="block w-full @error('guardian_relationship') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('guardian_relationship')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="guardian_address"
                                class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                            <div class="mt-2">
                                <input type="text" name="guardian_address" id="guardian_address"
                                    wire:model='guardian_address'
                                    class="block w-full @error('guardian_address') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <small id="labelg_address" class="text-gray-500">(House
                                    No./Street)
                                    (Purok) (Barangay) (Municipality) (Province)</small>
                            </div>
                            @error('guardian_address')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="guardian_contact_no" class="block text-sm font-medium leading-6 text-gray-900">Contact
                                no.</label>
                            <div class="mt-2">
                                <input type="text" name="guardian_contact_no" id="guardian_contact_no"
                                    wire:model='guardian_contact_no'
                                    class="block w-full @error('guardian_contact_no') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('guardian_contact_no')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    @break

                    @case(4)
                        <div class="col-span-2 lg:col-span-3">
                            <label for="previous_school" class="block text-sm font-medium leading-6 text-gray-900">Previous
                                School</label>
                            <div class="mt-2">
                                <input type="text" name="previous_school" id="previous_school"
                                    wire:model='previous_school'
                                    class="block w-full @error('previous_school') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('previous_school')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="type_of_school" class="block text-sm font-medium leading-6 text-gray-900">Type of
                                school</label>
                            <div class="mt-2">
                                <select id="type_of_school" wire:model='type_of_school'
                                    class="block w-full @error('type_of_school')
                    border-red-500
                    @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option selected value="">Choose type</option>

                                    <option value="Public">Public</option>
                                    <option value="Private">Private</option>
                                    <option value="ALS">ALS</option>
                                    <option value="Transferee">Transferee</option>
                                </select>
                            </div>
                            @error('type_of_school')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 ">
                            <label for="number_of_years" class="block text-sm font-medium leading-6 text-gray-900">Number of
                                years</label>
                            <div class="mt-2">
                                <input type="text" name="number_of_years" id="number_of_years"
                                    wire:model='number_of_years'
                                    class="block w-full @error('number_of_years') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                <small id="labelg_address" class="text-gray-500">Number of years in Junior Highschool</small>
                            </div>
                            @error('number_of_years')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 ">
                            <label for="year_graduated" class="block text-sm font-medium leading-6 text-gray-900">Year
                                Graduated</label>
                            <div class="mt-2">
                                <input type="text" name="year_graduated" id="year_graduated" wire:model='year_graduated'
                                    class="block w-full @error('year_graduated') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('year_graduated')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 ">
                            <label for="average" class="block text-sm font-medium leading-6 text-gray-900">Average</label>
                            <div class="mt-2">
                                <input type="text" name="average" id="average" wire:model='average'
                                    class="block w-full @error('average') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('average')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    @break

                    @case(5)
                        <div class="col-span-2 lg:col-span-3">
                            <label for="primary_grade" class="block text-sm font-medium leading-6 text-gray-900">Primary
                                Grade</label>
                            <div class="mt-2">
                                <input type="text" name="primary_grade" id="primary_grade" wire:model='primary_grade'
                                    class="block w-full @error('primary_grade') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('primry_grade')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="year_graduated_primary" class="block text-sm font-medium leading-6 text-gray-900">Year
                                Graduated</label>
                            <div class="mt-2">
                                <input type="text" name="year_graduated_primary" id="year_graduated_primary"
                                    wire:model='year_graduated_primary'
                                    class="block w-full @error('year_graduated_primary') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('year_grduated_primary')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="intermediate"
                                class="block text-sm font-medium leading-6 text-gray-900">Intermediate</label>
                            <div class="mt-2">
                                <input type="text" name="intermediate" id="intermediate" wire:model='intermediate'
                                    class="block w-full @error('intermediate') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('intermediate')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="year_graduated_intermediate"
                                class="block text-sm font-medium leading-6 text-gray-900">Year Graduated</label>
                            <div class="mt-2">
                                <input type="text" name="year_graduated_intermediate" id="year_graduated_intermediate"
                                    wire:model='year_graduated_intermediate'
                                    class="block w-full @error('year_graduated_primary') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('year_graduated_intermediate')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="junior_highschool" class="block text-sm font-medium leading-6 text-gray-900">Junior
                                Highschool</label>
                            <div class="mt-2">
                                <input type="text" name="junior_highschool" id="junior_highschool"
                                    wire:model='junior_highschool'
                                    class="block w-full @error('junior_highschool') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('junior_highschool')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                        <div class="col-span-2 lg:col-span-3">
                            <label for="year_graduated_junior_highschool"
                                class="block text-sm font-medium leading-6 text-gray-900">Year Graduated</label>
                            <div class="mt-2">
                                <input type="text" name="year_graduated_junior_highschool"
                                    id="year_graduated_junior_highschool" wire:model='year_graduated_junior_highschool'
                                    class="block w-full @error('year_graduated_primary') border-red-500 @enderror px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('year_graduated_junior_highschool')
                                <small class="text-[#DC3545]" role="alert">
                                    <strong>{{ $message }}</strong>
                                </small>
                            @enderror
                        </div>
                    @break

                @endswitch
            </div>
        </div>
        <div class="foot w-full flex align-center justify-between mt-5">
            @if ($current_step == 1)
                <div></div>
            @endif
            @if ($current_step != 1)
                <button type="button" wire:click="decreaseStep()" class="font-semibold py-2 px-4 rounded"
                    wire:loading.class="disabled">
                    Back
                </button>
            @endif
            @if ($current_step != 5)
                <button type="button" wire:click="increaseStep()"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded"
                    wire:loading.class="disabled">
                    Next
                </button>
            @else
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded"
                    wire:loading.class="disabled">
                    Submit
                </button>
            @endif
        </div>
    </form>
</div>
