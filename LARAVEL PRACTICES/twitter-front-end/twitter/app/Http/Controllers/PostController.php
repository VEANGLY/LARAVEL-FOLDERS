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
        return Post::with('comments')->get();
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
        $posts = new Post();
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->user_id = $request->user_id;
        // $validate = $request->validate([
        //     'title' => 'required|unique:posts|max:100|min:5',
        //     'description' => 'required|max:50|min:5',
        // ]);
        $posts->save();
        return response()->json(['SMS'=>'Created successfull']);
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
        $postId = Post::where('id', $id)->get();
        if(count($postId) > 0){
            return Post::findOrFail($id);
        }else{
            return response()->json(["message" => "Not Found."], 404);
        }
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
        $posts = Post::findOrFail($id);
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->save();
        return response()->json(["message" => "Update Successfully"]);
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
        $postId = Post::where('id', $id)->get();
        if(count($postId) > 0){
            Post::destroy($id);
            return response()->json(["message" => "Delete Successfully"]);
        }else{
            return response()->json(["message" => "No found"]);
        }
    }
}
