<?php

namespace App\Http\Controllers\Carage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('owner')->with('mechanic')->get();

        dd($cars->toArray());

        return view('Carage.Car.index')->with('cars', $cars);
    }
}
