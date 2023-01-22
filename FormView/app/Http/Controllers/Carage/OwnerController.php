<?php

namespace App\Http\Controllers\Carage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;


class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::with('car')->select('*')->get();

        dd($owners->toArray());

        return view('Carage.Owner.index')->with('owners', $owners);
    }
}
