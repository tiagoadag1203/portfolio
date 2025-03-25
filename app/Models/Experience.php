<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'name',
        'role',
        'description',
        'image',
        'start_date',
        'end_date',
    ];
}
