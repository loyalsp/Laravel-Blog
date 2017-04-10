<?php
/**
 * Created by PhpStorm.
 * User: adi
 * Date: 4/9/17
 * Time: 7:49 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Response;  //to use ajax response

class CategoryController extends Controller
{
    public function getCategoryIndex()
    {
        $categories = Category::orderBy('created_at','desc')->paginate(5);
        return view ('admin.blog.categories',['categories' => $categories]);
    }


}