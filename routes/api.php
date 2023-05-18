<?php

use App\Http\Controllers\Api\ApiEmployeeController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get("/employees", [ApiEmployeeController::class,'index']);
Route::get("/employees/create", [ApiEmployeeController::class,'create']);
Route::get("/employees/{id}/edit", [ApiEmployeeController::class,'edit']);
Route::put("/employees/{id}/update", [ApiEmployeeController::class,'update']);
Route::delete("/employees/{id}", [ApiEmployeeController::class,'destroy']);
