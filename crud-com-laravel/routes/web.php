<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index']) -> name('users.index');
Route::get('/users/create', [UserController::class, 'create']) -> name('users.create');  //Para quando se cria uma view com form para cadastrar os users
Route::post('/users', [UserController::class, 'store']) -> name('users.store');  //Para armazenar os dados, que vieram da view (armazena o que vem do create)
Route::get('/users/{user}', [UserController::class, 'show']) -> name('users.show');  //Para mostrar os dados, que vieram da BD (armazenados  com o store)
Route::get('/users/{user}/edit', [UserController::class, 'edit']) -> name('users.edit');  //Para mostrar formulario para fazer o update
Route::put('/users/{user}', [UserController::class, 'update']) -> name('users.update');  //Para fazer o update em si.
Route::delete('/users/{user}', [UserController::class, 'destroy']) -> name('users.destroy');  //Para remover os dados

