<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiAuthController;
use App\Http\Controllers\api\ApiDepartmentController;
use App\Http\Controllers\api\ApiPositionController;
use App\Http\Controllers\api\ApiSpecializedController;
use App\Http\Controllers\api\ApiLevelController;
use App\Http\Controllers\api\ApiSalaryController;
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

Route::middleware('auth:sanctum')->group(function(){
// department

Route::get('Departments',[ApiDepartmentController::class,'index']);

Route::get('department/{id}',[ApiDepartmentController::class,'show'])->where(['id'=>'[0-9]+']);

Route::get('departmentAll',[ApiDepartmentController::class,'showAll']);

Route::post('department/store',[ApiDepartmentController::class,'store']);

Route::put('department/update/{id}',[ApiDepartmentController::class,'update']) ;

Route::delete('department/delete/{id}',[ApiDepartmentController::class,'delete'])->where(['id'=>'[0-9]+']);

Route::delete('department/deleteMultiple',[ApiDepartmentController::class,'deleteMultiple'])->where(['id'=>'[0-9]+']);

// position

Route::get('Positions',[ApiPositionController::class,'index']);

Route::get('position/{id}',[ApiPositionController::class,'show'])->where(['id'=>'[0-9]+']);

Route::get('positionAll',[ApiPositionController::class,'showAll']);

Route::post('position/store',[ApiPositionController::class,'store']);

Route::put('position/update/{id}',[ApiPositionController::class,'update']) ;

Route::delete('position/delete/{id}',[ApiPositionController::class,'delete'])->where(['id'=>'[0-9]+']);

Route::delete('position/deleteMultiple',[ApiPositionController::class,'deleteMultiple'])->where(['id'=>'[0-9]+']);

// Specialized

Route::get('Specializeds',[ApiSpecializedController::class,'index']);

Route::get('specialized/{id}',[ApiSpecializedController::class,'show'])->where(['id'=>'[0-9]+']);

Route::get('specializedAll',[ApiSpecializedController::class,'showAll']);

Route::post('specialized/store',[ApiSpecializedController::class,'store']);

Route::put('specialized/update/{id}',[ApiSpecializedController::class,'update']) ;

Route::delete('specialized/delete/{id}',[ApiSpecializedController::class,'delete'])->where(['id'=>'[0-9]+']);

Route::delete('specialized/deleteMultiple',[ApiSpecializedController::class,'deleteMultiple'])->where(['id'=>'[0-9]+']);

// Level

Route::get('Levels',[ApiLevelController::class,'index']);

Route::get('level/{id}',[ApiLevelController::class,'show'])->where(['id'=>'[0-9]+']);

Route::get('levelAll',[ApiLevelController::class,'showAll']);

Route::post('level/store',[ApiLevelController::class,'store']);

Route::put('level/update/{id}',[ApiLevelController::class,'update']) ;

Route::delete('level/delete/{id}',[ApiLevelController::class,'delete'])->where(['id'=>'[0-9]+']);

Route::delete('level/deleteMultiple',[ApiLevelController::class,'deleteMultiple'])->where(['id'=>'[0-9]+']);

// Salary

Route::get('Salarys',[ApiSalaryController::class,'index']);

Route::get('Salarys/{id}',[SalarylController::class,'show'])->where(['id'=>'[0-9]+']);

Route::get('SalaryAll',[ApiSalaryController::class,'showAll']);

Route::post('storeSalary',[ApiSalaryController::class,'store']);

Route::put('updateSalary/{id}',[ApiSalaryController::class,'update']) ;

Route::delete('deleteSalary/{id}',[ApiSalaryController::class,'delete'])->where(['id'=>'[0-9]+']);

Route::delete('deleteSalaryAll',[ApiSalaryController::class,'deleteAll'])->where(['id'=>'[0-9]+']);

// Employee

});
// login

Route::post('login',[ApiAuthController::class,'login']);

