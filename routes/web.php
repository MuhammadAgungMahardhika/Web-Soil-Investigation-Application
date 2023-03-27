<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SondirController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('tes', [SondirController::class, 'index']);
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', [ProjectController::class, 'index'])->name('dashboard');
    Route::get('/detail/{id}', [ProjectController::class, 'detail'])->name('detail');
    Route::get('/sondir/{id}', [ProjectController::class, 'sondir'])->name('sondir');
    Route::group(['prefix' => 'components', 'as' => 'components.'], function () {
        Route::get('/alert', function () {
            return view('admin.component.alert');
        })->name('alert');
        Route::get('/accordion', function () {
            return view('admin.component.accordion');
        })->name('accordion');
    });
});
