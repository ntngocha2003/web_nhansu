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

Route::get('departments/{id}',[ApiDepartmentController::class,'show'])->where(['id'=>'[0-9]+']);

Route::get('departmentAll',[ApiDepartmentController::class,'showAll']);

Route::post('department/store',[ApiDepartmentController::class,'store']);

Route::put('department/update/{id}',[ApiDepartmentController::class,'update']) ;

Route::delete('department/delete/{id}',[ApiDepartmentController::class,'delete'])->where(['id'=>'[0-9]+']);

Route::delete('department/deleteMultiple',[ApiDepartmentController::class,'deleteMultiple'])->where(['id'=>'[0-9]+']);

// position

Route::get('Positions',[ApiPositionController::class,'index']);

Route::get('Positions/{id}',[ApiPositionController::class,'show'])->where(['id'=>'[0-9]+']);

Route::get('PositionAll',[ApiPositionController::class,'showAll']);

Route::post('storePosition',[ApiPositionController::class,'store']);

Route::put('updatePosition/{id}',[ApiPositionController::class,'update']) ;

Route::delete('deletePosition/{id}',[ApiPositionController::class,'delete'])->where(['id'=>'[0-9]+']);

Route::delete('deletePositionAll',[ApiPositionController::class,'deleteAll'])->where(['id'=>'[0-9]+']);

// Specialized

Route::get('Specializeds',[ApiSpecializedController::class,'index']);

Route::get('Specializeds/{id}',[ApiSpecializedController::class,'show'])->where(['id'=>'[0-9]+']);

Route::get('SpecializedAll',[ApiSpecializedController::class,'showAll']);

Route::post('storeSpecialized',[ApiSpecializedController::class,'store']);

Route::put('updateSpecialized/{id}',[ApiSpecializedController::class,'update']) ;

Route::delete('deleteSpecialized/{id}',[ApiSpecializedController::class,'delete'])->where(['id'=>'[0-9]+']);

Route::delete('deleteSpecializedAll',[ApiSpecializedController::class,'deleteAll'])->where(['id'=>'[0-9]+']);

// Level

Route::get('Levels',[ApiLevelController::class,'index']);

Route::get('Levels/{id}',[ApiLevelController::class,'show'])->where(['id'=>'[0-9]+']);

Route::get('LevelAll',[ApiLevelController::class,'showAll']);

Route::post('storeLevel',[ApiLevelController::class,'store']);

Route::put('updateLevel/{id}',[ApiLevelController::class,'update']) ;

Route::delete('deleteLevel/{id}',[ApiLevelController::class,'delete'])->where(['id'=>'[0-9]+']);

Route::delete('deleteLevelAll',[ApiLevelController::class,'deleteAll'])->where(['id'=>'[0-9]+']);

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

