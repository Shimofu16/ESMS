<?php

namespace App\Models\SMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionFeeBalance extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transactionFee()
    {
        return $this->belongsTo(TransactionFee::class, 'transaction_fee_id');
    }
}
