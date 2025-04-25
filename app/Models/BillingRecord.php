<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Model;

class BillingRecord extends BaseModel
{
    public $timestamps = true;

    protected $fillable = [
        'project_id',
        'amount',
        'records',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
