<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        return User::with(['posts','comments'])->get();
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
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);

        $validate = $request->validate([
            'name' => 'String|required|max:15|min:3',
            'email' => 'String|required|email|unique:users',
            'password' => 'String|required_with:password_confirmation|between:8,20'
        ],
        [
            'name.String'=>'name is must be string',
            'name.max'=>'name is must max less than 15',
            'name.min'=>'name is must min more than 3',

            'email.String'=>'email must be string.',
            'email.email'=>'email must be contain @',
            'email.unique'=>'email already contain',
            'email.between'=>'email must between 8 to 20.',

            'password.String'=>'password must be string',
            'password.required_with'=>'password must be the same',
            'password.between'=>'password must betweent 8 t0 20',
        ]
    );
        $users->save();
        return response()->json(["Message" =>"User is added"]);
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
        $userID = User::where('id', $id)->get();
        if(count($userID) > 0){
            return User::findOrFail($id);
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
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user-> email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
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
        {
            $userID = User::where('id', $id)->get();
            if(count($userID) > 0){
                User::destroy($id);
                return response()->json(["message" => "Delete Successfully"]);
            }else{
                return response()->json(["message" => "No found"]);
            }
        }
    }
}
