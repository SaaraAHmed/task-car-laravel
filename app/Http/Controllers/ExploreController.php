<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use \App\Models\Place;


class ExploreController extends Controller
{
    private $columns = ['exploreTitle','from','to', 'description'];
    /**
     * Display a listing of the resource.
     */
    public function indexx()
    {
        // $places= Place::query()->limit(6)->get();
        $places= Place::get();

        return view('places',compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addExplore');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
    // {
        
    //     $places= new Place;
    //     $places->image=$request->image;
    //     $places->exploreTitle=$request->exploreTitle;
    //     $places->from=$request->from;
    //     $places->to=$request->to;
    //     $places->description=$request->description;
       
    //     $places->save( );
    //     return "places data added successfully";
    
    // }
    $message=[
        'image.required'=>'tilte is require',
        'exploreTitle.required'=>'should be exist',

     ];
     $data=$request->validate([
         'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'exploreTitle'=>'required|string',
            'from'=>'required',
            'to'=>'required',
            'description'=>'required|string',
            
        ],$message);
        // return ddd($data);
       

         $fileName =$this->uploadFile($request->image,'assets/images');
         $data['image']=$fileName ;
         Place::create($data);
         return 'done';


}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPlace(string $id)
    {
        $place=Place::findOrFail($id);
        return view('updatePlace',compact('place'));
                            
        // $place=Place::findOrFail($id);
        // return view('updateImage',compact('car'));
    }
   

    /**
     * Update the specified resource in storage.
     */
    public function updatePlace(Request $request, string $id)
    {
        $messages= $this->messages();

    $data = $request->validate([
        'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
        'exploreTitle'=>'required|string',
        'from'=>'required',
        'to'=>'required',
        'description'=>'required|string',
        'category_id'=>'required',
    ], $messages);
    
    $data['published'] = isset($request->published);

    // update image if new file selected
    if($request->hasFile('image')){
        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image']= $fileName;
    }

    //return dd($data);
    Place::where('id', $id)->update($data);
    return 'Updated';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPlace(string $id)   :RedirectResponse
    {
        Place::where('id', $id)->delete( );
        return  redirect('places');
    }
    
    public function trashedPlace() 
    {       
        // return 'deleteCar successfull';
        $places= Place::onlyTrashed()->get( );
        return view('trashedPlace',compact('places'));

    }
    
    public function placeDeleted(string $id) :RedirectResponse
    {
        Place::where('id', $id)->forceDelete( );
        return  redirect('places');
    }

    public function restorePlace(string $id) :RedirectResponse
    {
        Place::where('id', $id)->restore( );
        return  redirect('places');
    }

}
