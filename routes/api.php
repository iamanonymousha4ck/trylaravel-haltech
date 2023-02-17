<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\DistrictController;

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

// api method = get, post, put, delete
Route::get('list-province', [ProvinceController::class, 'listProvince']);
Route::post('add-province', [ProvinceController::class, 'addProvince'])->name('add.province');
Route::put('edit-province/{id}', [ProvinceController::class, 'editProvince'])->name('edit.province');
Route::delete('delete-province/{id}', [ProvinceController::class, 'deleteProvince'])->name('delete.province');

Route::get('list-district', [DistrictController::class, 'listDistrict']);
Route::post('add-district', [DistrictController::class, 'addDistrict'])->name('add.district');
Route::put('edit-district/{id}', [DistrictController::class, 'editDistrict'])->name('edit.district');
Route::delete('delete-province/{id}', [DistrictController::class, 'deleteDistrict'])->name('delete.district');
