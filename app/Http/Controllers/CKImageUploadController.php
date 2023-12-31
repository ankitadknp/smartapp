<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File,DB;
use App\PublicFeedImage;
use App\User;

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
        $msg = 'File uploaded successfully';
        $url = asset('public/uploads/blog/'.$new_name); 
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
        echo  $response;
    }
    public function image_delete(Request $request) 
    {
        $id = $request->get("id");

        $find_record = PublicFeedImage::find($id);

        $response = array("success" => false, "message" => "Problem while deleting this record");

        if ($find_record) {
            $destinationPath = public_path("/uploads/");
            $new_path = substr($find_record->image, strpos($find_record->image, "public_feed/") );  
            $image_path = $destinationPath.$new_path;

            if (File::exists($image_path)) {
                unlink($image_path);
            }

            $find_record->delete();

            $response['success'] = true;
            $response['message'] = "image deleted successfully";
        }
        return $response;
    }

    public function block_user(Request $request)
    {
        $id = $request->get('id');
        $block_flag = $request->get('block_flag');

        $userRes = User::where('id',$id)->update([
            'is_block' => $block_flag,
        ]);


        if ($block_flag == 1) {
            $message = 'User Block Successfully';
        } else {
            $message = 'User Unblock Successfully';
        }

        $response['success'] = true;
        $response['message'] = $message;

        return $response;
    }
}