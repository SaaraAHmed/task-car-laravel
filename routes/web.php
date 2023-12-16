<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Examplecontroller;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ExploreController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return ('welcome to php laravel');
});

/*
Route::get('user/{name}', function ($name) {
    return  'the user nam is :'. $name;
});

Route::get('user/{name}/{age?}', function ($name,$age=0) {
    return  'the user nam is :'. $name .' the age is'.$age;
});

Route::get('user/{name}/{age?}', function ($name,$age=0) {
    if($age!==0){
        return 'the nam is :'. $name .'  age is'.$age;
    }
    else{
        return 'the  nam is :'. $name ;

    }
});

//solution 
Route::get('user/{name}/{age?}', function ($name,$age=0) {
    $msg='the  username is :'. $name ;
    if($age ==0){
        return $msg;
    }
    else{
        $msg .= '  h age is'.$age;
         return $msg;
    }
});

//another sol

Route::get('user/{name}/{age?}', function ($name,$age=0) {
    $msg='the  user name is :'. $name ;
    if($age > 0){
        return $msg.= '  his age is'.$age;
    }
     return $msg;
})-> where(['age' => '[0-9]+']);                        // <= regular exoression where


//another sol

Route::get('user/{name}/{age?}', function ($name,$age=0) {
    $msg='the  user name  :'. $name ;
    if($age > 0){
        return $msg.= '  his age '.$age;
    }
     return $msg;
})-> whereNumber('age');                      // <= regular exoression  whereNumber

//another sol

Route::get('user/{name}/{age?}', function ($name,$age=0) {
    $msg='the  user name  :'. $name ;
    if($age > 0){
        return $msg.= '  his age '.$age;
    }
     return $msg;
})-> whereAlpha('name');                      // <= regular exoression  whereAlpha

Route::get('user/{name}/{age?}', function ($name,$age=0) {
    $msg='the  user name  :'. $name ;
    if($age > 0){
        return $msg.= '  his age '.$age;
    }
     return $msg;
})-> where(['age' => '[0-9]+'],['name' => '[a-zA-Z0-9]+']);        // <= regular exoression  where


*/


Route::get('user/{name}/{age?}', function ($name,$age=0) {
    $msg='the  user   :'. $name ;
    if($age > 0){
        return $msg.= '  his age '.$age;
    }
     return $msg;
})->whereIn('name', ['Sara','ahmed']);        // <= regular exoression  whereIn  => choise one should e exsist


Route::prefix('product')->group( function() {
    Route::get('/',function(){
        return 'product home page';
    });
    Route::get('laptop',function(){
        return 'product laptop';
    });
    Route::get('camera',function(){
        return 'product camera';
    });
    
});





// Route::prefix('support')->group( function() {
//     Route::get('/',function(){
//         return 'product home page support';
//     });
//     Route::get('chat',function(){
//         return 'product chat';
//     });
//     Route::get('call',function(){
//         return 'product call';
//     });
    
// });

Route::get('product/{laptob}/{camera?}', function ($laptob,$camera) {
    return  'the '. $laptob ."</br>".' the '.$camera;    
}); 

//solution task 1

// Route::prefix('web structures')->group( function() {
//     Route::get('/',function(){
//         return 'product home page web structure ';
//     });
//     Route::get('web/{webstructure}/{About}/{contactus}/{support}', function ($webstructure,$About,$contactus,$support) {
//         return  '<ul>'.$webstructure.'<li>'. $About .'</li>'.'<li>'. $contactus.'</li>'.'<li>'. $support.'</li>'.'</ul>';    
//     });  
//     Route::get('wep/{supports}/{chat}/{call}/{ticket}', function ($supports,$chat,$call,$ticket) {
//         return  '<li>'. $supports.'</ol>'.'<ol>'. $chat.'</ol>'.'<ol>'. $call.'</ol>'.'<ol>'. $ticket.'</li>';    
//     });  
//     Route::get('wap/{training}/{hr}/{ict}/{markting}/{logistics}', function ($training,$hr,$ict,$markting,$logistics) {
//         return  '<li>'. $training.'</ol>'.'<ol>'. $hr.'</ol>'.'<ol>'. $ict.'</ol>'.'<ol>'. $markting.'</li>'.'<ol>'. $logistics.'</li>';    
//     });
// })->whereIn('web structures', ['web','wep','wap']);


// fallback =>redirect to homepage when page not true

// Route::fallback(function () {
//     return  redirect('/');    
// }); 


//blade ->engine to dail with html page
// route to link page - resourses-> views-> cv.blade.php 
 
Route::get('cv',function () {
    return  view('cv');    
});


Route::get('login',function () {
    return  view('login');    
});

//to get data from login
Route::POST('receive',function () {
    return  ('Data received');    
})->name('receive');


Route::get('test1', [Examplecontroller::class,'test1'])->name('test1');

// Route::get('addcar', [CarController::class,'store']);

Route::post('storeCar', [CarController::class,'store'])->name('storeCar');
Route::get('createCar', [CarController::class,'create']);


Route::get('cars', [CarController::class,'index']);
Route::get('editCar/{id}', [CarController::class,'edit']);
Route::put('updateCar/{id}', [CarController::class,'update'])->name('updateCar');

Route::get('carDetail/{id}', [CarController::class,'show'])->name('carDetail');
Route::get('deleteCar/{id}', [CarController::class,'destroy']);

Route::get('trashed', [CarController::class,'trashed']); 
Route::get('carDeleted/{id}', [CarController::class,'carDeleted']);
Route::get('restoreCar/{id}', [CarController::class,'restoreCar']);

Route::get('showUpload', [Examplecontroller::class,'showUpload']);
Route::post('upload', [Examplecontroller::class,'upload'])->name('upload');

//task 8 upadte Image

// Route::get('editImage/{id}', [Examplecontroller::class,'editImage']);
// Route::put('updateImage/{id}', [Examplecontroller::class,'updateImage'])->name('updateImage');

Route::get('place', [Examplecontroller::class,'place']);

Route::get('blog', [Examplecontroller::class,'blog']);

Route::get('login',[ExampleController::class, 'login']);


Route::get('editCar/{id}', [CarController::class,'edit']);
Route::put('updatCarcategory/{id}', [CarController::class,'update'])->name('updatCarcategory');



Route::post('storeExplore', [ExploreController::class,'store'])->name('storeExplore');
Route::get('createExplore',[ExploreController::class,'create']);

Route::get('placeDetail/{id}', [ExploreController::class,'show'])->name('placeDetail');
Route::get('deletePlace/{id}', [ExploreController::class,'destroyPlace']);

Route::get('places',[ExploreController::class,'indexx']);
Route::get('editPlace/{id}', [ExploreController::class,'editPlace']);
Route::put('updatePlace/{id}', [ExploreController::class,'updatePlace'])->name('updatePlace');


Route::get('trashedPlace', [ExploreController::class,'trashedPlace']); 
Route::get('placeDeleted/{id}', [ExploreController::class,'placeDeleted']);
Route::get('restorePlace/{id}', [ExploreController::class,'restorePlace']);