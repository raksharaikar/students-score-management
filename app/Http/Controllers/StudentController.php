<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Score;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    public function create()
    {
        return view('students.create');
    }

    public function show()
    {
        $courses = Course::all();
        return view('students.index', compact('courses'));
    }

    public function store(Request $request)
    {
        $student = Student::where('s_name', $request->name)->first();
        
        if ($student) {
            return redirect('/students')->with('error', 'Student record already exists');
        } else {
            $student = new Student;
            $student->s_name = $request->name;
            $student->save();
            return redirect('/students')->with('success', 'Student record added successfully');
        }

        
         

    }

   
    

    public function searchAll(Request $request)
{
 
        
        $courses = Course::all();

        $score2 = $request->input('score');
       
        $studentids2 = [];
        $student_ids = Score::where('score', '>',  $score2 )->groupBy('s_id')->pluck('s_id');
        $student_count = Student::whereIn('s_id', $student_ids)->count();
        
        $passing_student_count = 0;
        foreach ($student_ids as $student_id) {
           $studentid3 = Score::where('s_id', $student_id);
           $scores = Score::where('s_id', $student_id)->pluck('score');
           if ($scores->count() === 3 && $scores->every(function ($score) use ($score2) { return $score >  $score2 ; })) {
               $passing_student_count++;
               $student = Student::where('s_id', $student_id)->first();
               $studentids2[] = $student;
           }
        }
           
             return view('students.index', compact('passing_student_count', 'courses', 'studentids2'));


        // $students = Student::whereHas('scores', function ($query) {
        //     $query->where('score', '>', 80);
        // })->has('scores', '=', 3)->get();
       

       // return view('students.index', compact('passing_student_count'));

}


public function search(Request $request)
{
    $courses = Course::all();
    $course = $request->input('course');
    $score = $request->input('score');

    $students2 = Student::whereHas('scores', function ($query) use ($course, $score) {
        $query->where([
            ['c_id', $course],
            ['score', '>', $score],
        ]);
    })->get();


     
    return view('students.index', compact('students2', 'courses'));

    
}


}
