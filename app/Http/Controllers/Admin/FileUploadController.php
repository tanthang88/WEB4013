<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function storeFormUpload(Request $request){
        $uploadedFileUrl = cloudinary()->upload($request->file('upload')->getRealPath(),
            ['folder' => 'WEB4013/PostsContentImage'])
            ->getSecurePath();
        return response()->json([
        'url'=> $uploadedFileUrl
        ]);
    }
    public static function storeUploadImagePost($file){
        return cloudinary()->upload($file->getRealPath(), ['folder'=>'WEB4013/PostsImage'])->getSecurePath();
    }
}
