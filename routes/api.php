<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('storeDepartment',[DepartmentController::class,'storeDepartment']);
Route::get('getDepartments',[DepartmentController::class,'getDepartments']);
Route::post('updateDepartments/{id}',[DepartmentController::class,'updateDepartments']);
Route::post('deleteDepartments/{id}',[DepartmentController::class,'deleteDepartments']);