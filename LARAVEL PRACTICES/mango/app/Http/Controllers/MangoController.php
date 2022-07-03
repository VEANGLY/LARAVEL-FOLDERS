<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mango;
class MangoController extends Controller
{
    //
    function getMango(){
        // return DB::select('SELECT * FROM mangos WHERE id = 1');
        // return Mango::find(1);

        // return DB::table('mangos')->get();
        // return Mongo::all();
        // return Mango::get();

        // return DB::table ('mangos')->first();
        // return Mango::first();

        // return DB::table ('mangos')->select('name', 'price')->get();
        // return Mango::all('name', 'price');

        // return DB::table ('mangos')->where('id', '>', 5)->get();
        // return Mango::where('id' , '>', 8)->get();

        // return DB::table ('mangos')-> whereBetween('id', [5, 10])->get();
        // return Mango::whereBetween('id', [5, 10])->get();

        // return DB::table ('mangos')-> whereNotBetween('id', [5, 10])->get();
        // return Mango::whereNotBetween('id', [1, 6])->get();

        // return DB::table ('mangos')-> whereIn('id', [5, 10])->get();
        // return Mango::find([5,7,9]);

        // return DB::table ('mangos')-> orderBy('id',"desc")->get();
        // return Mango::orderBy('id',"desc")->get();

        // return DB::table ('mangos')-> inRandomOrder()->get();
        // return Mango::inRandomOrder()->get();

        // return DB::table ('mangos')-> max('id');
        // return Mango::max('id');

        // return DB::table ('mangos')-> sum('id');
        //    return Mango::sum('id');

        // return DB::table ('mangos')-> avg('id');
        //    return Mango::avg('id');

        // return DB::table ('mangos')-> skip (3)->take(6)->get();
        // return Mango::skip(1)->take(6)->get();
    }
}
