<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [AuthController::class, 'login'])->name('auth.login');
Route::get('/forgot', [AuthController::class, 'forgot'])->name('auth.forgot');
Route::post('/login_post', [AuthController::class, 'login_post'])->name('auth.login_post');
Route::post('/forgot_post', [AuthController::class, 'forgot_post'])->name('auth.forgot_post');

Route::get('/reset/{token}', [AuthController::class, 'getReset'])->name('auth.reset');
Route::post('/reset/{token}', [AuthController::class, 'postReset'])->name('auth.reset_post');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboards.dashboard');
    Route::get('/admin/customers', [CustomerController::class, 'customers'])->name('customers.customers');
    Route::get('/admin/customers/add', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/admin/customers/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/admin/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}', [CustomerController::class, 'update'])-> name('customers.update');
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']) -> name('customers.destroy');  //Para remover os dados



});

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');




