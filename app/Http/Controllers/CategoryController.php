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
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.blog.categories', ['categories' => $categories]);
    }

    public function postCreateCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);
        $category = new Category();
        $category->name = $request['name'];
        $saved = $category->save();
        if ($saved) {
            return Response::json(['message' => 'category saved'], 200);
        }
        return Response::json(['message' => 'category could not be saved'], 404);
    }

    public function postUpdateCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);

        $category = Category::find($request['cat_id']);
        if (!$category) {
            return Response::json(['message' => 'category not found', 404]);
        }
        $category->name = $request['name'];
        $category->update();
        return Response::json(['message' => 'category updates', 200]);

    }

    public function deleteCategory($cat_id)
    {
        $category = Category::find($cat_id);
        if($category->delete())
        return Response::json(['message' => 'category deleted', 200]);

    }
}