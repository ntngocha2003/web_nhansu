<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiAuthController;
use App\Http\Controllers\api\ApiDepartmentController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login',[ApiAuthController::class,'login']);

// department

Route::get('Departments',[ApiDepartmentController::class,'index']);

Route::get('Departments/{id}',[ApiDepartmentController::class,'show'])->where(['id'=>'[0-9]+']);

Route::get('DepartmentAll',[ApiDepartmentController::class,'showAll']);

Route::post('storeDepartment',[ApiDepartmentController::class,'store']);

Route::put('updateDepartment/{id}',[ApiDepartmentController::class,'update']) ;

Route::delete('deleteDepartment/{id}',[ApiDepartmentController::class,'delete'])->where(['id'=>'[0-9]+']);

Route::delete('deleteDepartmentAll',[ApiDepartmentController::class,'deleteAll'])->where(['id'=>'[0-9]+']);
