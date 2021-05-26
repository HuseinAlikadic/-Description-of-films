<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmoviInformacijeController;
use App\Http\Controllers\ZivotinjeInformacijeController;


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

Route::get('/', [FilmoviInformacijeController::class, 'prikazi_home']);
Route::get('/prikazi_filmove_stranica', [FilmoviInformacijeController::class, 'prikazi_filmove']);
Route::get('/prikazi_zivotinje', [ZivotinjeInformacijeController::class, 'prikazi_sve_zivotinje']);