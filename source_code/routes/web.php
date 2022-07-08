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
    return view('welcome');
});

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

/*Route::group(array('middleware'=>'is_admin'),function()
{
	Route::get('/students', [App\Http\Controllers\StudentController::class, 'students'])->name('students_list');
});*/

Route::group(array('middleware'=>'auth'),function()
{
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/admin/students', [App\Http\Controllers\StudentController::class, 'index'])->name('students');
	Route::get('/admin/new_student', [App\Http\Controllers\StudentController::class, 'create'])->name('create');
	Route::post('/admin/save_student', [App\Http\Controllers\StudentController::class, 'store'])->name('save');
	Route::get('/admin/edit_student/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('edit');
	Route::post('/admin/update/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('update');
	Route::get('/admin/delete/{id}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('destroy');
});
Auth::routes();
Route::get('/students', [App\Http\Controllers\StudentController::class, 'students'])->name('students_list');