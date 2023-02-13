<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create()
    {
        return view('course.create');
    }

    

    public function store(Request $request)
    {
        $student = Course::where('c_name', $request->name)->first();

        if ($student) {
            return redirect('/students')->with('error', 'Student record already exists');
        } else {
            $student = new Course;
            $student->c_name = $request->name;
            $student->save();
            return redirect('/students')->with('success', 'Student record added successfully');
        }
    }
}
