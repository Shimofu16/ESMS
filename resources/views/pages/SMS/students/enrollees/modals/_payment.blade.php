<div class="modal fade" id="payment{{ $student->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Add Payment</h5>

            </div>
            <form action="{{ route('students.enrollee.store', ['student_id' => $student->id]) }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="row mb-3">
                        <div class="col-12">
                            <h3>
                                <strong>{{ getFeeByType('registration')->name }}:</strong>
                                <span>{{ getFeeByType('registration')->amount }}</span>
                            </h3>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="amount" class="form-label fw-bold text-black">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount"
                                value="{{ old('amount') }}" required>
                            @error('amount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit-e" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
