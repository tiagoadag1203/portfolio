<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['name', 'skill_id', 'image', 'link'];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
