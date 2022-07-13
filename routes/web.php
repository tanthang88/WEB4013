<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
/*List Controller*/
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
Route::group(['prefix'=>'admin'], function (){
    Route::get('/dashboard',[AdminController::class, 'index'])->name('dashboard');
    Route::get('/upload', function (){
        return view('admin.upload');
    });
    Route::post('/upload', [AdminController::class, 'upload'])->name('upload');
});

