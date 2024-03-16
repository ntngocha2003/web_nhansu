<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiAuthController;
use App\Http\Controllers\api\ApiDepartmentController;
use App\Http\Controllers\api\ApiPositionController;
use App\Http\Controllers\api\ApiSpecializedController;
use App\Http\Controllers\api\ApiLevelController;
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

// login

Route::post('login',[ApiAuthController::class,'login']);

// department

Route::get('Departments',[ApiDepartmentController::class,'index']);

Route::get('Departments/{id}',[ApiDepartmentController::class,'show'])->where(['id'=>'[0-9]+']);

Route::get('DepartmentAll',[ApiDepartmentController::class,'showAll']);

Route::post('storeDepartment',[ApiDepartmentController::class,'store']);

Route::put('updateDepartment/{id}',[ApiDepartmentController::class,'update']) ;

Route::delete('deleteDepartment/{id}',[ApiDepartmentController::class,'delete'])->where(['id'=>'[0-9]+']);

Route::delete('deleteDepartmentAll',[ApiDepartmentController::class,'deleteAll'])->where(['id'=>'[0-9]+']);

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