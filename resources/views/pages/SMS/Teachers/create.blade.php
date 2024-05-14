@extends('layout.default')
@section('info')
    <!--begin::Info-->
    <div class="d-flex align-items-center flex-wrap mr-2">

        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
            Create Teacher
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
                            Create Teacher
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <a class="btn btn-secondary font-weight-bold btn-sm mr-1" href="{{ route('teacher.index') }}">
                            {{-- return --}}
                            <i class="flaticon2-back"></i>
                            back
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                  
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="picture" class="form-label fw-bold text-black">Picture</label>
                                    <input type="file" class="form-control" id="picture" name="picture"
                                        value="{{ old('picture') }}">
                                    @error('picture')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="first_name" class="form-label fw-bold text-black">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="middle_name" class="form-label fw-bold text-black">Middle Name</label>
                                    <input type="text" class="form-control" id="middle_name" name="middle_name"
                                        value="{{ old('middle_name') }}">
                                    @error('middle_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="last_name" class="form-label fw-bold text-black">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="sex" class="form-label fw-bold text-black">Sex</label>
                                    <select name="sex" id="sex" class="form-control">
                                        <option value="">Select sex</option>
                                        <option value="Male" @if (old('sex') == 'Male') selected @endif>Male
                                        </option>
                                        <option value="Female" @if (old('sex') == 'Female') selected @endif>Female
                                        </option>
                                        {{-- <option value="Other" @if (old('sex') == 'Other') selected @endif>Other</option> --}}
                                    </select>
                                    @error('sex')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="birthday" class="form-label fw-bold text-black">birthday</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday"
                                        value="{{ old('birthday') }}">
                                    @error('birthday')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="phone_number" class="form-label fw-bold text-black">Phone Number</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                        value="{{ old('phone_number') }}">
                                    @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="email" class="form-label fw-bold text-black">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="address" class="form-label fw-bold text-black">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ old('address') }}">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="civil_status" class="form-label fw-bold text-black">Civil Status</label>
                                    <select name="civil_status" id="civil_status" class="form-control">
                                        <option value="">Select civil status</option>
                                        <option value="Single" @if (old('civil_status') == 'Single') selected @endif>Single
                                        </option>
                                        <option value="Married" @if (old('civil_status') == 'Married') selected @endif>Married
                                        </option>
                                        {{-- <option value="Other" @if (old('civil_status') == 'Other') selected @endif>Other</option> --}}
                                    </select>
                                    @error('civil_status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="height" class="form-label fw-bold text-black">Height</label>
                                    <input type="text" class="form-control" id="height" name="height"
                                        value="{{ old('height') }}">
                                    @error('height')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="weight" class="form-label fw-bold text-black">Weight</label>
                                    <input type="text" class="form-control" id="weight" name="weight"
                                        value="{{ old('weight') }}">
                                    @error('weight')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="nationality" class="form-label fw-bold text-black">Nationality</label>
                                    <input type="text" class="form-control" id="nationality" name="nationality"
                                        value="{{ old('nationality') }}">
                                    @error('nationality')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="occupation" class="form-label fw-bold text-black">Occupation</label>
                                    <input type="text" class="form-control" id="occupation" name="occupation"
                                        value="{{ old('occupation') }}">
                                    @error('occupation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submit-e" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
