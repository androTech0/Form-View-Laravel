<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function owner()
    {
        return $this->hasOne('App\Models\Owner');
    }

    public function mechanic()
    {
        return $this->belongsTo('App\Models\Mechanic');
    }
}
