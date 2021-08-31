<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'showformations'])->name('home');
Route::get('/home/formation', [App\Http\Controllers\HomeController::class, 'showformations2'])->name('home.formation');
Route::get('/home/search', [App\Http\Controllers\HomeController::class, 'search'])->name('home.search');
Route::get('/home/profil', [App\Http\Controllers\HomeController::class, 'profil'])->name('home.profil');
Route::get('/home/formations', [App\Http\Controllers\HomeController::class, 'formations'])->name('home.formations');


Route::get('/admin/login',[App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login',[App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::get('/admin',[App\Http\Controllers\AdminController::class,'showformations'])->name('admin.dashboard');

//Route::get('/admin/add',[App\Http\Controllers\AddController::class, 'index'])->name('admin.add');
Route::get('/admin/add',[App\Http\Controllers\AdminController::class, 'addform'])->name('admin.add');
Route::post('/admin/add',[App\Http\Controllers\AdminController::class, 'store'])->name('admin.add.store');
Route::get('/admin/edit',[App\Http\Controllers\AdminController::class, 'editform'])->name('admin.edit.form');
Route::post('/admin/edit',[App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
Route::get('/admin/delete',[App\Http\Controllers\AdminController::class, 'delete'])->name('admin.delete');
Route::get('/admin/formation',[App\Http\Controllers\AdminController::class, 'showformations2'])->name('admin.formation');

Route::post('/home/inscrire',[App\Http\Controllers\HomeController::class, 'inscrire'])->name('home.inscrire');
Route::post('/home/desinscrire',[App\Http\Controllers\HomeController::class, 'desinscrire'])->name('home.desinscrire');

Route::get('/home/benef',[App\Http\Controllers\BenController::class, 'list'])->name('admin.benef');

