<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/students');
});


Route::get('/students', function () {
    return view('students.index');
});
Route::get('/students', 'App\Http\Controllers\StudentController@show')->name('students.show');
Route::get('/students/create', 'App\Http\Controllers\StudentController@create')->name('students.create');
Route::post('/students', 'App\Http\Controllers\StudentController@store')->name('students.store');

Route::get('/course/create', 'App\Http\Controllers\CourseController@create')->name('course.create');
Route::post('/course', 'App\Http\Controllers\CourseController@store')->name('course.store');

Route::get('/scores/create', 'App\Http\Controllers\ScoreController@create')->name('scores.create');
Route::post('/scores', 'App\Http\Controllers\ScoreController@store')->name('scores.store');
//Route::get('/scores/statistics', 'App\Http\Controllers\ScoreController@statistics')->name('scores.statistics');
//Route::get('/scores/statistics2', 'App\Http\Controllers\ScoreController@statistics2')->name('scores.statistics2');
//Route::resource('/students', 'App\Http\Controllers\StudentController');

 
Route::post('/search-subject', [App\Http\Controllers\StudentController::class, 'search'])->name('search');
Route::post('/search-all', [App\Http\Controllers\StudentController::class, 'searchAll'])->name('searchAll');



Route::get('/statistics-particular-subject/{c_id}', 'App\Http\Controllers\StatisticsController@statisticsForParticularSubject');
Route::get('/statistics-all-subjects', 'App\Http\Controllers\StatisticsController@statisticsForAllSubjects');
