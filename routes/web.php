<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventosController;

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
    return view('index');
})->name('home');

/* AUTH ROUTES */
Route::get('/auth/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/auth/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');


/* EVENTOS ROUTES */
Route::get('/eventos', [EventosController::class, 'index'])->name('eventos');
Route::get('/eventos/tusEventos', [EventosController::class, 'tusEventos'])->middleware('auth' )->name('tusEventos');
Route::get('/eventos/crear_evento', [EventosController::class, 'crearEvento'])->name('crear_evento');
Route::post('/eventos/guardar_evento', [EventosController::class, 'guardarEvento'])->name('guardar_evento');
Route::get('/eventos/ver_evento/{id}', [EventosController::class, 'verEvento'])->name('ver_evento');
Route::get('/eventos/editar_evento/{id}', [EventosController::class, 'editarEvento'])->name('editar_evento');
Route::put('/eventos/actualizar_evento/{id}', [EventosController::class, 'actualizarEvento'])->name('actualizar_evento');
Route::get('/eventos/eliminar_evento/{id}', [EventosController::class, 'eliminarEvento'])->name('eliminar_evento');


/* ADMIN ROUTES */
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/roles', [AdminController::class, 'roles'])->middleware('auth' )->name('admin.roles');
    Route::get('/admin/editar_rol/{id}', [AdminController::class, 'editar_rol'])->name('admin.editar_rol');
    Route::get('/admin/crear_rol', [AdminController::class, 'crear_rol'])->name('admin.crear_rol');
    Route::post('/admin/crear_rol', [AdminController::class, 'crear_nuevo_rol'])->name('admin.guardar_rol');
    Route::put('/admin/actualizar_rol/{rol}', [AdminController::class, 'actualizar_rol'])->name('admin.actualizar_rol');
    Route::get('/admin/usuarios', [AdminController::class, 'listar_usuarios'])->name('admin.listar_usuarios');
    Route::get('/admin/editar_usuario/{id}', [AdminController::class, 'editar_usuario'])->name('admin.editar_usuario');
    Route::put('/admin/actualizar_usuario/{user}', [AdminController::class, 'actualizar_usuario'])->name('admin.actualizar_usuario');
});