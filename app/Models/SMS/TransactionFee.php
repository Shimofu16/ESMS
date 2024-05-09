<?php

namespace App\Models\SMS;

use App\Http\Controllers\SMS\PaymentTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionFee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'current_balance',
    ];

    public function getCurrentBalanceAttribute()
    {
        return $this->balances()->latest()->first()->balance;
    }

    public function transaction()
    {
        return $this->belongsTo(PaymentTransaction::class, 'transaction_id');
    }
    public function fee()
    {
        return $this->belongsTo(Fee::class, 'fee_id');
    }
    public function balances()
    {
        return $this->hasMany(TransactionFeeBalance::class, 'transaction_fee_id');
    }

}
