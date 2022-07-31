<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\PurchaseOrderC;
use App\Http\Controllers\admin\ProductsC;

use App\Http\Controllers\user\UserProductsC;
use App\Http\Controllers\user\UserSaleOrderC;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('admin/products', ProductsC::class);
Route::apiResource('admin/purchase_order', PurchaseOrderC::class);

Route::apiResource('user/products', UserProductsC::class)->only([
    'index', 'show'
]);
Route::apiResource('user/sale_order', UserSaleOrderC::class);