<?php
// Admin Controller
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\SubCategoriesController;

// Client Controller
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PostsController as PostsClient;

use App\Http\Controllers\Admin\FileUploadController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index']);

Route::get('categories/{categories}.{idCategories}',[PostsClient::class, 'showListPostsAtCategories'])->name('client.posts.categories');
Route::get('{postTitle}-{postID}.html',[PostsClient::class, 'showPost']);






Route::group(['prefix'=>'admin', 'middleware'=>['auth']],function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('Dashboard');
    /*Route::resource('categories',CategoriesController::class)->names([
        'index'=>'categories.index'
    ]);*/
    Route::get('categories', [CategoriesController::class, 'index'])->name('Categories');
    Route::get('categories/{id}/edit', [CategoriesController::class, 'showPageEdit'])->name('EditCategories');
    Route::post('categories/delete', [CategoriesController::class, 'deleteCategories'])->name('DeleteCategories');
    Route::post('categories/update', [CategoriesController::class, 'updateCategories'])->name('UpdateCategories');

    Route::get('sub-categories', [SubCategoriesController::class, 'index'])->name('SubCategories');
    Route::post('sub-categories/delete', [SubCategoriesController::class, 'deleteSubCategories'])->name('DeleteSubCategories');
    Route::post('sub-categories/update', [SubCategoriesController::class, 'updateSubCategories'])->name('UpdateSubCategories');
    Route::post('sub-categories/categories', [SubCategoriesController::class, 'getDataCategories']);

    Route::get('posts', [PostsController::class, 'index'])->name('Posts');
    Route::get('posts/{idPost}/edit', [PostsController::class, 'showFormEditPost'])->name('EditPost');
    Route::get('posts/add', [PostsController::class, 'showFormAddPost'])->name('FormAddPost');
    Route::get('posts/{idPost}/delete', [PostsController::class, 'handleDeletePost'])->name('DeletePost');
    Route::post('posts/add', [PostsController::class, 'handleAddPost'])->name('AddPost');
    Route::post('posts/{idPost}/edit', [PostsController::class, 'handleUpdatePost'])->name('UpdatePost');


    Route::post('image/upload', [FileUploadController::class, 'storeFormUpload'])->name('UploadImage');
});
