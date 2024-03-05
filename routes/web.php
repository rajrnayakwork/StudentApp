<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Redirect::route('students.index');
});

Route::get('/students',[StudentController::Class,'index'])->name('students.index');
Route::get('/students/create',[StudentController::Class,'create'])->name('students.create');
Route::post('/students',[StudentController::Class,'store'])->name('students.store');

Route::get('/subjects',[SubjectController::Class,'index'])->name('subjects.index');
Route::get('/subjects/create',[SubjectController::Class,'create'])->name('subjects.create');
Route::post('/subjects',[SubjectController::Class,'store'])->name('subjects.store');
Route::get('/subjects/{subject}/edit',[SubjectController::Class,'edit'])->name('subjects.edit');
Route::post('/subjects/update',[SubjectController::Class,'update'])->name('subjects.update');
Route::get('/subjects/{subject}',[SubjectController::Class,'destroy'])->name('subjects.destroy');

Route::get('/citys',[CityController::Class,'index'])->name('citys.index');
Route::get('/citys/create',[CityController::Class,'create'])->name('citys.create');
Route::post('/citys',[CityController::Class,'store'])->name('citys.store');
Route::get('/citys/{city}/edit',[CityController::Class,'edit'])->name('citys.edit');
Route::post('/citys/update',[CityController::Class,'update'])->name('citys.update');
Route::get('/citys/{city}',[CityController::Class,'destroy'])->name('citys.destroy');
