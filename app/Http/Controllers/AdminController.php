<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function upload(Request $request){
        $path = $request->file('avt');
        echo $path->getATime();
        echo date("Y-m-d H:i:s", '1657730625');
//        dd($path);
    }
}
