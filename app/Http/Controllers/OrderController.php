<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();

        return view('order.index',compact('order'));
    }
    public function create(){
        $shoppingCarts = ShoppingCart::all();
       
        return view('order.create',['shoppingCarts'=> $shoppingCarts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $order= new Order();
        $order->dateOrder=$request->dateOrder;
        $order->idShoppingCart=$request->idShoppingCart;

        $order->save();

        return Redirect()->route('order.index',$order);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        
        $order->dateOrder=$request->dateOrder;
        $order->idShoppingCart=$request->idShoppingCart;

        $order->save();

        return Redirect()->route('order.index',$order);
    }

    public function edit(Order $order){

        $shoppingCarts = ShoppingCart::all();

        return view('order.edit', compact('order', 'shoppingCarts'));

       
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('succes','Registro eliminado correctamente');
    }
}
