<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;

        if($request->file('image')){
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(storage_path('images'), $fileName);
            $post->image = $fileName;
        }
        $post->save();
        return response()->json(['sms'=>'Create successfull.']);
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
        return Post::findOrFail($id);
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
        //
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        if($request->file('image')){
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(storage_path('images'), $fileName);
            $post->image = $fileName;
        }
        $post->save();
        return response()->json(['sms'=>'Update Successfull.']);
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
        Post::destroy($id);
        return response()->json(['sms'=>'Delete successfull']);
    }
}
