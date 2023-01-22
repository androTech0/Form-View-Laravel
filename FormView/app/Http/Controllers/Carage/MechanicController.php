<?php

namespace App\Http\Controllers\Carage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mechanic;

class MechanicController extends Controller
{
    public function index()
    {
        $mechanics = Mechanic::With('cars')->with('cars.owner')->get();

        dd($mechanics->toArray());

        return view('Carage.Mechanic.index')->with('mechanics', $mechanics);
    }

    public function index2($id)
    {
        $mechanics = Mechanic::With('cars')->with(['cars.owner' => function ($query) use ($id) {
            $query->where('id', '=', $id);
        }])
            ->get();

        dd($mechanics->toArray());

        return view('Carage.Mechanic.index')->with('mechanics', $mechanics);
    }
}
