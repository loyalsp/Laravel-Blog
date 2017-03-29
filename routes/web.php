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

Route::group(['web' => 'middleware'],function()
{

    Route::get('/',[
        'uses' => 'PostController@getBlogIndex',
        'as' => 'blog.index'
    ]);
      Route::get('/blog',[
        'uses' => 'PostController@getBlogIndex',
        'as' => 'blog.index'
    ]);

    Route::get('/blog/{post_id}',[
        'uses' => 'PostController@getSinglePost',
        'as' => 'blog.single'
    ]);
    /*other Routes*/

    Route::get('/about',function(){
    return view('frontend.other.about');
    })->name('about');

    Route::get('/contact',[
        'uses' => 'ContactMessageController@getContactIndex',
        'as' => 'contact'
    ]);
});

