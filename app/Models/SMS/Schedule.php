<?php

namespace App\Models\SMS;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'days' => 'array',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}
