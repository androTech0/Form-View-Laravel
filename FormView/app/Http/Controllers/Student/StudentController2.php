<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController2 extends Controller
{
    public function create()
    {

        $postal_codes = ['241', '562', '325'];
        return view('student.create')
            ->with('postal_codes', $postal_codes);
    }

    // DML - Query Builder - INSERT
    public function store(Request $request)
    {
        $name = $request['name'];
        $birth_date = $request['birth_date'];
        $nationality = $request['nationality'];
        $postal_code = $request['postal_code'];

        $result = DB::table('students')
            ->insert(['name' => $name, 'birth_date' => $birth_date, 'nationality' => $nationality, 'postal_code' => $postal_code]);

        // dd($result);

        return redirect('student/index');
    }

    // DML - Query Builder - SELECT
    public function index()
    {

        $students = DB::table('students')->get();

        // dd($students);

        return view('student.index')
            ->with('students', $students);
    }

    public function edit($id)
    {
        $postal_codes = ['241', '562', '325'];
        $nationality_names = ['Palestine', 'Syrian'];
        $nationality_codes = ['PAL', 'SYR'];

        $student = DB::table('students')->where('id',$id)->select('*')->first();

        // dd($student);

        return view('student.edit')
            ->with('student', $student)
            ->with('postal_codes', $postal_codes)
            ->with('nationality_names', $nationality_names)
            ->with('nationality_codes', $nationality_codes);
    }

    // DML - Query Builder - UPDATE
    public function update(Request $request, $id)
    {
        $name = $request['name'];
        $birth_date = $request['birth_date'];
        $nationality = $request['nationality'];
        $postal_code = $request['postal_code'];

        $result = DB::table('students')->where('id', $id)
            ->update(['name' => $name, 'birth_date' => $birth_date, 'nationality' => $nationality, 'postal_code' => $postal_code]);

        return redirect('student/index');
    }

    // DML - Query Builder - DELETE
    public function delete($id)
    {
        $result = DB::table('students')->where('id', $id)->delete();

        return redirect('student/index');
    }
}
