@extends('layouts.app')

@section('content')



    <a href="/students/create" class="btn btn-primary" style="margin-right:30px;"> Add student</a> 
    <a href="/course/create" class="btn btn-primary" style="margin-right:30px;"> Add course</a> 
    <a href="/scores/create" class="btn btn-primary" style="margin-right:30px;"> Add score for each student</a><br><br> 
    <br>

    <h3>Statistics</h3><br>


    <div class="row">
        <div class="col-md-6">
            <b>Get all students who scored more than given value in all subjects: </b><br>
            <br>

            <form action="{{ route('searchAll') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="score">Enter Score:</label>
                    <input type="text" class="form-control" id="score" name="score">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
            @if (isset($passing_student_count ))
            <h3>{{  $passing_student_count  }} students</h3>
          @if (count($studentids2)>0)
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>student name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentids2 as $student)
                        <tr>
                            <td>{{ $student->s_name }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        
        @endif
           
            
        </div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-md-6">

            <b> Get all students who scored more than given values in selected subjects:</b><br>
            <br>

            <form action="{{ route('search') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="course">Select Course:</label>
                    @if (isset($courses) && count($courses) > 0)
                        <select name="course" id="course" class="form-control">


                            @foreach ($courses as $course)
                                <option value="{{ $course->c_id }}">{{ $course->c_name }}</option>
                            @endforeach
                        </select>
                    @else
                        <option value="">No courses are available, add course and check stats</option>
                    @endif

                </div>
                <div class="form-group">
                    <label for="score">Enter Score:</label>
                    <input type="text" class="form-control" id="score" name="score">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
        <div class="col-md-6">

            @if (isset($students2))
                <h3>{{ count($students2) }} students</h3>
                @if (count($students2)>0)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>student name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students2 as $student)
                            <tr>
                                <td>{{ $student->s_name }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            @endif
        </div>
    </div>



    @if (session('success'))
        <script>
            window.onload = function() {
                alert("{{ session('success') }}");
            };
        </script>
    @endif

    @if (session('error'))
        <script>
            window.onload = function() {
                alert("{{ session('error') }}");
            };
        </script>
    @endif




@endsection
