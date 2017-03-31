<?php
/**
 * Created by PhpStorm.
 * User: adi
 * Date: 3/28/17
 * Time: 11:11 PM
 */

namespace App\Http\Controllers;


class PostController extends Controller
{
    public function getBlogIndex()
    {
        return view('frontend.blog.index');
    }

    public function getSinglePost($post_id, $end =  'frontend')
    {
        return view($end.'.blog.singlePost');
    }

}