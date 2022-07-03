<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return User::all();
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
        $user = new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =$request->password;
        $user->save();
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
        return User::findOrfail($id);
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
        $user = User::findOrfail($id);
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =$request->password;
        $user->save();
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
        User::destroy($id);
        return response()->json(['SMS'=>'Delete Successfully']);
    }


    /**
     * Get user post and Comments
     */
    public function getUserPostComment(){
        return User::with(['posts','posts.comments'])->get();
    }
    /**
     * Get user posta and Comments and likes
     */
    public function getUserPostCommentLike(){
        return User::with(['posts','posts.comments','likes'])->get();
    }
    /**
     * Get user posta and Comments and likes with ID
     */
    public function getUserPostCommentLikeWithId($id){
        return User::with(['posts','posts.comments','likes'])->findOrfail($id);
    }
    /**
     * Get Count posta and Comments in user
     */
    public function getCountPostAndComment(){
        return User::withCount(['posts','comments'])->get();
    }
}
