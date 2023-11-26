<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Examplecontroller extends Controller
{
    public function test1(){
        return view("login");
    }
}
