<?php

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

Route::get('/hvjh', function () {
   return view('welcome');

});
Route::get('/', 'HomeController@index')->name('home');
Route::get('/layout', function () {
    return view('layout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUFF//
Route::get('/courses/create', [
    'uses'=>'CoursesController@create',
    'as'=>'course.create'
]);


Route::post('/User/Type/', [
    'uses'=>'UserController@type',
    'as'=>'type.submit'
]);
///RUFF?////

Route::group(['prefix'=>'admin','middleware'=>'auth'], function (){


Route::get('/schemeOfStudies', [//admin
    'uses'=>'SchemeOfStudyController@index',
    'as'=>'schemes'
]);
    Route::get('/studentslist', [//admin
        'uses'=>'UserController@index',
        'as'=>'admin.studentslist'
    ]);
    Route::get('/StudentDelete/{id}', [//admin
        'uses'=>'UserController@destroy',
        'as'=>'student.delete'
    ])->middleware('admin');

    Route::get('/Profile', [//admin
        'uses'=>'UserController@adminprofile',
        'as'=>'admin.profile'
    ]);

    Route::get('/batchadvisorlist', [//admin
        'uses'=>'UserController@batchadvisorindex',
        'as'=>'batchadvisorslist'
    ]);
    Route::get('/batchadvisorDelete/{id}', [//admin
        'uses'=>'UserController@destroy',
        'as'=>'batchadvisor.delete'
    ])->middleware('admin');

Route::get('/SchemeDelete/{id}', [//admin
    'uses'=>'SchemeOfStudyController@destroy',
    'as'=>'scheme.delete'
])->middleware('admin');
Route::get('/SchemeEdit/{id}', [//admin
    'uses'=>'SchemeOfStudyController@edit',
    'as'=>'scheme.edit'
]);
Route::post('/SchemeOfStudy/update/{id}', [//admin
    'uses'=>'SchemeOfStudyController@update',
    'as'=>'scheme.update'
]);
Route::get('/courses/{id}', [//admin
    'uses'=>'CoursesController@index',
    'as'=>'courses'
]);
Route::get('/Courses/Delete/{id}', [//admin
    'uses'=>'CoursesController@destroy',
    'as'=>'course.delete'
]);
Route::get('/Courses/Edit/{id}/{scheme_id}', [//admin
    'uses'=>'CoursesController@edit',
    'as'=>'course.edit'
]);
Route::post('/Courses/update/{id}/{scheme_id}', [//admin
    'uses'=>'CoursesController@update',
    'as'=>'course.update'
]);

});//end of Route Group

Route::group(['prefix'=>'student','middleware'=>'auth'], function (){

    Route::get('/Profile', [//admin
        'uses'=>'UserController@studentprofile',
        'as'=>'student.profile'
    ]);

Route::get('/schemeOfStudy/student', [//Student
        'uses'=>'CoursesListController@index',
        'as'=>'courseslist'
]);
Route::get('/schemeOfStudy2', [
    'uses'=>'CoursesListController@shift',
    'as'=>'shiftcourses'
]);
Route::get('/Registercourse/{id}', [
    'uses'=>'RegisteredController@store',
    'as'=>'courseslist.registered'
]);
Route::get('/Passedcourse/{id}', [
    'uses'=>'PassedController@store',
    'as'=>'courseslist.passed'
]);
Route::get('/Pendingcourse/{id}', [
    'uses'=>'PendingController@store',
    'as'=>'courseslist.pending'
]);
Route::get('/PendingCourses', [
    'uses'=>'PendingController@index',
    'as'=>'student.pendinglist'
]);
Route::get('/PassedCourses', [
    'uses'=>'PassedController@index',
    'as'=>'student.passedlist'
]);
Route::get('/RegisteredCourses', [
    'uses'=>'RegisteredController@index',
    'as'=>'student.registeredlist'
]);

Route::get('/AddToRegistered/{id}', [
    'uses'=>'RegisteredController@addFromPassed',
    'as'=>'addto.registered'
]);
Route::get('/AddToPending/{id}', [
    'uses'=>'PendingController@addFromPassed',
    'as'=>'addto.pending'
]);

Route::get('/PassedDelete/{id}', [
    'uses'=>'PassedController@destroy',
    'as'=>'passed.delete'
]);
Route::get('/AddToRegistered2/{id}', [
    'uses'=>'RegisteredController@addFromPending',
    'as'=>'addto.registered2'
]);
Route::get('/AddToPassed2/{id}', [
    'uses'=>'PassedController@addFromPending',
    'as'=>'addto.passed2'
]);
Route::get('/PendingDelete/{id}', [
    'uses'=>'PendingController@destroy',
    'as'=>'pending.delete'
]);
Route::get('/AddToPending3/{id}', [
    'uses'=>'PendingController@addFromRegistered',
    'as'=>'addto.pending3'
]);
Route::get('/AddToPassed3/{id}', [
    'uses'=>'PassedController@addFromRegistered',
    'as'=>'addto.passed3'
]);
Route::get('/RegisteredDelete/{id}', [
    'uses'=>'RegisteredController@destroy',
    'as'=>'registered.delete'
]);

Route::get('/AddORDropCourses', [
    'uses'=>'AddDropController@index',
    'as'=>'student.dropaddcourse'
]);
    Route::get('/SemesterFreeze', [
        'uses'=>'SemesterFreezeController@index',
        'as'=>'student.semesterfreeze'
    ]);
    Route::post('/SemesterFreeze/store', [
        'uses'=>'SemesterFreezeController@store',
        'as'=>'student.freeze.store'
    ]);


Route::get('/StudentFormStore/{code}/{title}/{credit}/{status}', [
    'uses'=>'FormController@store',
    'as'=>'student.form.store'
]);
Route::get('/StudentForm/', [
    'uses'=>'FormController@index',
    'as'=>'student.form.index'
]);
Route::get('/StudentFormDelete/{id}', [//delete just 1 row
    'uses'=>'FormController@destroy',
    'as'=>'student.form.delete'
]);
    Route::get('/StudentFormDestroy', [//deleting entire form of particular user(Auth).
        'uses'=>'FormController@delete',
        'as'=>'student.form.destroy'
    ]);
Route::get('/StudentFormAddRegistered/', [
    'uses'=>'FormController@addRegisteredCourses',
    'as'=>'student.form.addregistered'
]);
Route::get('/StudentFormSend/', [
    'uses'=>'BatchFormslistController@store',
    'as'=>'student.form.send'
]);
Route::post('/StudentForm/Send2/', [
    'uses'=>'BatchFormslistController@store',
    'as'=>'student.form.send2'
]);

Route::get('/BatchadvisorFormStore/', [//student
        'uses'=>'BatchFormController@store',
        'as'=>'batchadvisor.form.store'
]);

    Route::get('/Student/SpecialRequest/', [//student
        'uses'=>'SpecialRequestController@index',
        'as'=>'student.specialrequest'
    ]);
    Route::post('/SpecialRequest/store', [
        'uses'=>'SpecialRequestController@store',
        'as'=>'student.specialrequest.store'
    ]);


});//end of Route Group

Route::group(['prefix'=>'batchadvisor','middleware'=>'auth'], function (){

Route::get('/BatchadvisorFormsList/', [//batchadvisor
    'uses'=>'BatchFormslistController@index',
    'as'=>'batch.formlist'
]);

Route::get('/Batchadvisor_StudentsForm/{std_id}/{id}', [//batchadvisor
    'uses'=>'BatchFormController@index',
    'as'=>'batchadvisor.form.index'
]);
Route::get('/Batchadvisor_StudentsFormListDelete/{std_id}/{id}', [//batchadvisor
    'uses'=>'BatchFormslistController@destroy',
    'as'=>'batchadvisor.form.delete'
]);
Route::get('/Batchadvisor/SemesterFreeze/', [//batchadvisor
        'uses'=>'SemesterFreezeController@batchindex',
        'as'=>'batch.semesterfreezelist'
]);
    Route::get('/Batchadvisor/SemesterFreezeList/delete/{id}', [//batchadvisor
        'uses'=>'SemesterFreezeController@destroy',
        'as'=>'batchadvisor.freeze.delete'
    ]);
    Route::get('/SpecialRequest/', [//student
        'uses'=>'SpecialRequestController@batchindex',
        'as'=>'batch.specialrequest'
    ]);
    Route::get('/SpecialRequest/delete/{id}', [//batchadvisor
        'uses'=>'SpecialRequestController@destroy',
        'as'=>'batchadvisor.specialrequest.delete'
    ]);

    Route::get('/Profile', [//admin
        'uses'=>'UserController@adminprofile',//using adminprofile because both are same
        'as'=>'batchadvisor.profile'
    ]);



});//end of Route Group





