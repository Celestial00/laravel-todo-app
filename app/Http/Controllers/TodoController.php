<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TodoController extends Controller
{
   
    public function index(){

        $data = DB::table("todos")->get();
        return view("welcome",compact("data"));

    }

    public function store(Request $req){

        $req->validate([

            "title" => "required|string|max:200",
            "desc" => "required|string|max:200",

        ]);

    
        DB::table("todos")->insert([
          
            "title" => $req->title,
            "desc"=>$req->desc,
            "created_at" => now(),
            

        ]);

        return redirect()->back();
        

    }


    public function updateStatus($id, $status){

        DB::table("todos")->where("id", $id)->update([

            "status" => ((int) $status) === 0 ? 1 : 0

        ]);

        return redirect()->back();

    }




    public function destroy($id){
        DB::table("todos")->where("id", $id)->delete();
        return redirect()->back();
    }
    
    
    public function edit($id){

        $data = DB::table("todos")->find($id);
        return view("edit", ["data" => $data]);   
      
    }


    public function update($id, Request $req){

        $req->validate([

            "title" => "required|string|max:200",
            "desc" => "required|string|max:200"

        ]);


        DB::table("todos")->where("id",$id)->update([

            "title" => $req->title,
            "desc" => $req->desc,
            "updated_at" => now(),

        ]);

        return redirect("/")->with("success", "updated");

    }

}
