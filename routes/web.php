<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/students',[StudentController::class,'index'])->name('students.index');
Route::get('/students/create',[StudentController::class,'create'])->name('students.create');
Route::post('/students',[StudentController::class,'store'])->name('students.store');
Route::get('/students/{student}/edit',[StudentController::class,'edit'])->name('students.edit');
Route::post('/students/update',[StudentController::class,'update'])->name('students.update');
Route::get('/students/{student}',[StudentController::class,'destroy'])->name('students.destroy');

Route::get('/subjects',[SubjectController::class,'index'])->name('subjects.index');
Route::get('/subjects/create',[SubjectController::class,'create'])->name('subjects.create');
Route::post('/subjects',[SubjectController::class,'store'])->name('subjects.store');
Route::get('/subjects/{subject}/edit',[SubjectController::class,'edit'])->name('subjects.edit');
Route::post('/subjects/update',[SubjectController::class,'update'])->name('subjects.update');
Route::get('/subjects/{subject}',[SubjectController::class,'destroy'])->name('subjects.destroy');

Route::get('/citys',[CityController::class,'index'])->name('citys.index');
Route::get('/citys/create',[CityController::class,'create'])->name('citys.create');
Route::post('/citys',[CityController::class,'store'])->name('citys.store');
Route::get('/citys/{city}/edit',[CityController::class,'edit'])->name('citys.edit');
Route::post('/citys/update',[CityController::class,'update'])->name('citys.update');
Route::get('/citys/{city}',[CityController::class,'destroy'])->name('citys.destroy');
