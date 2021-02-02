<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function show()
    {
        $plans = Plan::all();
        return view('plan.plan', compact('plans'));
    }
}
