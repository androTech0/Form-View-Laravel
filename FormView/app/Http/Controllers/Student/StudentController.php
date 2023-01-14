<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        $postal_codes = ['241', '562', '325'];
        return view('student.create')
            ->with('postal_codes', $postal_codes);
    }

    public function store(Request $request)
    {
        // GET
        // $birth_date = $request->query('birth_date');
        // $name = $request['name'];
        // if($request->query->has('nationality')){
        //     $nationality = $request['nationality'];
        // }

        // POST
        // $nationality = $request['nationality'];
        // if($request->has('birth_date')){
        //     $birth_date = $request['birth_date'];
        // }

        // Headers
        // $name = $request->header('name');
        // if($request->header->has('nationality')){
        //     $nationality = $request['nationality'];
        // }


        // Redirect from controller
        // $postal_codes = ['241', '562', '325'];
        // return view('student.create')
        //     ->with('postal_codes', $postal_codes);

        return redirect('student/create');
    }
}
