<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UsersController;

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

Route::get('/', [HomeController::class,'dashboard']);

Route::get('departments/index',[DepartmentController::class,'index'])->name('departmentIndex');
Route::get('departments/create',[DepartmentController::class,'create'])->name('departmentsCreate');
Route::post('departments/store',[DepartmentController::class,'store'])->name('departmentsStore');
Route::get('departments/edit/{id}',[DepartmentController::class,'edit'])->name('departmentsEdit');
Route::post('departments/delete/{id}',[DepartmentController::class,'delete'])->name('departmentsDelete');
Route::post('departments/update/{id}',[DepartmentController::class,'update'])->name('departmentsupdate');

Route::get('users/index',[UsersController::class,'index'])->name('usersIndex');

Route::get('roles/index',function () {
    return view('management.roles.index');
})->name('rolesIndex');

Route::get('permissions/index',function () {
    return view('management.permissions.index');
})->name('permissionsIndex');