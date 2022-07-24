<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SubCategoriesController extends Controller
{
    public function index(){
        $listAllSubCategories = SubCategories::with('categories')->paginate(5);
       return view('admin.sub-categories',['listAllSubCategories'=>$listAllSubCategories,'title'=>Str::title("quản lí chuyên mục")]);
    }
    public function deleteSubCategories(Request $request){
        $request->validate([
            'id'=>'required'
        ]);
        if ($request->input('id')){
            SubCategories::destroy($request->input('id'));
            return response()->json(['message'=>'Xóa chuyên mục thành công'],200);
        }
    }
    public function updateSubCategories(Request $request){
        $request->validate([
            'categories'=>['required'],
            'name'=>['required'],
            'id'=>['required']
        ]);
        SubCategories::where('id',$request->id)
            ->update(['name'=>$request->name, 'url'=>Str::slug($request->name), 'categories_id'=>$request->categories]);
        return response()->json(["success"=>"Cập nhật chuyên mục thành công!"],200);
    }
    public function getDataCategories(Request $request){
        $request->validate([
            'id'=>['required']
        ]);
        $data = Categories::all();
        $categories = Categories::whereId($request->id)->get();
        return response()->json(["message"=>"Success", "data"=>$data,"categories"=> $categories],200);
    }
}
