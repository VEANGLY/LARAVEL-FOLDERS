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
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        return response()->json(['sms'=>'User Created']);
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
        return User::with('posts','posts.comments')->findOrFail($id);
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
        $user = User::findOrFail($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        return response()->json(['sms'=>'User updated']);
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
    }

    /**
     * Get users and posts
     */
    public function getUserPost(){
        return User::with(['posts'])->get();
    }

    /**
     * Get users post and comment
     */
    public function getUserandPostComment(){
        return User::with(['posts','posts.comments'])->get();
    }

    /**
     * Get to count the number of posts and comments
     */
    public function getUserandCountPostComment(){
        return User::withCount(['posts','comments'])->get();
    }
}
