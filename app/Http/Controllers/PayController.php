<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\TypePay;
use Illuminate\Http\Request;

class PayController extends Controller
{
    
    public function index()
    {
        $pay = Pay::all();

        return view('pay.index',compact('pay'));
    
    }
    public function create(){

        $orders = Order::all();
        $typePays = TypePay::all();
        return view('pay.create',['orders'=> $orders,'typePays'=> $typePays]);

    }

    
    public function store(Request $request)
    {
        $pay = new Pay();
        $pay->idOrder=$request->idOrder;
        $pay->idTypePay=$request->idTypePay;

        $pay->save();


        return Redirect()->route('pay.index',$pay);

    }

    
    public function show(Pay $pay)
    {
        return view('pay.show');
    }

    
    public function update(Request $request, Pay $pay)
    {
        $pay->idOrder=$request->idOrder;
        $pay->idTypePay=$request->idTypePay;

        $pay->save();


        return Redirect()->route('pay.index',$pay);
    }

    public function edit(Pay $pay){

        $orders = Order::all();
        $typePays = TypePay::all();

        return view('pay.edit', compact('pay','orders', 'typePays'));


  
       
     }

    
    public function destroy(Pay $pay)
    {
        $pay->delete();
        return back()->with('succes','Registro eliminado correctamente');
    }
}
