<?php
use App\User;
use App\Post;

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



Route::get('/', function () {
    return view('welcome');
});

//
//Route::get('/create', function(){
//    User::create(['name'=> 'Jamal', 'email' => 'j@c.com', 'password' => bcrypt("123")]);
//
//});


Route::get('/create', function(){

    $user = User::findOrFail(1);

    $post = new Post(['title'=> 'My Second post for user 1', 'body'=> 'I love laravel 5.2']);

    $user->posts()->save($post);
});

Route::get('/read', function(){

   $user = User::findOrFail(1);

    foreach($user->posts as $post){
        echo $post->title . "<br />";
    }
});

Route::get('/update', function(){

    $user = User::find(2);
    $user->posts()->where('id','=','2')->update(['title'=>'I love laravel as well as WordPress', 'body'=> 'WordPress is also beauty']);


});

Route::get('/delete', function(){
    $user = User::find(1);

    $user->posts()->whereId(1)->delete();
});