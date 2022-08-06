<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RuleAddPost;
use App\Http\Requests\RuleUpdatePost;
use App\Models\Posts;
use App\Models\SubCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\FileUploadController as FileUploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostsController extends Controller
{
    public function index()
    {
        $title = "quản lí bài viết";
        $listPosts = Posts::with(['user', 'subCategories'])->orderByDesc('created_at')->paginate(5);
        return view('admin.posts', compact('listPosts', 'title'));
    }
    public function showFormEditPost(int $idPost)
    {
        $title = 'cập nhật bài viết';
        $dataSubCategories = SubCategories::all();
        $dataPost = Posts::whereId($idPost)->with(['user','subCategories'])->get();
        return view('admin.pages.posts.edit', compact('title', 'dataSubCategories', 'dataPost'));
    }
    public function showFormAddPost()
    {
        $title = 'thêm bài viết mới';
        $dataSubCategories = SubCategories::all();
        return view('admin.pages.posts.add', compact('dataSubCategories','title'));
    }

    public function handleAddPost(RuleAddPost $request)
    {
        $imageUrl = NULL;
        if ($request->file('image')){
            $imageUrl = FileUploadController::storeUploadImagePost($request->file('image'));
        }
        Posts::create([
            'title'=>$request->title,
            'short_content'=>$request->short_content,
            'content'=>$request->input('content'),
            'image'=>$imageUrl,
            'slug'=>Str::slug($request->title),
            'is_active'=>$request->active,
            'sub_categories_id'=>$request->subcategories,
            'user_id'=> 1
        ]);
        return back()->with('success','Thêm bài viết mới thành công');
    }

    public function handleUpdatePost(RuleUpdatePost $request, int $idPost)
    {
        $validateFormUpdate = $request->validated();
        if ($request->file('image')){
            $imageUrl = FileUploadController::storeUploadImagePost($request->image);
            Posts::whereId($idPost)->update([
                'title'=>$request->title,
                'content'=>$request->input('content'),
                'short_content'=>$request->short_content,
                'image'=>$imageUrl,
                'slug'=>Str::slug($request->title),
                'is_active'=>$request->active,
                'sub_categories_id'=>$request->subcategories
            ]);
        } else {
            Posts::whereId($idPost)->update(
                [
                    'title'=>$request->title,
                    'content'=>$request->input('content'),
                    'slug'=>Str::slug($request->title),
                    'is_active'=>$request->active,
                    'sub_categories_id'=>$request->subcategories
                ]
            );
        }
        return back()->with('success','Cập nhật bài viết thành công!');
    }
    public function handleDeletePost(int $idPost)
    {
        if (Posts::destroy($idPost)){
            return back()->with('success','Xóa bài viết thành công!');
        } else {
            return back()->with('error','Xóa bài viết không thành công! Vui lòng kiểm tra lại!');
        }

    }
}
