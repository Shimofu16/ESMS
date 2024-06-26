<div class="container">
    <form wire:submit.prevent="save">
        @csrf
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
                <label for="student_id" class="form-label fw-bold text-black">Student</label>
                <input list="students" type="text" name="student_id" id="student_id" class="form-control"
                    wire:model.lazy='student_id' autofocus required>
                <datalist id="students">
                    @foreach ($students as $student)
                        <option value="{{ $student->std_num }}">
                            {{ $student->full_name }}
                        </option>
                    @endforeach
                </datalist>
                {{-- <select name="student_id" id="student_id_select2" wire:model.lazy='student_id' class="form-control  p-0" required>
                    <option value="">Select student</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" @if (old('student_id') == $student->id) selected @endif>
                            {{ $student->full_name }}
                        </option>
                    @endforeach
                </select>
                <div wire:ignore>
                    @script()
                    <script>
                        $(document).ready(function() {
                            $('#student_id_select2').select2().on('change', function (e) {
                                console.log('value changed');
                                @this.set('student_id', $('#student_id_select2').select2("val"));
                            });
                        });
                    </script>
                </div>
                    @endscript --}}

            </div>
            <div class="col-6">
                <label for="fee_id" class="form-label fw-bold text-black">Fees</label>
                <select name="fee_id" id="fee_id" wire:model='fee_id' class="form-control">
                    <option value="">Select student first before selecting fees</option>
                    @foreach ($fees as $fee)
                        <option value="{{ $fee->id }}" @if (old('fee_id') == $fee->id) selected @endif>
                            {{ $fee->name }} - {{ $fee->amount }} - {{ $fee->type }}
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
                            <th scope="col">Amount/Balance</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($selected_fees as $key=> $selected_fee)
                            <tr wire:key='{{ $key }}'>
                                <td>
                                    {{ $selected_fee['name'] }}
                                </td>
                                <td>PHP {{ number_format($selected_fee['amount'], 2) }}
                                    @if ($selected_fee['balance'] > 0)
                                        / {{ number_format($selected_fee['balance'], 2) }}
                                    @endif
                                </td>
                                <td>
                                    <input type="number" class="form-control" id="amount.{{ $key }}"
                                        name="amount.{{ $key }}" wire:model='amount.{{ $key }}'
                                        placeholder="Amount">
                                </td>
                                <td>
                                    @if ($selected_fee['type'] != 'registration')
                                        <button type="button" class="btn btn-sm btn-danger"
                                            wire:click='removeFee({{ $key }})'>
                                            X
                                        </button>
                                    @endif
                                </td>
                                @php
                                    $total = $total + $selected_fee['amount'];
                                @endphp
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    <strong>No fee selected. Please select fee first</strong>
                                </td>
                            </tr>
                        @endforelse

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
