<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
 
// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('/', 'Auth\AuthController@getLogin');
Route::get('home', 'HomeController@index');
Route::get('profile', 'HomeController@getProfile');
Route::get('404', 'HomeController@error404');
Route::get('500', 'HomeController@error500');
Route::get('calendar', 'HomeController@getCalendar');
Route::get('lockscreen', 'HomeController@lock');
Route::get('invoice', 'HomeController@facts');
Route::get('print_invoice', 'HomeController@printInvoice');
Route::get('tables', 'HomeController@getTables');
Route::get('mini_home', 'HomeController@home2');

Route::get('general', 'HomeController@getGeneral');
Route::get('boton', 'HomeController@getBoton');
Route::get('icono', 'HomeController@getIcono');
Route::get('modal', 'HomeController@getModal');

Route::get('frm_general', 'HomeController@getFrmGeneral');
Route::get('frm_advance', 'HomeController@getFrmAdvance');

Route::get('students', 'StudentController@index');

Route::get('classes', 'ClasseController@index');

Route::get('courses', 'CourseController@index');
Route::post('newCourse', 'CourseController@create');
Route::delete('course/{course}','CourseController@destroy');
Route::get('course/{curso}','CourseController@edit');
Route::post('course','CourseController@update');

Route::get('teachers', 'TeacherController@index');
Route::post('newTeacher', 'TeacherController@create');
Route::get('teacher/{teacher}', 'TeacherController@edit');
Route::post('teacher', 'TeacherController@update');
Route::post('delete_teacher', 'TeacherController@destroy');

Route::post('newTask', 'TaskController@create');
Route::get('task/{task}', 'TaskController@edit');
Route::post('task', 'TaskController@update');
Route::post('delete_task', 'TaskController@destroy');