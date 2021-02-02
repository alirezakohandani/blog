<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function show()
    {
        return view('plan.plan');
    }
}
