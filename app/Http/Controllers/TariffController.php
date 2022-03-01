<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Models\Tariff;

use function GuzzleHttp\Promise\all;

class TariffController extends Controller
{

    public function tariff()
    {

        $tariffs = Tariff::all();

        return view('admin.dashboard_tariffs', ['tariffs' => $tariffs]);
    }

    public function store(Request $request)
    {
        $tariff = new Tariff;
        $tariff->area_code_origin = $request->area_code_origin;
        $tariff->area_code_destination = $request->area_code_destination;
        $tariff->tariff = $request->tariff;

        $tariff->save();

        return redirect('/dashboard_tariffs')->with('msg', 'Tarifa cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $tariff = Tariff::findOrFail($id);

        return view('admin.dashboard_tariffs', ['tariff' => $tariff]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        Tariff::findOrFail($id)->update($data);

        return redirect('/dashboard_tariffs')->with('msg', 'Tarifa atualizada com sucesso!');
    }

    public function destroy($id)
    {
        Tariff::findOrFail($id)->delete();
        return redirect('/dashboard_tariffs')->with('msg', 'Tarifa excluída com sucesso!');
    }
}

