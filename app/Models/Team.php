<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends BaseModel
{
    use HasFactory;

    public $timestamps = true;

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function projects() {
        return $this->hasMany(Project::class);
    }
}
