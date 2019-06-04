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

Route::get('test', function(){
    return 'Permiso concedido';
})->middleware('role:administrador-paciente');

Route::get('/', function(){
    return view('welcome');
});

Route::get('home', function(){
    return view('home');
})->middleware('auth');

Auth::routes(['verify' => true]);

//Backoffice
Route::group(['middleware'=> ['auth'], 'as' => 'backoffice.'], function(){
    Route::get('admin', 'AdminController@show')->name('admin.show');

    Route::resource('user', 'UserController');

    Route::get('user_import', 'UserController@import')->name('user.import');
    Route::post('user_make_import', 'UserController@make_import')->name('user.make_import');


    Route::get('user/{user}/assign_role', 'UserController@assign_role')->name('user.assign_role');
    Route::post('user/{user}/role_assignment', 'UserController@role_assignment')->name('user.role_assignment');
    Route::get('user/{user}/assign_permission', 'UserController@assign_permission')->name('user.assign_permission');
    Route::post('user/{user}/permission_assignment', 'UserController@permission_assignment')->name('user.permission_assignment');
    route::resource('role', 'RoleController');
    route::resource('permission', 'PermissionController');
});

Route::group(['as' => 'frontoffice.'], function(){
    Route::get('profile', 'UserController@profile')->name('user.profile');
    Route::get('patient/cite', 'PatientController@cite')->name('patient.cite');
});
