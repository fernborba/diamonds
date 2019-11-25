<?php

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


Auth::routes();

/*
    https://laravel.com/docs/5.1/controllers#restful-resource-controllers
    Example:
    Route::get('path,'PostsController@method')->name('Route Name');
        path: URL
        method at controller, i.e, PostsController@store

Verb	    Path(URL)               Action	    Route Name
GET	        /photo  	            index	    photo.index
GET	        /photo/create	        create	    photo.create
POST	    /photo	                store       photo.store
GET	        /photo/{photo}	        show	    photo.show
GET	        /photo/{photo}/edit	    edit	    photo.edit
PUT/PATCH	/photo/{photo}	        update	    photo.update
DELETE	    /photo/{photo}	        destroy	    photo.destroy

*/
/*
Route::post('/follow/{user}', function(){
    return ['sucess'];
});
*/

Route::get('/email', function (){
    return new \App\Mail\NewUserWelcomeEmail();
});

Route::post('/follower/{user}', 'FollowersController@store');

Route::get('/p/create','PostsController@create')->name('post.create');
Route::post('/p','PostsController@store');
Route::get('/p/{post}','PostsController@show');


Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/','PostsController@index');

/*
Route::get('/profile/{user}', function (App\User $user){

        return Auth()->user();
})->name('profile.show');
*/
