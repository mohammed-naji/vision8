<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts = 'SELECT * FROM posts';
        // $posts = mysqli_query($conn, $posts);
        // $posts = mysqli_fetch_all($posts);

        // $posts = Post::all();
        // $posts = Post::paginate(20);
        // $posts = Post::simplePaginate(10);

        // dd($posts);

        if(request()->has('search')) {
            $posts = Post::where('title', 'like', '%'.request()->search.'%')->orderBy('id', 'desc')->paginate(10);
        }else {
            // $posts = Post::orderBy('id', 'desc')->paginate(10);
            $posts = Post::orderByDesc('id')->paginate(10);
            // $posts = Post::latest('id')->paginate(10);
        }

        return view('posts.index', compact('posts'));
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->orderByDesc('id')->get();

        return view('posts.trash', compact('posts'));
    }

    public function restore($id)
    {
        Post::onlyTrashed()->find($id)->restore();
        return redirect()->back();
    }

    public function forcedelete($id)
    {
        Post::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }

    public function show($id)
    {
        // $post = Post::findOrFail($id);
        $post = Post::find($id);
        if(!$post) {
            return redirect()->route('posts.index');
        }
        dd($post->title);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index')->with('msg', 'Post deleted successfully');
        // return redirect()->back();
    }

    public function restore_all()
    {
        Post::onlyTrashed()->restore();
        return redirect()->back();
    }

    public function delete_all()
    {
        Post::onlyTrashed()->forceDelete();
        return redirect()->back();
    }
}
