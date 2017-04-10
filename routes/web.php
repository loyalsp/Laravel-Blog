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

    Route::get('/blog/{post_id}&{end}',[
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

    /******************Admin routes***********************/
    Route::group([
        'prefix' => 'Admin'
    ],function (){
        Route::get('/',[
            'uses' => 'AdminController@getIndex',
            'as' => 'admin.index'
        ]);

        Route::get('/blog/posts/creates',[
            'uses' => 'PostController@getCreatePost',
            'as' => 'admin.create.post'
        ]);

        Route::post('/blog/post/create',[
            'uses' => 'PostController@postCreatePost',
            'as' => 'create.admin_post'
        ]);

     /*   Route::get('/blog/posts',[
            'uses' => 'PostController@getAllPosts',
            'as' => 'get.all.posts'
        ]);*/

         Route::get('/blog/posts',[
            'uses' => 'PostController@getPostIndex',
            'as' => 'admin.blog.index'
        ]);

         Route::get('/blog/post/delete/{post_id}',[
            'uses' => 'PostController@deleteBlogPost',
            'as' => 'delete.blog.post'
        ]);

         Route::get('/blog/post/{post_id}/{end}',[
            'uses' => 'PostController@getSinglePost',
            'as' => 'admin.blog.post'
        ]);

         Route::get('/blog/post/{post_id}/edit',[
            'uses' => 'PostController@getUpdatePost',
            'as' => 'admin.blog.post.edit'
        ]);

         Route::post('/blog/post/update',[
            'uses' => 'PostController@postUpdatePost',
            'as' => 'admin.blog.post.update'
        ]);

        Route::get('/blog/categories/',[
            'uses' => 'CategoryController@getCategoryIndex',
            'as' => 'admin.blog.categories'
        ]);

    });
});

