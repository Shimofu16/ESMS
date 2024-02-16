<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Add fee</h5>

            </div>
            <form action="{{ route('fee.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="name" class="form-label fw-bold text-black">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="description" class="form-label fw-bold text-black">Description</label>
                            <textarea class="form-control" id="description" name="description" cols="30" rows="10"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="type" class="form-label fw-bold text-black">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="">Select type</option>
<option value="tuition" @if (old('type') == 'tuition') selected @endif>
                                    Tuition</option>
                                <option value="registration" @if (old('type') == 'registration') selected @endif>
                                    Registration</option>
                                <option value="miscellaneous" @if (old('type') == 'miscellaneous') selected @endif>
                                    Miscellaneous</option>
                                <option value="activity" @if (old('type') == 'activity') selected @endif>Activity
                                </option>
                                <option value="other" @if (old('type') == 'other') selected @endif>Other
                                </option>
                            </select>
                            @error('type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="amount" class="form-label fw-bold text-black">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount"
                                value="{{ old('amount') }}">
                            @error('amount')
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
