<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Post;
use App\Photo;
use App\Category;
use App\Comment;

use Session;

use App\Http\Requests\PostCreateRequest;

use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::paginate(1);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cats = Category::pluck('name', 'id')->all();

        return view('admin.posts.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        //  
        $input = $request->all();

        $user = Auth::user();

        if($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['path' => $name]);

            $input['photo_id'] = $photo->id;
        }

        $user->posts()->create($input);

        Session::flash('created', 'Post has been created successfully');

        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $post = Post::whereSlug($slug)->first();

        $comments = $post->comments->all();

        return view('admin.posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cats = Category::pluck('name', 'id')->all();

        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCreateRequest $request, $id)
    {
        //
        $input = $request->all();

        if($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['path' => $name]);

            $input['photo_id'] = $photo->id;
        }

        Auth::user()->posts()->whereId($id)->first()->update($input);

        Session::flash('updated', 'Post has been updated successfully');

        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);

        if($post->photo) {
            
            unlink(public_path() . $post->photo->path);
        }

        $post->delete();

        Session::flash('deleted', 'Post has been deleted!');

        return redirect('admin/posts');
    }

    public function post($slug) {

        $post = Post::whereSlug($slug);

        return $post;
    }
}
