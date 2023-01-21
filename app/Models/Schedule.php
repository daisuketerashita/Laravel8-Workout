<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    //リレーション
    public function exercises()
    {
        return $this->hasMany('App\Models\Exercise');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($schedule) {
            $schedule->exercises()->delete();
        });
    }
}
