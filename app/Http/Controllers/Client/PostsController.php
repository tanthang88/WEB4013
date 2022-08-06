<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\CategoriesRepository;
use App\Models\Posts;

class PostsController extends Controller{
    protected CategoriesRepository $categories;
    protected array|\Illuminate\Database\Eloquent\Collection $listCategories;
    public function __construct( CategoriesRepository $categories)
    {
        $this->categories = $categories;
        $this->listCategories = $this->categories->getAllCategories();
    }

    public function showListPostsAtCategories(string $categories, int $idCategories){
        $listCategories = $this->listCategories;
        $listPosts = Posts::whereCategoriesId($idCategories)->with('categories')->get();
        return view('client.pages.categories', compact('listCategories','listPosts', 'categories'));
    }

    public function showPost(string $postTitle, string $id){
        $title = $postTitle;
        dd($this->categories->getAllCategories());
//        echo $postTitle, $id;
//        return view('client.pages.viewpost', compact('title'));
    }

}
?>
