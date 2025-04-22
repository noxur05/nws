<?php

namespace App\Models;

class ResourceType extends BaseModel
{
    public function resourceConfigs()
    {
        return $this->hasMany(ResourceConfig::class, 'type_id');
    }
}
