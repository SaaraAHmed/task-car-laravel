<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use \App\Models\Car;


class CarController extends Controller
{
    private $columns = ['carTitle', 'description'];
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
        $cars= new Car;
        $cars->carTitle=$request->title;
        $cars->description=$request->description;
       if(isset($request->published)){
           $cars->published=true;
          } else {
            $cars->published=false;
           }
       
        $cars->save( );
        return "car data added successfully";

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
    public function destroy(string $id)
    {       
        // return 'deleteCar successfull';
        Car::where('id', $id)->delete( );
        return  redirect('cars');

    }
}
