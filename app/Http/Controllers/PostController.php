<?php
/**
 * Created by PhpStorm.
 * User: adi
 * Date: 3/28/17
 * Time: 11:11 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function getBlogIndex()
    {
        $posts = Post::paginate(5);
        foreach ($posts as $post)
        {

            $post->body = $this->shortenText($post->body);
        }
        $data = $this->get_client_ip();
        return view('frontend.blog.index',['posts' => $posts, 'data' => $data]);
    }

    public function getSinglePost($post_id, $end =  'frontend')
    {
        $post = Post::find($post_id);
        if(!$post_id)
        {
            return redirect()->route('blog.index')->with(['fail' => 'Post not found']);
        }
        return view($end.'.blog.single',['post' => $post]);
    }

    public function getCreatePost()
    {
        return view('admin.blog.create-post');
    }
    public function postCreatePost(Request $request)
    {
    $this->validate($request,[
        'title' => 'required|max:120|unique:posts',
        'body' => 'required',
        'author' => 'required|max:80',
        ]
        );
    $post = new Post();
    $post->title = $request['title'];
    $post->body = $request['body'];
    $post->author = $request['author'];
    $post->save();
    //attach categorey
        return redirect()->route('admin.index')->with(['success' => 'post successfully created']);
    }
 /// this function will shorten the text its word_count is more the 20 word else as it is
    private function shortenText($sentence)
    {
        if(str_word_count($sentence) > $count =20)
        {
            preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
            return $matches[0].'....';
        }
        return $sentence;
    }

    public function getPostIndex()
    {
        $posts = Post::paginate(5);
        return view('admin.blog.index',['posts' => $posts]);
    }
    public function deleteBlogPost($post_id)
    {
        $post = Post::find($post_id);
        if(!$post)
        {
        return redirect()->route('admin.index')->with(['fail' => 'Post not found']);
        }
        $post->delete();
        return redirect()->back()->with(['success' => 'A post has been deleted']);
    }

    public function getUpdatePost($post_id)
    {
        $post = Post::find($post_id);
        if(!$post)
        {
            return redirect()->route('blog.index')->with(['fail' => 'Post not found']);
        }
        // finds the category
        return view('admin.blog.edit_post',['post' => $post]);
    }

    public function postUpdatePost(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:120',
            'body' => 'required',
            'author' => 'required',
            ]);
        $post_id = $request['post_id'];
        $post = Post::find($post_id);
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->author = $request['author'];
        $saved = $post->update();
        // update the category
        if(!$saved)
        {
            return redirect()->back();with(['fail' => 'Some error occured please try again']);
        }
        return redirect()->route('admin.index')->with(['success' => 'Post has been updated']);
    }

    private function get_client_ip()
    {
        //using third party for ip and other info Documentation http://ip-api.com/docs/
        $data = unserialize(file_get_contents('http://ip-api.com/php/'));
        return $data;
    }
}