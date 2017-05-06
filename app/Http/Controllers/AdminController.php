<?php
/**
 * Created by PhpStorm.
 * User: adi
 * Date: 3/31/17
 * Time: 6:40 PM
 */

namespace App\Http\Controllers;
use App\Post;


class AdminController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'decs')->take(3)->get();
        return view('admin.index',['posts'=> $posts]);
    }
}