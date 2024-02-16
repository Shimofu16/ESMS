<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Add transaction</h5>

            </div>
            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <table class="table" id="fee">
                                <thead>
                                    <tr>
                                        <th scope="col">Fee</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($fees as $fee)
                                        <tr>
                                            {{-- <th scope="row">1</th> --}}
                                            <td>{{ $fee->name }}</td>
                                            <td>{{ $fee->amount }}</td>
                                        </tr>
                                        @php
                                            $total = $total + $fee->amount;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <strong>Total: PHP {{ number_format($total, 2) }} </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="student" class="form-label fw-bold text-black">Student</label>
                            <select name="student_id" id="student_id" class="form-control">
                                <option value="">Select student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"
                                        @if (old('student_id') == $student->id) selected @endif>
                                        {{ $student->full_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('student_id')
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
