<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends BaseModel
{
    use HasFactory;

    public $timestamps = true;

    public function teams() {
        return $this->belongsToMany(Team::class, 'team_user')->withPivot('role');
    }
}
