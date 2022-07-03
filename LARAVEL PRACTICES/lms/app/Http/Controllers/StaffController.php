<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  Staff::all();
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
        $staff = new Staff();
        $staff->name = $request->name;
        $staff->position = $request->position;
        $staff->department = $request->department;
        $staff->save();
        return Response()->json(array('staff' => $staff));
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
        return  Staff::findOrFail($id);
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
        $staff = Staff::findOrFail($id);
        $staff->name = $request->name;
        $staff->position = $request->position;
        $staff->department = $request->department;
        $staff->save();
        return response()->json(array('staff' => $staff));
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
        Staff::destroy($id);
    }
}
