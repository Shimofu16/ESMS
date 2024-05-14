<?php

namespace App\Models\SMS;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'birthday' => 'date'
    ];

    protected $appends = [
        'full_name',
    ];

    public function getFullNameAttribute()
    {
        if ($this->middle_name) {
            return $this->first_name . ' ' . Str::ucfirst(Str::substr($this->middle_name, 0, 1)) . '. ' . $this->last_name;
        } else {
            return $this->first_name.' '.$this->last_name;
        }
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
