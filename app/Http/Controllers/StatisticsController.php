<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Score;
use Illuminate\Support\Facades\DB;
class StatisticsController extends Controller
{

    public function statisticsForParticularSubject($c_id)
    {
        $students = Student::whereHas('scores', function ($query) use ($c_id) {
            $query->where('c_id', $c_id)->where('score', '>', 70);
        })->get();


         
        return view('students.index', compact('students'));
    }

    public function statisticsForAllSubjects()
    {
        $student_ids = Score::where('score', '>=', 70)->groupBy('s_id')->pluck('s_id');
        $student_count = Student::whereIn('s_id', $student_ids)->count();

        $passing_student_count = 0;
        foreach ($student_ids as $student_id) {
            $scores = Score::where('s_id', $student_id)->pluck('score');
            if ($scores->count() === 3 && $scores->every(function ($score) { return $score >= 70; })) {
                $passing_student_count++;
            }
        }
        // $students = Student::whereHas('scores', function ($query) {
        //     $query->where('score', '>', 80);
        // })->has('scores', '=', 3)->get();
        return $passing_student_count;
    }
}