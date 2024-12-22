<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class Anime extends Controller
{
    public function home()
    {
        $result = DB::select("select * from home_page");

        return view("home", array("result" => $result));
    }

   


}
