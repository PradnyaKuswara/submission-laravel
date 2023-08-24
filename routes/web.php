<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Articles;

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
    $data = Articles::with('category','tags')->orderBy('id','desc')->take(9)->get();
    return view('pages.home')->with([
        'data' => $data,
        'user' => Auth::user(),
    ]);
});

Route::get('/article-page',function(){
    $data = Articles::with('category','tags')->orderBy('id','desc')->paginate(12);
    return view('pages.article')->with([
        'user' => Auth::user(),
        'data' => $data,
    ]);
});

Route::get('/article-page/{id}',function($id){
    $data = Articles::where('id',decrypt($id))->with('category','tags')->first();
    return view('pages.single_article')->with([
        'user' => Auth::user(),
        'data' => $data,
    ]);
});

Route::get('/about-page',function(){
    return view('pages.about')->with([
        'user' => Auth::user(),
    ]);
});

Route::controller(App\Http\Controllers\Auth\AuthController::class)->group(function(){
    Route::get('/login','loginIndex')->name('login');
    Route::get('/register','registerIndex');
    Route::post('/register-process','registerProcess');
    Route::post('/login-process','loginProcess');

    Route::get('password/reset','forgotpass_index');
    Route::post('password/email','linkforgot');
    Route::get('password/reset/{token}','resetPassIndex')->name('password.reset');
    Route::post('password/update','updatePass');
});

Route::group(['middleware' => 'auth'],function(){
    Route::resource('categories',App\Http\Controllers\CategoryController::class);
    Route::resource('tags',App\Http\Controllers\TagController::class);
    Route::resource('articles',App\Http\Controllers\ArticleController::class);

    
    Route::get('/logout',[App\Http\Controllers\Auth\AuthController::class,'logout']);
});



