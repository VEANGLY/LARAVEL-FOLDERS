<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // return Post::all();
        return DB::table('posts')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //way 1
        Post::create($request->all());

        //way 2
        // Post::create([
        //     'title'=>$request->input('title'),
        //     'description'=>$request->input('description')
        // ]);

        //way 3
        // Post::create([
        //     'title'=>$request->title,
        //     'description'=>$request->description
        // ]);

        //way 4
        // $post = new Post();
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();
        return response()->json(["message" => "Post is saved."]);

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
        $postID = Post::where('id', $id)->get();
        if(count($postID) > 0){
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
        //way 1
        // if(Post::findOrFail($id)){
            $post = Post::findOrFail($id);
            if($post){
                Post::create($request->all());
                return response()->json(["message" => "Post is Updated."]);
            };
        // }else{
        //     return response()->json(["message" => "Not found."]);
        // }

        // way4
        // $post = Post::findOrFail($id);
        // $post->title = $request->title;
        // $post->description = $request->description;

        // $post->save();
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
        $postID = Post::where('id', $id)->get();
        if(count($postID) > 0){
            Post::destroy($id);
            return response()->json(["message" => "Delete Successfully"]);
        }else{
            return response()->json(["message" => "No found"]);
        }
    }
}
