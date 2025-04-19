<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $timestamps = true;  

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
