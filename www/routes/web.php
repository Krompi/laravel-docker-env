<?php

use App\Article;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {

    // // alle Artikel holen
    // $articles = App\Article::all();

    // // hole nur zwei Artikel
    // $articles = App\Article::take(2)->get();

    // // Seitenumschalter bauen
    // $articles = App\Article::paginate(2);

    // // sortiert nach created_at (standard)
    // $articles = App\Article::latest()->get();

    // // return $article;

    // return view('about', [
    //     'articles' => $articles
    // ]);

    // oder etwas kürzer:
    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()
    ]);
});

Route::get('/posts/{post}', 'PostsController@show');