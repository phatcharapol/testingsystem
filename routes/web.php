<?php

use App\Http\Middleware\CheckRole;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/chgpwd', 'AdminController@chgpwd')->name('admin.chgpwd');


Route::group(['middleware' => ['admin']], function () {   
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::resource('admin/user', 'AdminUserController',[
        'as' => 'admin',
    // 'names' => [
    //     'index' => 'admin.user',
        // 'store' => 'admin.user.store',
        // 'create' => 'admin.user.create',
        // 'update' => 'admin.user.update',
        // 'destroy' => 'admin.user.destroy',
        // 'show' => 'admin.user.show',
        // 'edit' => 'admin.user.edit'
        // ]
    ]);
    // Route::resource('test/subject', 'TestSubjectController',[
    // 'as' => 'test'
    // ]);
    // Route::resource('test/subject/content', 'TestContentController',[
    // 'as' => 'test'
    // ]);
    // Route::resource('test/subject/content/question', 'TestQuestionController',[
    // 'as' => 'test',
    // 'names' => [
    //             'create' => 'test.question.create2'
    //         ]
    // ]);
    // Route::get('test/subject/{testsubject_id}/{testcontent_id}/create', 'TestQuestionController@create')->name('test.question.create');
    

});
Route::group(['middleware' => ['teacher']], function () {	

     // Dashboard
         Route::get('/teacher/dashboard', 'TeacherController@index')->name('teacher');
         Route::get('/teacher/showpeople/{subjectcode}','TeacherController@showpeople')->name('show.people');

    // CRUD Subject
    	 Route::resource('test/subject', 'TestSubjectController',[
        'as' => 'test'
        ]);
        Route::resource('test/subject/content', 'TestContentController',[
        'as' => 'test'
        ]);
        Route::resource('test/subject/content/question', 'TestQuestionController',[
        'as' => 'test',
        'names' => [
                    'create' => 'test.question.create2'
                ]
        ]);
        Route::get('test/subject/{testsubject_id}/{testcontent_id}/create', 'TestQuestionController@create')->name('test.question.create');
   
});


Route::group(['middleware' => ['student']], function () {
	Route::get('/student', 'StudentController@index')->name('student');
});





