<?php

namespace App\Http\Controllers;

use App\TransactionHeader;
use App\TransactionDetail;
use App\User;
use App\Drink;
use App\Topping;
use App\SizeType;
use App\SugarType;
use App\IceType;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransactionHeaderController extends Controller
{
    //
    function index(){
        $transactions = TransactionHeader::with('drink')
                            ->whereHas('drink', function($query) {
                                $query->where('drinks.drink_name', 'LIKE', '%'.request()->search.'%');
                            })
                            ->paginate(5); 
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
        
        return view('Transaction.manageTransaction', ['transactions' => $transactions])->with('total', $total);
    }

    function insertPage(){
        $drinks = Drink::all();
        $toppings = Topping::all();
        $sizes = SizeType::all();
        $sugars = SugarType::all();
        $ices = IceType::all();

        if($drinks->count() > 0){
            return view('Transaction.createTransaction')->with('drinks', $drinks)
                                                        ->with('toppings', $toppings)
                                                        ->with('sizes', $sizes)
                                                        ->with('sugars', $sugars)
                                                        ->with('ices', $ices);
        }
        else{
            return redirect()->back()->withErrors(['Insert Drink First']);
        }
    }

    function insert(Request $req){
        $req->validate([
            'user_name' => 'required|exists:users,user_name',
            'drink_size' => 'required',
            'sugar_level' => 'required',
            'ice_level' => 'required',
        ]);
        
        $transaction = new TransactionHeader();
        
        $user = User::where('user_name', $req->user_name)->where('deleted_at', null)->get();
        if($user->count() <= 0){
            return redirect()->back()->withErrors(['user_name'=>'The Customer is not exists']);
        }
        $transaction->user_id = $user[0]->id;
        $transaction->drink_id = $req->input('drink_id');
        $transaction->size_id = $req->input('drink_size');
        $transaction->sugar_id = $req->input('sugar_level');
        $transaction->ice_id = $req->input('ice_level');
        $transaction->transaction_date = date('Y-m-d H:i:s');
        
        $transaction->save();

        if($req->input('toppings')){
            $toppings = $req->input('toppings');
            foreach ($toppings as $top) {
                $transDetail = new TransactionDetail();
                $transDetail->transaction_header_id = $transaction->id;
                $transDetail->topping_id = $top;
                $transDetail->save();
            }
        }

        return redirect()->route('transaction');
    }
    
}
