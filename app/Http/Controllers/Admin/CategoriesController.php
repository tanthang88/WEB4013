<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.categories', ['allCategories' => Categories::paginate(5), 'title'=>Str::title('quản lí danh mục')]);
    }
    public function showPageEdit(int $id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $category = Categories::find($id);
        return view('admin.pages.categories.edit',['category'=> $category,'title'=>Str::title('cập nhật '.$category->name)]);
    }
    public function deleteCategories(Request $request){
        $request->validate([
           'id'=>'required'
        ]);
        if ($request->input('id')){
            Categories::destroy($request->input('id'));
            return response()->json(['message'=>'Xóa danh mục thành công'],200);
        }
    }
    public function updateCategories(Request $req): \Illuminate\Http\JsonResponse
    {
        $req->validate([
           'name'=>['required', 'unique:categories'],
           'id'=>['required']
        ]);
         Categories::where('id',$req->id)
             ->update(['name'=>$req->name, 'url'=>Str::slug($req->name)]);
        return response()->json(["success"=>"Cập nhật danh mục thành công!"],200);
    }
}
