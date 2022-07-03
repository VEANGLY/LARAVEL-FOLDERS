<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Comment::all();
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
        $comments = new Comment();
        $comments->post_id =$request->post_id;
        $comments->user_id =$request->user_id;
        $comments->text =$request->text;
        $validate = $request->validate([
            'post_id' => 'Integer|required',
            'user_id' => 'Integer|required',
            'text' => 'String|required|max:50|min:3',
        ]);
        $comments->save();
        return response()->json(['sms'=>'Comment created']);
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
        $commentId = Comment::where('id', $id)->get();
        if(count($commentId)>0){
            return Comment::findOrFail($id);
        }else{
            return response()->json(['sms'=>'Not Fount!']);
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
        $comments = Comment::findOrFail($id);
        $comments->post_id=$request->post_id;
        $comments->text=$request->text;
        $comments->save();
        return response()->json(['sms'=>'Updated successfully']);
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
        $comment = Comment::where('id',$id)->get();
        if(count($comment)>0){
            Comment::destroy($id);
            return response()->json(['sms'=>'Deleted successfully']);
        }
    }
}
