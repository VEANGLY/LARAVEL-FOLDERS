<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    public function getAllListAcount(){
        return User::all();
    }
    public function createAccount(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $token = $user->createToken('mytoken')->plainTextToken;
        $response =[
            'user'=>$user,
            'token'=>$token
        ];
        return response()->json($response);
    }

    public function signIn(request $request){
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


    public function signOut(request $request){
        auth()->user()->tokens()->delete();
        return response()->json(['sms'=>'signed out from account']);
    }
}
