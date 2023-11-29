<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use \App\Models\Car;


class CarController extends Controller
{
    private $columns = ['carTitle', 'description','published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $cars= Car::get();
        return view('cars',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('addcars');
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
    
    $data=$request->only($this->columns);
    $data['published']=isset($data['published']) ? true : false;

    $request->validate([
        'carTitle'=>'required|string|max:5',
        'description'=>'required|string',

    ]);
    Car::create($data);
    return 'done successfully';
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
        return view('updatecar',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Car::where('id', $id)->update($request->only($this->columns));
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
   
}
