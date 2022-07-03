<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    public function getRegister(){
        return User::all();
    }
    public function register(Request $request){
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();
        $token = $users->createToken('mytoken')->plainTextToken;
        $response =[
            'user'=>$users,
            'token'=>$token
        ];
        return response()->json($response);
    }

    public function login(request $request){
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password))
        {
            return response()->json(['sms'=>'Invalid password'], 401);
        }
        $token = $user->createToken('mytoken')->plainTextToken;
        $response =[
            'user'=>$user,
            'token'=>$token
        ];
        return response()->json($response);
    }


    public function logout(request $request){
        auth()->user()->tokens()->delete();
        return response()->json(['sms'=>'logged out']);
    }

}
