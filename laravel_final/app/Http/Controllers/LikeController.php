<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Like::all();
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
        $like = new Like();
        $like->like_number =$request->like_number;
        $like->user_id =$request->user_id;
        $like->post_id =$request->post_id;
        $like->save();
        return response()->json(['SMS'=>'Create Successfully']);
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
        return Like::findOrFail($id);
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
        $like = Like::findOrFail($id);
        $like->like_number =$request->like_number;
        $like->user_id =$request->user_id;
        $like->post_id =$request->post_id;
        $like->save();
        return response()->json(['SMS'=>'Update Successfully']);
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
        Like::destroy($id);
        return response()->json(['SMS'=>'Delete Successfully']);
    }
}
