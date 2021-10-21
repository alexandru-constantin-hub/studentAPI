<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::group([
    'middleware' => 'api',

], function ($router) {
    /* Students Route */
    Route::get('/students', [StudentController::class, 'index']);
    Route::post('/students', [StudentController::class, 'store']);
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
    Route::get('/students/search/{name}', [StudentController::class, 'search']);
    /* Courses Route */
    Route::get('/courses', [CourseController::class, 'index']);
    Route::post('/courses', [CourseController::class, 'store']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);
    Route::put('/courses/{id}', [CourseController::class, 'update']);
    Route::delete('/courses/{id}', [CourseController::class, 'destroy']);
    Route::get('/courses/search/{name}', [CourseController::class, 'search']);
    /* StudentCourses Route */
    Route::get('/studentcourses', [StudentCourseController::class, 'index']);
    Route::post('/studentcourses', [StudentCourseController::class, 'store']);
    Route::get('/studentcourses/{id}', [StudentCourseController::class, 'show']);
    Route::put('/studentcourses/{id}', [StudentCourseController::class, 'update']);
    Route::delete('/studentcourses/{id}', [StudentCourseController::class, 'destroy']);
    /* Student - Courses Route */
    Route::get('/studentcourseslist', [StudentCourseController::class, 'studentscourses']);
    Route::get('/coursestudentslist', [StudentCourseController::class, 'coursesstudents']);
});



