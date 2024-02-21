<div class="container">
    <form wire:submit.prevent="save">
        @csrf

        <div class="row mb-3">
            <div class="col-6">
                <label for="student_id" class="form-label fw-bold text-black">Student</label>
                <select name="student_id" id="student_id" wire:model='student_id' class="form-control" required>
                    <option value="">Select student</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" @if (old('student_id') == $student->id) selected @endif>
                            {{ $student->full_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="amount" class="form-label fw-bold text-black">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" wire:model='amount'
                    value="{{ old('amount') }}">
                <small id="emailHelp" class="form-text text-muted">Enter amount after selecting fees.</small>
                @error('amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="fee_id" class="form-label fw-bold text-black">Fees</label>
                <select name="fee_id" id="fee_id" wire:model='fee_id' class="form-control" required>
                    <option value="">Select fee</option>
                    @foreach ($fees as $fee)
                        <option value="{{ $fee->id }}" @if (old('fee_id') == $fee->id) selected @endif>
                            {{ $fee->name }} - {{ $fee->amount }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <table class="table p-3">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($selected_fees as $selected_fee)
                            <tr>
                                <td>
                                    {{ $selected_fee->name }}
                                </td>
                                <td>PHP {{ number_format($selected_fee->amount, 2) }}</td>
                                @php
                                    $total = $total + $selected_fee->amount;
                                @endphp
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">
                                    <strong>No fee selected. Please select fee first</strong>
                                </td>
                            </tr>
                        @endforelse
                        @if ($total > 0)
                            <tr>
                                <td></td>
                                <td>
                                    <strong>Total: {{ number_format($total, 2) }}</strong>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mb-3 justify-content-between">
            <div></div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
