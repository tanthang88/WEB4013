<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Posts;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'trang chủ';
        $dataPostNewsBanner = Posts::whereIsActive(true)->orderBy('id', 'desc')->take(4)->get();
        $dataPostNews = Posts::whereIsActive(true)->orderBy('id', 'desc')->limit(10)->get();
        $listCategories = Categories::with('subCategories')->get();
        $listCommentsBanner = Comments::with('post','user')->limit(6)->orderBy('id', 'desc')->get();
//        $posts = Posts::with('categories')->get();
        $dataPosts = [];
            foreach ($listCategories as $cate){
                    $dataPosts[] = array($cate->name => Posts::whereCategoriesId($cate->id)->orderBy('id', 'desc')->take(6)->get());
            }
        return view('client.index', compact('title','dataPostNewsBanner', 'listCategories', 'listCommentsBanner', 'dataPosts','dataPostNews'));
    }
    public function getCategories()
    {
        $listCategories = Categories::with('subCategories');
        return view('layouts.client.partials.navbar', compact('listCategories'));
    }
}
