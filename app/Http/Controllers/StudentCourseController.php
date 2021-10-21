<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCourse;
use App\Models\Student;
use App\Models\Course;


class StudentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StudentCourse::select('student_courses.*', 'students.*', 'courses.*')
        ->leftJoin('students', 'student_courses.studentId', '=', 'students.id')
        ->leftJoin('courses', 'student_courses.courseId', '=', 'courses.id')
        ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'studentId' => 'required',
            'courseId' => 'required',

        ]);

        return StudentCourse::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return StudentCourse::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $studentcourse = StudentCourse::find($id);
        $studentcourse->update($request->all());
        return $studentcourse;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return StudentCourse::destroy($id);
    }


    /**
     * Display a listing of the students their course.
     *
     * @return \Illuminate\Http\Response
     */
    public function studentscourses()
    {
        return StudentCourse::all()->groupBy('studentId');
    }

    /**
     * Display a listing of the students their course.
     *
     * @return \Illuminate\Http\Response
     */
    public function coursesstudents()
    {
        return StudentCourse::all()->groupBy('courseId');
    }


}
