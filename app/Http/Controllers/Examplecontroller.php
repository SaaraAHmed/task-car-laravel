<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Mail\contactMail;
// use Illuminate\Http\contactMail;


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
   

    public function place(){
        return view("place");
    }


    
    public function blog(){
        return view("blog");
    }

    public function login(){
        return view('login');
    }

    public function contact(){
        return view('contact');
    }

    // public function receiveContact(request $request){
    //     $content =[
    //         'name '=>$request->name,
    //         'email' =>$request->email,
    //         'subject '=>$request->subject,
    //         'message' =>$request->message,

    //     ]
    //     Mail::to('recipient@email.com')->send(
    //         new ContactMail($contact),
    //     )
    //     return "mail";
    // }
}
