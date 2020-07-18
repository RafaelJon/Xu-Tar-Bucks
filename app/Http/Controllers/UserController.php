<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\TransactionHeader;

class UserController extends Controller
{
    //
    function index(){
        $users = User::all();

        return view('User.manageUser')->with('users', $users);
    }

    function create(Request $req){
        $req->validate([
            'name'  => 'required|min:6|max:30|unique:users,user_name,NULL,id,deleted_at,NULL'
        ]);

        $user  = new User();

        $user->user_name = $req->input('name');

        $user->save();
        
        return redirect()->back()->with('successInsert', 'Success Insert new Customer!');
    }

    function delete($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user');    
    }

    function updatePage($id){
        $user = User::find($id);
        $transactions = TransactionHeader::where('user_id', $id)->get();
        $total = [];
        $i=0;
        foreach ($transactions as $val) {
            $total[$i] = $val->drink->drink_price;
            $total[$i] += $val->size->price_extra;
            foreach ($val->topping as $t) {
                $total[$i] += $t->topping_price;
            }
            $i+=1;
        }
        return view('User.updateUser')->with('user', $user)->with('transactions', $transactions)->with('total', $total);
    }

    function update(Request $req){
        $req->validate([
            'user_name'  => "required|min:6|max:30|unique:users,user_name,{$req->id},id,deleted_at,NULL",
            'user_dob' => 'nullable|date',
            'user_phone' => 'nullable|numeric|max:11',
        ]);

        $user = User::find($req->id);

        $user->user_name = $req->input('user_name');
        $user->user_dob = $req->input('user_dob');
        $user->user_phone = $req->input('user_phone');

        $user->save();

        return redirect()->route('user');
    }
}
