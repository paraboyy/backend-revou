<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\OlahDataController;


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

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);

Route::get('/data', [OlahDataController::class, 'index']);
Route::get('/total-customer', [OlahDataController::class, 'getTotalCustomers']);
Route::get('/total-sales', [OlahDataController::class, 'getTotalSales']);
Route::get('/total-quantity', [OlahDataController::class, 'getTotalQuantity']);
Route::get('/total-profit', [OlahDataController::class, 'getTotalProfit']);
Route::get('/sales-pertahun', [OlahDataController::class, 'getTotalSalesPerYear']);
Route::get('/sales-segment', [OlahDataController::class, 'getTotalSalesBySegment']);
Route::get('/sales-shipmode', [OlahDataController::class, 'getTotalSalesByShipmode']);


Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('getuser', [ApiController::class, 'get_user']);
    
    # Route::get('/data', [OlahDataController::class, 'index']);
});
