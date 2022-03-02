<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('home', compact('posts'));
    }


    public function create()
    {
        $post = new Post();
        return view('create', compact('post'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'created_by' => auth()->user()->id
        ]);

        $post->save();

        return redirect('/home');
    }

//    public function show(Post $post)
//    {
//    }


    public function edit(Post $post)
    {
        return view('edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            ]);

        $post->save();

        return redirect('/home');
    }

    public function destroy(Post $post)
    {
        if($post->delete()) {
            $post->update([
                'deleted_by' => Auth::user()->id,
            ]);
        }
        $post->delete();
        return redirect('/home');
    }

    public function theme(Request $request){
        $themeName = $request->input('theme');
        $themeUrl = DB::table('themes')->select('cdn_url')->where('name', '=', $themeName)->first();
        Cookie::queue(Cookie::make('themeURL', $themeUrl->cdn_url, 60));
        return Redirect::back();
    }
}

//Source for deleted_by: https://stackoverflow.com/questions/60923555/laravel-destroy-then-update-deleted-by
