<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function schoolClass()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function weekDay()
    {
        return $this->belongsTo(WeekDay::class);
    }
}
