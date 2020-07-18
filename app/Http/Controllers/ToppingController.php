<?php

namespace App\Http\Controllers;

use \App\Topping;
use Illuminate\Http\Request;

class ToppingController extends Controller
{
    //
    function index(){
        $toppings = Topping::all();
        return view('Topping.manageTopping')->with('toppings', $toppings);
    }

    function insertPage(){
        return view('Topping.createTopping');
    }

    function insert(Request $req){
        $req->validate([
            'topping_name' => 'required|min:4|max:15|unique:toppings,topping_name,NULL,id,deleted_at,NULL',
            'topping_price' => 'required|numeric|min:2000',
            'topping_picture' => 'required|image',
        ]);

        $top = new Topping();
        $top->topping_name = $req->input('topping_name');
        $top->topping_price = $req->input('topping_price');

        $path = $req->topping_picture->storeAs('', $req->topping_picture->getClientOriginalName());

        $top->topping_picture = $path;

        $top->save();

        return redirect()->route('topping');
    }

    function updatePage($id){
        $topping = Topping::find($id);

        return view('Topping.updateTopping')->with('topping', $topping);
    }

    function update(Request $req){
        $req->validate([
            "topping_name" => "required|min:4|max:15|unique:toppings,topping_name,{$req->id},id,deleted_at,NULL",
            "topping_price" => "required|numeric|min:2000",
            "toppping_picture" => "image",
        ]);
        
        $topping = Topping::find($req->id);

        $topping->topping_name = $req->input("topping_name");
        $topping->topping_price = $req->input("topping_price");

        if($req->hasFile('topping_picture')){
            $path = $req->topping_picture->storeAs('', $req->topping_picture->getClientOriginalName());
            $topping->topping_picture = $path;
        }
        $topping->save();

        return redirect()->route('topping');
    }

    function delete($id){
        $top = Topping::find($id);
        $top->delete();
    
        return redirect()->route('topping');
    }
}
