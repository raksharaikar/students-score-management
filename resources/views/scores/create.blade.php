@extends('layouts.app')

@section('content')
<form action="{{ route('scores.store') }}" method="post">
    @csrf
    <div>
        <label for="student_id">Student:</label>
        <select name="student_id" id="student_id">
            @foreach ($students as $student)
                <option value="{{ $student->s_id }}">{{ $student->s_name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="course_id">Course:</label>
        <select name="course_id" id="course_id">
            @foreach ($courses as $course)
                <option value="{{ $course->c_id }}">{{ $course->c_name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="score">Score:</label>
        <input type="text" name="score" id="score">
    </div>
    <button type="submit">Submit</button>
</form>
@endsection