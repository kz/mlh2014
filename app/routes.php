<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('prefix' => 'api'), function()
{
    Route::get('tutors/subject/{subject}/user/{user_id}', 'TutorController@filterBySubject');
    Route::get('tutor/{tutor_id}', 'TutorController@getTutor');
    Route::post('auth/register', 'AuthController@register');
    Route::post('auth/login', 'AuthController@login');
    Route::get('twilio/receive', 'TwilioController@receive');
});