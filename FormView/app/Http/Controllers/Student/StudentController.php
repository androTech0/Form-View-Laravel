<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    // DML - Raw Query - INSERT
    public function store2(Request $request)
    {
        $name = $request['name'];
        $birth_date = $request['birth_date'];
        $nationality = $request['nationality'];
        $postal_code = $request['postal_code'];

        $query = "INSERT INTO students (name,birth_date,nationality,postal_code)
                    VALUES ('$name','$birth_date','$nationality','$postal_code')";

        $result = DB::statement($query);

        // dd($result);

        return redirect('student/index');
    }

    // DML - Raw Query - SELECT
    public function index()
    {
        $query = "SELECT * FROM students";

        $students = DB::select($query);

        // dd($students);

        return view('student.index')
            ->with('students', $students);
    }

    public function edit($id)
    {
        $postal_codes = ['241', '562', '325'];
        $nationality_names = ['Palestine', 'Syrian'];
        $nationality_codes = ['PAL', 'SYR'];

        $query = "SELECT * FROM students WHERE id = $id limit 1";

        $students = DB::select($query);

        // dd($student);

        return view('student.edit')
            ->with('student', $students[0])
            ->with('postal_codes', $postal_codes)
            ->with('nationality_names', $nationality_names)
            ->with('nationality_codes', $nationality_codes);
    }

    // DML - Raw Query - UPDATE
    public function update(Request $request, $id)
    {
        $name = $request['name'];
        $birth_date = $request['birth_date'];
        $nationality = $request['nationality'];
        $postal_code = $request['postal_code'];

        $query = "UPDATE students SET name = '$name',
        birth_date = '$birth_date',nationality = '$nationality',postal_code = '$postal_code'  WHERE id = $id ";

        $result = DB::update($query);

        return redirect('student/index');
    }

    // DML - Raw Query - DELETE
    public function delete($id)
    {
        $query = "DELETE FROM students WHERE id = $id";

        $result = DB::delete($query);

        return redirect('student/index');
    }
}
