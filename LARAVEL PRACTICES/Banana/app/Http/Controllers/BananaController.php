<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banana;
class BananaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Banana::all();
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
        $banana = new Banana();
        $banana->name = $request->name;
        $banana->price = $request->price;
        $banana->status = $request->status;

        if($request->file('image')){
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(storage_path('images'), $fileName);
            $banana->image=$fileName;
        }

        $banana->save();
        return response()->json(["message" => "Banana is saved."]);
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
        $bnID = Banana::where('id', $id)->get();
        if(count($bnID) > 0){
            return Banana::findOrFail($id);
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
        $banana = Banana::findOrFail($id);
        $banana->name = $request->name;
        $banana-> price = $request->price;
        $banana->status = $request->status;

        $banana->save();
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
        $bnID = Banana::where('id', $id)->get();
        if(count($bnID) > 0){
            Banana::destroy($id);
            return response()->json(["message" => "Delete Successfully"]);
        }else{
            return response()->json(["message" => "No found"]);
        }
        return Banana::destroy($id);
    }
}
