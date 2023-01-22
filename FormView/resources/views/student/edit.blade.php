@extends('layouts.main')

@section('title')
    <title>Student Edit</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ URL('student/update/' . $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Student Name</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ $student->name }}">
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Student birth date</label>
                        <input id="birth_date" class="form-control" type="text" name="birth_date"
                            value="{{ $student->birth_date }}">
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <select id="nationality" class="form-control" name="nationality">
                            @for ($x = 0; $x < Count($nationality_codes); $x++)
                                @if ($nationality_codes[$x] == $student->nationality)
                                    <option value="{{ $nationality_codes[$x] }}" selected>{{ $nationality_names[$x] }}
                                    </option>
                                @else
                                    <option value="{{ $nationality_codes[$x] }}">{{ $nationality_names[$x] }}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <select id="postal_code" class="form-control" name="postal_code">
                            @foreach ($postal_codes as $code)
                                @if ($code == $student->postal_code)
                                    <option value="{{ $code }}" selected>{{ $code }}</option>
                                @else
                                    <option value="{{ $code }}">{{ $code }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button class="btn btn-primary" type="submit">Update</button>
                    <br><br>
                    <a href="{{ URL('student/index') }}">students index</a>
                </form>
            </div>
        </div>
    </div>
@endsection
