<?php

use App\Http\Controllers\TuduController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('tudu', TuduController::class);

/* Route::post('/tudu/add', [TuduController::class, 'addtudu']); */

Route::get('/tudu/{tudu}/deleteconfirm', [TuduController::class, 'deleteconfirm']);