<?php

namespace App\Models\SMS;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'school_year_id',
        'mode_of_payment',
        'total_amount',
        'amount',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function transactions()
    {
        return $this->hasMany(TransactionFee::class, 'transaction_id');
    }
}
