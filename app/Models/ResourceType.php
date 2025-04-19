<?php

namespace App\Models;

class ResourceType extends BaseModel
{
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }
}
