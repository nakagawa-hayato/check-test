<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [ContactController::class, 'contact']);
Route::post('/confirm/contacts', [ContactController::class, 'confirm']);
Route::post('/confirm', [ContactController::class, 'store']);
Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');

Route::middleware(['auth'])->group(function () {
    Route::get('/auth/admin', [ContactController::class, 'admin'])->name('auth.admin');
    Route::get('/auth/admin/export', [ContactController::class, 'export'])->name('admin.export');
    Route::delete('/auth/admin/{id}', [ContactController::class, 'destroy'])->name('admin.destroy');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');