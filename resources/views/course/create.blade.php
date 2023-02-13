@extends('layouts.app')

@section('content')
<form action="{{ route('course.store') }}" method="post">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
    </div>
     
    <button type="submit">Submit</button>
</form>
@endsection