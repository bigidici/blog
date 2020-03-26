<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::all();
        return view('posts.index', compact('posts'));
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
    public function store(PostFormRequest $request)
    {
        $image = $request->image->store('posts');
        Post::create(['title' => $request->title,'description' => $request->description,
        'content' => $request->content,'image' => $image, 'published_at'=>$request->published_at]);

        session()->flash('success', 'Post created successfuly');

        return redirect()->route('posts.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        if($request->hasFile('image'))
        {
            

        }
        Post::find($post->id)->update(['title' => $request->title,'description' => $request->description,
        'content' => $request->content,'image' => $image, 'published_at'=>$request->published_at]);
        
        session()->flash('success', 'Post updated successfuly');
        return redirect()->route('posts.index', $post);
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
    }
}
