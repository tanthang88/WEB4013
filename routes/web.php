<?php

use App\Models\Categories;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
/*List Controller*/
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubCategoriesController;



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
Route::prefix('admin')->group(function (){
    Route::get('dashboard',[AdminController::class, 'index'])->name('Dashboard');
    /*Route::resource('categories',CategoriesController::class)->names([
        'index'=>'categories.index'
    ]);*/
    Route::get('categories',[CategoriesController::class, 'index'])->name('Categories');
    Route::get('categories/{id}/edit',[CategoriesController::class, 'showPageEdit'])->name('EditCategories');
    Route::post('categories/delete',[CategoriesController::class, 'deleteCategories'])->name('DeleteCategories');
    Route::post('categories/update',[CategoriesController::class, 'updateCategories'])->name('UpdateCategories');

    Route::get('sub-categories',[SubCategoriesController::class,'index'])->name('SubCategories');
    Route::post('sub-categories/delete',[SubCategoriesController::class,'deleteSubCategories'])->name('DeleteSubCategories');
    Route::post('sub-categories/update',[SubCategoriesController::class,'updateSubCategories'])->name('UpdateSubCategories');
    Route::post('sub-categories/categories',[SubCategoriesController::class, 'getDataCategories']);
});

