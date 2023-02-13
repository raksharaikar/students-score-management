<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Student;
use App\Models\Course;

class ScoreController extends Controller
{
    public function create()
    {
        $students = Student::all();
        $courses = Course::all();

        return view('scores.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {

        $student = Score::where('s_id', $request->student_id)->where('c_id', $request->course_id)->first();
        
        if ($student) {
            return redirect('/students')->with('error', 'Student record already exists');
        } else {
            $student = new Score;
            $student->s_id = $request->student_id;
            $student->c_id = $request->course_id;
            $student->score = $request->score;
            $student->save();
            return redirect('/students')->with('success', 'Student record added successfully');
        }


        
       
     
    }
 
}
