<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $c
     * @return \Illuminate\Http\Response
     */
    public function show(User $c)
    {
        //
        return $c;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $c)
    {
        //
        if($item){
            c::create($request->all());
            return response()->json(["message" => "Post is Updated."]);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $c)
    {
        //
        destroy($c);
    }
}
