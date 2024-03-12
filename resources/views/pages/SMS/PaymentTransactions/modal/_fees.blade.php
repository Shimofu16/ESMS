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
                                    <th scope="col">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalAmount = 0;
                                    $totalBalance = 0;
                                @endphp
                                @foreach ($transaction->fees as $transaction_fee)
                                    <tr>
                                        {{-- <th scope="row">1</th> --}}
                                        <td>{{ $transaction_fee->fee->name }}</td>
                                        <td>{{ $transaction_fee->fee->amount }}</td>
                                        <td>{{ $transaction_fee->fee->balance }}</td>
                                    </tr>
                                    @php
                                        $totalAmount = $total + $transaction_fee->fee->amount;
                                        $totalBalance = $total + $transaction_fee->fee->balance;
                                    @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td>
                                        <strong>Total amount: PHP {{ number_format($totalAmount, 2) }} </strong>
                                    </td>
                                    <td>
                                        <strong>Total balance: PHP {{ number_format($totalBalance, 2) }} </strong>
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
