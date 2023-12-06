<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;




use App\Traits\Common;

class Examplecontroller extends Controller
{
    use Common;
    public function test1(){
        return view("login");
    }
    public function showUpload(){
        return view("upload");
    }
    public function upload(Request $request){
        // return dd($request->image);  
        // $file_extension = $request->image->getClientOriginalExtension();
        // $file_name = time() . '.' . $file_extension;
        // $path = 'assets/images';
        // $request->image->move($path, $file_name);
        // return 'Uploaded';
        $h =$this->uploadFile($request->image,'assets/images');
        return $h ;

    }


    public function editImage(){
        return view("upload");
    }
    public function updateImage(Request $request){
        // return dd($request->image);  
        // $file_extension = $request->image->getClientOriginalExtension();
        // $file_name = time() . '.' . $file_extension;
        // $path = 'assets/images';
        // $request->image->move($path, $file_name);
        // return 'Uploaded';
        $h =$this->updateImage($request->image,'assets/images');
        return $h ;

    }
   
}
