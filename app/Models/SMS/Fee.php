<?php

namespace App\Models\SMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'amount',
        'gender',
    ];
    public function transactionFee(){
        return $this->hasMany(TransactionFee::class, 'fee_id');
    }

}
