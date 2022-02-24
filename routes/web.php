<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/home/reward/{id?}', [HomeController::class, 'getReward'])->name('home.reward');
Route::get('/home/punishment/{id?}', [HomeController::class, 'getPunishment'])->name('home.punishment');
Route::get('/home/get-all', [HomeController::class, 'getAll'])->name('home.get-all');

Route::get('/home/config-cache', [HomeController::class, 'configCache'])->name('home.config-cache');
Route::get('/home/config-clear', [HomeController::class, 'configClear'])->name('home.config-clear');
Route::get('/home/optimize-clear', [HomeController::class, 'optimizeClear'])->name('home.optimize-clear');
Route::get('/home/migrate-fresh', [HomeController::class, 'migrateFresh'])->name('home.migrate-fresh');
Route::get('/home/migrate', [HomeController::class, 'migrate'])->name('home.migrate');
Route::get('/home/migrate-rollback', [HomeController::class, 'migrateRollback'])->name('home.migrate-rollback');
Route::get('/home/optimize', [HomeController::class, 'optimize'])->name('home.optimize');

