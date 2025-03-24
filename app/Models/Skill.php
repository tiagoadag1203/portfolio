<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name', 'skill_type', 'percentage', 'description', 'image'];

    public function certificates()
    {
        return $this->HasMany(Certificate::class);
    }
}
