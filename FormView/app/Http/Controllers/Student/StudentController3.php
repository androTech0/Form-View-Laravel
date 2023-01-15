<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController3 extends Controller
{
    public function create()
    {

        $postal_codes = ['241', '562', '325'];
        return view('student.create')
            ->with('postal_codes', $postal_codes);
    }

    // DML - Eloquent Model (ORM) - INSERT
    public function store(Request $request)
    {
        $student = new Student();
        $student->name = $request['name'];
        $student->birth_date = $request['birth_date'];
        $student->nationality = $request['nationality'];
        $student->postal_code = $request['postal_code'];

        $result = $student->save();
        // dd($result);

        return redirect('student/index');
    }

    // DML - Eloquent Model (ORM) - SELECT
    public function index()
    {

        $students = Student::get();

        // dd($students);

        return view('student.index')
            ->with('students', $students);
    }

    public function index2()
    {
        $students = Student::withTrashed()->get();

        // dd($students);

        return view('student.index')
            ->with('students', $students);
    }

    public function edit($id)
    {
        $postal_codes = ['241', '562', '325'];
        $nationality_names = ['Palestine', 'Syrian'];
        $nationality_codes = ['PAL', 'SYR'];

        $student = Student::where('id', $id)->first();

        // dd($student);

        return view('student.edit')
            ->with('student', $student)
            ->with('postal_codes', $postal_codes)
            ->with('nationality_names', $nationality_names)
            ->with('nationality_codes', $nationality_codes);
    }

    // DML - Eloquent Model (ORM) - UPDATE
    public function update(Request $request, $id)
    {

        $student = Student::Where('id', $id)->first();
        $student->name = $request['name'];
        $student->birth_date = $request['birth_date'];
        $student->nationality = $request['nationality'];
        $student->postal_code = $request['postal_code'];

        $result = $student->save();

        // dd($result);
        return redirect('student/index');
    }

    // DML - Eloquent Model (ORM) - DELETE
    public function delete($id)
    {
        $result = Student::where('id', $id)->delete();

        return redirect('student/index');
    }

    public function restore($id)
    {
        $result = Student::withTrashed()->where('id', $id)->restore();

        return redirect('student/index');
    }
}
