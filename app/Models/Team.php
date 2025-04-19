<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends BaseModel
{
    use HasFactory;

    public $timestamps = true;

    public function users() {
        return $this->belongsToMany(User::class, 'team_user')->withPivot('role');
    }
}
