<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKImageUploadController extends Controller {

    public function uploadImage(Request $request)
    {  

        $file = $request->upload;
        $fileName = $file->getClientOriginalName();
        $new_name = time().$fileName;
        $dir = public_path("/uploads/content_img/");
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        $file->move(public_path('uploads/blog/'), $new_name);
        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $msg = 'Image uploaded successfully';
        $url = asset('public/uploads/blog/'.$new_name); 
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
        echo  $response;
    }
}