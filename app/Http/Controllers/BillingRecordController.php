<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BillingRecordController extends Controller
{
    public function index(Request $request)
    {
        DB::flushQueryLog();
        DB::enableQueryLog();
        
        $currentUser = Auth::user();
            
        $teamIds = $currentUser->ownedTeams->pluck('id')->unique();
        $billings =  Project::with(['billings'])->whereIn('team_id', $teamIds)->get();

        $totalBilling = $billings->sum(function ($project) {
            return $project->totalBilling();
        });
        
        $queries = DB::getQueryLog();
        foreach($queries as $query) {

            Log::info($query);
        }

        return view('billing.index')->with(['billings' => $billings, 'totalBilling' => $totalBilling]);
    }
}
