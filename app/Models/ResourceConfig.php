<?php

namespace App\Models;

class ResourceConfig extends BaseModel
{
    public function type() {
        return $this->belongsTo(ResourceType::class, 'type_id');
    }
}
