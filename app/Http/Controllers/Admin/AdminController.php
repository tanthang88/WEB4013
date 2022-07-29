<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
//        $pro = DB::table('product')->orderBy('id', 'desc')->paginate(4);
//        $pro->withPath('admin/product');
//        $pro->withQueryString();
//        $pro->fragment("product");
//        dd($pro);
/*
        foreach ($pdo as $pqo){
            echo $pqo->product_name."<br>";
        }
        dd($pdo);*/
//        return view('admin.dashboard')->with('pro',$pro);
        return view('admin.dashboard');
    }

    public function upload(Request $request){
//        $file = $request->file('avt');

//        if (! $request->hasFile('avatar')) {
//            dd('no file');
//        } else {
//            $path = $request->file('avatar')->store('avatars');
//            dd($path);
//        }

//        echo date("Y-m-d H:i:s", '1657734292');


        /*$path = $request->file('avatar')->store('public');
        dd($path);*/
//        dd($request->file('avatar'));
        return $request->file('avatar')->store('public');
    }
}
