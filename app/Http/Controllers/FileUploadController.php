<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function storeFormUpload(Request $request){
        $uploadedFileUrl = cloudinary()->upload($request->file('upload')->getRealPath(),
            ['folder' => 'WEB4013/PostsContentImage'])
            ->getSecurePath();
//        $url = $request->file('upload')->storePublicly('images');
        return response()->json([
//            'url'=>'https://icdn.dantri.com.vn/thumb_w/640/2017/1-1510967806416.jpg'
        'url'=> $uploadedFileUrl
        ]);
    }
    public static function storeUploadImagePost($file){
        return cloudinary()->upload($file->getRealPath(), ['folder'=>'WEB4013/PostsImage'])->getSecurePath();
    }
}
