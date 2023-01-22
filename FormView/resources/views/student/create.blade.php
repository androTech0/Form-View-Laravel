@extends('layouts.main')

@section('title')
    <title>Student Create</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach ($errors->all() as $message)
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ URL('student/store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Student Name</label>
                        <input id="name" class="form-control" type="text" name="name">
                        @foreach ($errors->get('name') as $message)
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Student birth date</label>
                        <input id="birth_date" class="form-control" type="text" name="birth_date">
                        @foreach ($errors->get('birth_date') as $message)
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <select id="nationality" class="form-control" name="nationality">
                            <option value=""></option>
                            <option value="PAL">Palestine</option>
                            <option value="SYR">Syrian</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <select id="postal_code" class="form-control" name="postal_code">
                            <option value=""></option>
                            @foreach ($postal_codes as $code)
                                <option value="{{ $code }}">{{ $code }}</option>
                            @endforeach
                        </select>
                        @foreach ($errors->get('postal_code') as $message)
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <br><br>
                    <a href="{{ URL('student/index') }}">students index</a>
                </form>
            </div>
        </div>
    </div>
@endsection
