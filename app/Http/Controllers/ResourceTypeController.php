<?php

namespace App\Http\Controllers;

use App\Models\ResourceType;
use Illuminate\Http\Request;

class ResourceTypeController extends Controller
{
    public function index(Request $request) {
    }
    
    public function show($id) {
        $resourceType = ResourceType::find($id)->resources;
        if (!$resourceType) {
            abort(404, 'Resource Type not found');
        }
        return view('resource_type.index')->with(['resource_type' => $resourceType]);
    }
}
