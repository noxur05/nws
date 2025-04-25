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

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function billings()
    {
        return $this->hasMany(BillingRecord::class);
    }

    public function totalBilling() {
        $resources = $this->resources;

        $totalBilling = 0;

        foreach($resources as $resource)
        {
            $totalBilling += $resource->config->price;
        }

        return $totalBilling;
    }
}
