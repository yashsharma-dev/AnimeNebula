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

    public function product_details($id)
    {

        $result = DB::select("select * from home_page where id=" . $id);

        return view("product_details", array('row' => $result[0]));
    }

    public function insert_product()
    {
        $result = DB::select("select * from home_page");

        return view("insert_product", array('result' => $result));
    }

    public function do_insert(Request $request)
    {
        $name = $request->input("name");
        $alias = $request->input("alias");
        $year = $request->input("year");
        $desc = $request->input("desc");
        $language = $request->input("language");
        $episode = $request->input("episode");
        $rating = $request->input("rating");
        // $image = $request->input("image");

        if ($request->hasFile("image")) {
            $image = $request->image->getClientOriginalName();  //"abcd.jpg";//$request->input('pr_image');

            $request->image->move(public_path('storage/anime_images'), $image);


            DB::update("INSERT INTO `home_page`(`name`, `alias`, `year`,`img`, `desc`, `language`, `episode`, `rating`) VALUES ('" . $name . "','" . $alias . "'," . $year . ",'" . $image . "','" . $desc . "','" . $language . "'," . $episode . "," . $rating . ")");
        }



        return redirect("home");
    }


    public function product_delete($id)
    {
        DB::delete("delete from home_page where id=" . $id);

        return redirect("home");
    }

    public function edit($id)
    {
        $result = DB::select("SELECT `id`, `name`, `alias`, `year`, `desc`, `img`, `language`, `episode`, `rating` FROM `home_page` WHERE id=".$id);

        return view('edit_form',array("row"=>$result[0]));

    }

    public function do_edit(Request $request,$id){
        $name = $request->input("name");
        $alias = $request->input("alias");
        $year = $request->input("year");
        $desc = $request->input("desc");
        $language = $request->input("language");
        $episode = $request->input("episode");
        $rating = $request->input("rating");
        // $image = $request->input("image");


        
        if($request->hasFile("image"))
        {
            $image= $request->image->getClientOriginalName();  //"abcd.jpg";//$request->input('pr_image');

            $request->image->move(public_path('storage/anime_images'), $image);

            DB::update("UPDATE `home_page` SET `name`='".$name."',`alias`='".$alias."',`year`=".$year.",`desc`='".$desc."',`img`='".$image."',`language`='".$language."',`episode`=".$episode.",`rating`=".$rating." WHERE id=".$id);

        }
        else
        {
            DB::update("UPDATE `home_page` SET `name`='".$name."',`alias`='".$alias."',`year`=".$year.",`desc`='".$desc."',`language`='".$language."',`episode`=".$episode.",`rating`=".$rating." WHERE id=".$id);
        }

        
        
        return redirect("home");
        
    }
}
