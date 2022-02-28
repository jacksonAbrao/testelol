<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plan;

use function GuzzleHttp\Promise\all;

class PlanController extends Controller{

    public function index(){
        $plans = Plan::all();
        $nomePlanos = array();
        foreach ($plans as $plan) {
            $nomePlanos[] = $plan->name;
        }
        return view('index', compact('nomePlanos'));
    }

    public function plans(){
        $plans = Plan::all();


        return view('admin.dashboard_plans', ['plans' => $plans]);
    }

    public function store(Request $request){
        $plan = new Plan;
        $plan->name = $request->name;
        $plan->minutes = $request->minutes;
        $plan->description = $request->description;

        $plan->save();

        return redirect('/dashboard_plans')->with('msg', 'Plano cadastrado com sucesso!');
    }

    public function destroy($id){

        Plan::findOrFail($id) -> delete();
        return redirect('/dashboard_plans')->with('msg', 'Plano excluído com sucesso!');
    }

    public function dashboard()
    {
        return view("admin.dashboard");
    }
}
