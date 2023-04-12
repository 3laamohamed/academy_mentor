<?php

use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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
Route::group(['namespace'=>'App\Http\Controllers\Api'],function(){
        Route::post('login','GeneralController@login');
        Route::post('sign_up','GeneralController@register');
        Route::get('groups','AuthController@getGroups');
        Route::get('lessons','AuthController@getAllLessons');
        Route::get('grades','AuthController@getStudentGrades');
        Route::get('config','AuthController@config');
        Route::get('branches','AuthController@getBranches');
        Route::get('exams','AuthController@getAllExams');
        Route::get('classes','AuthController@getClasses');
});

Route::group(['middleware'=>'auth:sanctum','namespace'=>'App\Http\Controllers\Api'],function(){
        Route::post('update_exam_status','AuthController@makeSolvedExam');
        Route::post('update_user_info','AuthController@updateUserInfo');
        Route::get('user_info','AuthController@getUserInfo');
        Route::post('change_password','AuthController@changePassword');
        Route::get('subjects','AuthController@getAllSubjects');
        Route::get('exam_details','AuthController@getExamDetails');
        Route::get('lesson_details','AuthController@getLessonDetails');
        Route::get('attend','AuthController@attend');

});
