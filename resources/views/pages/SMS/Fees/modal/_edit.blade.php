<div class="modal fade" id="edit{{ $fee->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit</h5>

            </div>
            <form action="{{ route('fee.update', ['id' => $fee->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="name" class="form-label fw-bold text-black">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $fee->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="description" class="form-label fw-bold text-black">Description</label>
                            <textarea class="form-control" id="description" name="description" cols="30" rows="10">{{ $fee->description }}</textarea>
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
                                <option value="">Select type</option>
<option value="tuition" @if ($fee->type == 'tuition') selected @endif>
                                    Tuition</option>
                                <option value="registration" @if ($fee->type == 'registration') selected @endif>
                                    Registration</option>
                                <option value="miscellaneous" @if ($fee->type == 'miscellaneous') selected @endif>
                                    Miscellaneous</option>
                                <option value="activity" @if ($fee->type == 'activity') selected @endif>Activity
                                </option>
                                <option value="other" @if ($fee->type == 'other') selected @endif>Activity
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
                                value="{{ $fee->amount }}">
                            @error('amount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="submit-e" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
