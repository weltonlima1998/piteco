<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RelatorioController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::get('/perfil', [LoginController::class, 'perfil'])->name('perfil');
    Route::post('/perfil_action', [LoginController::class, 'perfil_action'])->name('perfil_action');

    Route::get('categoria', [CategoriaController::class, 'categoria'])->name('categoria');
    Route::post('categoria_action', [CategoriaController::class, 'categoria_action'])->name('categoria_action');
    Route::get('categoria/gerenciar', [CategoriaController::class, 'gerenciar'])->name('gerenciar_categoria');

    Route::get('/add', [EntradaController::class, 'add'])->name('add');
    Route::post('/add_action', [EntradaController::class, 'add_action'])->name('add_action');
    Route::get('/agendamento', [EntradaController::class, 'inserirDespesasFixas'])->name('fixas');

    Route::get('extrado', [EntradaController::class, 'extrado'])->name('extrado');
    Route::get('/extrado/editar/{tipo}/{id}', [EntradaController::class, 'editar'])->name('editar_extrado');
    Route::get('/extrado/excluir/{tipo}/{id}', [EntradaController::class, 'excluir'])->name('excluir_extrado');

    Route::get('relatorio', [RelatorioController::class, 'index'])->name('relatorio');
    Route::get('relatorio/{mes}',[RelatorioController::class, 'show'])->name('relatorio.show');


});


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login_action', [LoginController::class, 'login_action'])->name('login_action');
Route::post('cadastro_action', [LoginController::class, 'cadastro_action'])->name('cadastro_action');
Route::get('/logout', [LoginController::class, 'logout_action'])->name('logout_action');

Route::get('/robo', [LoginController::class, 'robo'])->name('robo');
