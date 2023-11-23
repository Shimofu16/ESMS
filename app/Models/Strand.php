<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    use HasFactory;
    protected $fillable = ['strand', 'track_id'];

    public function track(){
        return $this->belongsTo(Track::class);
    }

    // public function specialization(){
    //     return $this->HasOne(Strand::class);
    // }
}
