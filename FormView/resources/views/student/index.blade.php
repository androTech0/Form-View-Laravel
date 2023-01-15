@extends('layouts.main')

@section('title')
    <title>Students Index</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-light">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Birth Date</th>
                        <th>Nationality</th>
                        <th>Postal Code</th>
                        <th>Edit Student</th>
                        <th>Delete Student</th>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->birth_date }}</td>
                                <td>{{ $student->nationality }}</td>
                                <td>{{ $student->postal_code }}</td>
                                <td><a href="{{ URL('student/edit/' . $student->id) }}">Edit Student</a></td>
                                @if ($student->deleted_at != null)
                                    <td><a href="{{ URL('student/restore/' . $student->id) }}">Restore Student</a></td>
                                @else
                                    <td><a href="{{ URL('student/delete/' . $student->id) }}">Delete Student</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <a href="{{ URL('student/create') }}">create student</a>
            </div>
        </div>
    </div>
@endsection
