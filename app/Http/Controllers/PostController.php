<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    private $rules = [
        'title' => 'required|max:255|unique:posts,slug',
        'body' => 'required',
    ];

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(5);
        return view('home')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $post = new Post;

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->sub_header = $request->input('sub_header');
        $post->slug = str_slug($request->input('title'));
        $post->user_id = \Auth::user()->id;
        $post->category_id = $request->input('category_id');

        $post->save();

        if( isset($request->tags) )
            $post->tags()->sync( $request->tags, false );

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->rules['title'] .= ",{$id}";
        $this->validate($request, $this->rules);
        $post = Post::find($id);
        $post->category_id = $request->input('category_id');
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->sub_header = $request->input('sub_header');
        $post->slug = str_slug($request->input('title'));


        $post->save();

        $post->tags()->sync($request->tags , true);
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Session::flash('message', 'Post ' . $id . ' was deleted successfully');
        return redirect()->route('list');
    }

    public function userPostList()
    {
        $user_id = \Auth::user()->id;
        $posts = Post::where("user_id", $user_id)->paginate(15);
        return view('posts.list')->withPosts($posts);
    }
}