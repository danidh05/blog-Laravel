<?php
//use makes certain classes and facades available to use
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as LaravelFile;


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
  
    
    return view('posts',['posts'=>POST::all()]);
});


Route::get('posts/{post}',function ($slug) {
  
 return view('post',[
    'post'=>POST::findOrFail($slug)
]);
});