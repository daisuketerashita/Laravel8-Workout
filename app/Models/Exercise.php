<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    //リレーション
    public function schedule()
    {
        return $this->belongsTo('App\Models\Schedule');
    }
}
