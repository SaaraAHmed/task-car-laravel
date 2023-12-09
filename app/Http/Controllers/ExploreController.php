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
    public function index()
    {
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
    public function store(Request $request)
    {
        
        $places= new Place;
        $places->image=$request->image;
        $places->exploreTitle=$request->exploreTitle;
        $places->from=$request->from;
        $places->to=$request->to;
        $places->description=$request->description;
       
        $places->save( );
        return "places data added successfully";
    
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
