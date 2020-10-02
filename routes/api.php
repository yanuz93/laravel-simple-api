<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ConnoteController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('package', [PackageController::class, 'store'])->name('storePackage');
Route::get('package', [PackageController::class, 'index'])->name('indexPackage');
Route::get('package/{id}', [PackageController::class, 'show'])->name('showPackage');
Route::put('package/{id}', [PackageController::class, 'update'])->name('updatePackage');
Route::patch('package/{id}', [PackageController::class, 'patch'])->name('patchPackage');
Route::delete('package/{id}', [PackageController::class, 'delete'])->name('deletePackage');

Route::post('connote', [ConnoteController::class, 'store']);
Route::get('connote', [ConnoteController::class, 'index']);
Route::get('connote/{id}', [ConnoteController::class, 'show']);
