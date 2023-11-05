<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminApplicationController;
use App\Http\Controllers\adminHomeController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/api/users',[UserController::class,'index']);
Route::post('/api/users',[UserController::class,'store']);
Route::post('/api/users',[UserController::class,'store']);
Route::put('/api/users/{user}',[UserController::class,'update']);

Route::delete('/api/users/{id}',[UserController::class,'destroy']);

Route::post('/users', 'UserController@store')->name('user.store');

Route::get('{view}',AdminApplicationController::class)->where('view','(.*)');
/* Route::prefix('admin/')->name('admin.')->controller(adminHomeController::class)->group(function(){
Route::get('dashboard','dashboard')->name('.dashboard');
}); */