<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\WordController;
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

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/{slugWord}', [IndexController::class, 'show'])->name('word.show');

Route::resources([
    'words' => WordController::class,
]);

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/template', function () {
        return view('admin.template-admin');
    })->name('template');
});