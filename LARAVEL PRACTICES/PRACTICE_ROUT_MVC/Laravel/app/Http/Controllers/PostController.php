<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getAllItems(){
        return "All items";
    }
    public function createItems(){
        return "Create items";
    }
    public function getOneItems($id){
        return "One items ".$id;
    }
    public function deleteItems($id){
        return "Delete items ".$id;
    }
    public function updateItems($id){
        return "Update items ".$id;
    }
}
