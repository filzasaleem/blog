<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});

Route::get('posts/{post}', function ($slug) {
   // $post = file_get_contents(  '/home/filza/blog/resources/posts/'.$slug.'.html');
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

   if(!file_exists($path)){
        //dd('file does not exits');
       return redirect('/');
    }

    $post = file_get_contents($path);
    return view('post',[
        'post'=> $post
    ]);
})->where('post','[A-z_\-]+');
