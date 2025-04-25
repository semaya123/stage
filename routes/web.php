<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Services\Calcul;
use Illuminate\http\Response;
use Illuminate\Support\Facades\Route;




Route::resource('profiles',ProfileController::class);


Route::resource('publications',PublicationController::class);

Route::get('/', [homeController::class, 'index'])->name('homepage')->middleware('auth');

// Auth routes
Route::get('/login', [LoginController::class, 'show'])->name('login.show')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [LoginController::class,'logout'])->name('login.logout');

// Profiles
Route::get('/settings', [ProfileController::class, 'index'])->name('settings.index');



//Route::get('/google',function(){
//return redirect()->away('https://www.google.com');

//})->name('route');

Route::get('/somme/{$a}/{$b}',function($a, $b, Calcul $calcul){

return $calcul->somme($a,$b);
});
Route::view('/form','form');
Route::post('/form',function(Request $request){
   dd($request->input('input_field'));
})->name('form');


Route::get('/salam',function(){
  $response =new Response('Salam') ;
  return $response;
});

Route::get('/cookie/get',function(Request $request){
   return ($request->cookie('age'));
});

Route::get('/cookie/set/{cookie}',function($cookie){
    $response =new Response();
    $cookieObject =cookie()->forever('age',$cookie,);
    return $response->withCookie( $cookieObject);
});

Route::get('/headers',function(Request $request){
     $response = new Response();
     return $response->withHeaders([
        'Content-Type '=>'Application/json'
     ]);
});