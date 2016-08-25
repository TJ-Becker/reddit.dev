<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::get('/sayhello/{name}', 'HomeController@sayHello');

Route::get('/roll-dice/{guess}', 'HomeController@rollDice');

Route::get('/roll-dice2/{guess}', 'HomeController@rollDice');

Route::get('uppercase/{word}', 'HomeController@uppercase');

Route::get('increment/{start?}', 'HomeController@increment');

Route::resource('posts', 'PostsController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Route::get('/posts/{post}', 'PostController@show');

Route::get('orm-test', function ()
{
    $post = \App\Post::find(2);
    $post->title = "New Title Goes Here.";
    $post->save();
    dd($post);
});



//Route::get('/uppercase/{word}', function($word) {
//	return strtoupper($word);
//});
//
//Route::get('/increment/{number}', function($number) {
//    return ($number + 1);
//});
//
//Route::get('/add/{uno}/{dos}', function($uno, $dos) {
//    $data = [
//        'uno' => $uno,
//        'dos' => $dos
//    ];
//    return view('my-first-view', $data);
//    return ($uno + $dos);
//});
//
////function view($relativePath) {
////    require '/resources/views' . $relativePath . '.php';
////}
//
//Route::get('/rolldice/{guess}', function($guess) {
//    $random = mt_rand(1, 6);
//    $data = [
//        'guess' => $guess,
//        'random' => $random
//    ];
//    return view('roll-dice', $data);
//});
//
//Route::get('/uppercase/{word}', function($word) {
//    $data = [
//        'word' => $word,
//        'wordToUpper' => strtoupper($word)
//    ];
//    return view('uppercase', $data);
//});