<div class="modal fade" id="fees{{ $transaction->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Fees</h5>

            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <table class="table">
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
                                @foreach ($transaction->fees as $transaction_fee)
                                    <tr>
                                        {{-- <th scope="row">1</th> --}}
                                        <td>{{ $transaction_fee->fee->name }}</td>
                                        <td>{{ $transaction_fee->fee->amount }}</td>
                                    </tr>
                                    @php
                                        $total = $total + $transaction_fee->fee->amount;
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
