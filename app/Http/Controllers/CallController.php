<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tariff;
use App\Models\Plan;

class CallController extends Controller
{
    public function index()
    {
        return view('calls.index');
    }

    public function calc(){
        $tariffs = Tariff::all();
        $plans = Plan::all();

        return view('calls.index', ['tariffs' => $tariffs, 'plans' => $plans]);
    }
}
