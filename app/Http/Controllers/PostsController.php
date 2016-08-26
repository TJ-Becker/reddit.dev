<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::with('user')->paginate(10);

        if (isset($request['search'])) {
            $search = Post::findPostBySearch($request['searchBy'], $request['search']);
            if ($search->get()) {
                $posts = $search->paginate(10);
            } else {
                $posts = Post::with('user')->paginate(10);
            }
        }

        $data = [
            'posts' => $posts
        ];
        return view('posts.index', $data);
    }

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->session()->flash('message', 'Did not store successfully.');

        $this->validate($request, Post::$rules);

        $request->session()->forget('message');

        $post = new Post;
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->url = $request['url'];
        $post->created_by = Auth::user()->id;
        Log::info($request->all());
        $post->save();
        return redirect()->action('PostsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'post' => Post::find($id)
        ];

        if(!$data['post']) {
            abort(404);
        }

        return view('posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'post' => Post::find($id)
        ];
        return view('posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, Post::$rules);
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->url = $request->input('url');
        $post->save();
        return redirect()->action('PostsController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $post = Post::find($id);
        if (!$post) {
            abort(404);
            $request->session()->flash('message', 'Did not destroy successfully.');
        }
        $request->session()->forget('message');
        $post->delete();

        return redirect()->action('PostsController@index');
    }
}
