<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

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

    public function create()
    {
        $post = new Post();
        return view('posts.create', compact('post'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validation
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
            'content' => 'required'
        ]);

        // $dd = Validator::make($request->all(), [
        //     'title' => 'required',
        //     'image' => 'required|image|mimes:png,jpg,jpeg,svg',
        //     'content' => 'required'
        // ]);

        // if($dd->fails()) {
        //     return 'Errrrrrrrrror';
        // }

        // dd($request->all());



        // 1. Request Validation
        // 2. Validator Class
        // 3. Request Form File

        // Uploads Files
        $img = $request->file('image');
        $img_name = time().rand().$img->getClientOriginalName();
        $img->move(public_path('uploads/posts'), $img_name);

        // Store data to database
        Post::create([
            'title' => $request->title,
            'image' => $img_name,
            'content' => $request->content
        ]);

        // $post = new Post();
        // $post->title = $request->title;
        // $post->image = $img_name;
        // $post->content = $request->content;
        // $post->save();

        // Redirect the user
        return redirect()->route('posts.index')->with('msg', 'Post created successfully');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg',
            'content' => 'required'
        ]);

        $post = Post::find($id);
        $img_name = $post->image;
        // Uploads Files
        if($request->hasFile('image')) {

            File::delete(public_path('uploads/posts/'.$img_name));

            $img = $request->file('image');
            $img_name = time().rand().$img->getClientOriginalName();
            $img->move(public_path('uploads/posts'), $img_name);
        }

        // Store data to database
        $post->update([
            'title' => $request->title,
            'image' => $img_name,
            'content' => $request->content
        ]);

        // Redirect the user
        return redirect()->route('posts.index')->with('msg', 'Post created successfully');
    }
}
