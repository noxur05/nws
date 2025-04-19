<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function type()
    {
        return $this->belongsTo(ResourceType::class, 'type_id');
    }
}
