<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/roles', [App\Http\Controllers\PermissionController::class, 'Permission']);
Route::get('/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
Route::post('/role-store', [App\Http\Controllers\RoleController::class, 'store']);
Route::delete('/delete/{role}',[App\Http\Controllers\RoleController::class,'destroy']);

Route::get('/permission', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index');
Route::post('/permission-store', [App\Http\Controllers\PermissionController::class, 'add']);



Route::get('/users',[App\Http\Controllers\UserController::class,'index'])->name('user.index');
Route::post('/user-create',[App\Http\Controllers\UserController::class,'create'])->name('user.create');