<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    public function index(){
        return User::all();
    }


    public function register(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['sms'=>'Create successfull']);
    }


    public function logIn(request $request){
        if(!Auth::attempt($request->only('email','password')))
        {
            return response()->json(['sms'=>'Invalid password'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60*20); //1 day
        return response()->json(['sms'=>'success','token'=>$token],200)->withCookie($cookie);
    }


    public function lognOut(request $request){
        $cookie = Cookie::forget('jwt');
        return response()->json(['sms'=>'Logged out from account'])->withCookie($cookie);
    }
}
