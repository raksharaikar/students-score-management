<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function student()
    {
    return $this->belongsTo('App\Models\Student');
    }

    public function course()
{
    return $this->belongsTo('App\Models\Course');
}
}
