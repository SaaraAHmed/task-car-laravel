<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use \App\Models\Car;
use \App\Models\Category;

use App\Traits\Common;

class CarController extends Controller
{
    use Common;
    
    private $columns = ['carTitle', 'description','published'];
    
    /**
     * Display a listing of the resource.
     */
    
     
    public function index()
    {
       $cars= Car::get();
        return view ('cars',compact('cars'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //    return view('addcars');
       $categories= Category::select('id','categoryName')->get();
       return view('addcars',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    // public function store(Request $request)
    // {
    //     $cars= new Car;
    //     $cars->carTitle="bmw";
    //     $cars->description="description";
    //     $cars->published=true;
    //     $cars->save( );
    //     return "car data added successfully";

    // }

    public function store(Request $request)
    {
    //     $cars= new Car;
    //     $cars->carTitle=$request->carTitle;
    //     $cars->description=$request->description;
    //    if(isset($request->published)){
    //        $cars->published=true;
    //       } else {
    //         $cars->published=false;
    //        }
       
    //     $cars->save( );
    //     return "car data added successfully";
    //


    //2
    // $data=$request->only($this->columns);
    // $data['published']=isset($data['published']) ? true : false;

    // $request->validate([
    //     'carTitle'=>'required|string|max:5',
    //     'description'=>'required|string',

    // ]);
    // Car::create($data);
    // return 'done successfully';
    // }

     //another way to add message
     //to  add for example published is 1 or 0 to car (title and desc ).
     $message=[
        'carTitle.required'=>'tilte is require',
        'description.required'=>'should be exist',

     ];
     $data=$request->validate([
            'carTitle'=>'required|string',
            'description'=>'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required',
        ],$message);
        // return ddd($data);
       

         $fileName =$this->uploadFile($request->image,'assets/images');
         $data['image']=$fileName ;
         $data['published']=isset($request['published'])? 1 : 0 ;
         Car::create($data);
         return 'done';

       
    }
    /**
     * Display the specified resource.
     */
    
    public function show(string $id)
    {
        // return view('carDetail');
        $car=Car::findOrFail($id);
        return view('carDetail',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return 'the id is: '.$id;
        $car=Car::findOrFail($id);
        $categories= Category::select('id','categoryName')->get();
        return view('updatecar',compact('car','categories'));

                                                                                  // task8 update image
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Car::where('id', $id)->update($request->only($this->columns));
        // return 'Updated';
 
       print_r($request->carTitle)  ;                                                                           //// task8 update image
    $messages= $this->messages();

    $data = $request->validate([
        'carTitle'=>'required|string',
        'description'=>'required|string',
        'image' => 'sometimes|max:2048',
        'category_id' => 'required',
    ], $messages);
    
    $data['published'] = isset($request->published);

    // update image if new file selected
    if($request->hasFile('image')){
        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image']= $fileName;
    }

    //return dd($data);
    Car::where('id', $id)->update($data);
    return 'Updated';

                                                                         

    }
   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)  :RedirectResponse
    {       
        // return 'deleteCar successfull';
        Car::where('id', $id)->delete( );
        return  redirect('cars');

    }

    public function trashed() 
    {       
        // return 'deleteCar successfull';
        $cars= Car::onlyTrashed()->get( );
        return view('trashed',compact('cars'));

    }
    
    public function carDeleted(string $id) :RedirectResponse
    {
        Car::where('id', $id)->forceDelete( );
        return  redirect('cars');
    }

    public function restoreCar(string $id) :RedirectResponse
    {
        Car::where('id', $id)->restore( );
        return  redirect('cars');
    }


    public function messages(){
        return [
            'carTitle.required'=>'Title is required',
            'description.required'=> 'should be text',
        ];
    }

    
    public function contactCar(){
        return view('contact');
    }

    // public function receiveContactCar(request $request){
    //     $content =[
    //         'carTitle '=>$request->name,
    //         'description' =>$request->email,
    //         'image '=>$request->subject,
    //         'category_id' =>$request->message,

    //     ]
    //     Mail::to('recipient@email.com')->send(
    //         new ContactMail($contact),
    //     )
    //     return "mail";
    // }
   
}
