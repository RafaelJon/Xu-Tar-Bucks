<?php

namespace App\Http\Controllers;

use App\Drink;
use App\DrinkType;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    //
    function index(){
        $drinks = Drink::all();

        return view('Drink.manageDrink')->with('drinks', $drinks);
    }

    function insertPage(){
        $drinkTypes = DrinkType::all();
        return view('Drink.createDrink')->with('drinkTypes', $drinkTypes);
    }

    function insert(Request $req){
        $req->validate([
            'drink_name' => 'required|min:5|max:20|unique:drinks,drink_name,NULL,id,deleted_at,NULL',
            'drink_price' => 'required|numeric|min:10000',
            'drink_picture' => 'required|image',
            'drink_type' => 'required',
        ]);

        $drink = new Drink();
        $drink->drink_name = $req->input('drink_name');
        $drink->drink_price = $req->input('drink_price');
        $drink->drink_type_id = $req->input('drink_type');

        $path = $req->drink_picture->storeAs('', $req->drink_picture->getClientOriginalName());

        $drink->drink_picture = $path;

        $drink->save();

        return redirect()->route('drink');
    }

    function updatePage($id){
        $drink = Drink::find($id);
        $drinkType = DrinkType::all();
        return view('Drink.updateDrink')->with('drink', $drink)->with('drinkType', $drinkType);
    }

    function update(Request $req){
        $drink = Drink::find($req->id);
        $req->validate([
            'drink_name' => 'required|min:5|max:20|unique:drinks,drink_name,{$req->id},id,deleted_at,null',
            'drink_price' => 'required|numeric',
            'drink_type' => 'requiered'
        ]);

        $drink = Drink::find($req->id);
        
        $drink->drink_name = $req->input('drink_name');
        $drink->drink_price = $req->input('drink_price');
        $drink->drink_type_id = $req->input('drink_type');

        if($req->hasFile('drink_picture')){
            $path = $req->drink_picture->storeAs('', $req->drink_picture->getClientOriginalName());
            $drink->drink_picutre = $path;
        }

        $drink->save();

        return redirect()->route('drink');
    }

    function delete($id){
        $drink = Drink::find($id);
        $drink->delete();
    
        return redirect()->route('drink');
    }
}
