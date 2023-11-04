<?php

namespace App\Http\Controllers;

use App\Models\NotificationOrder;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class NotificationOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificationOrder = NotificationOrder::all();

        return view('notificationOrder.index',compact('notificationOrder'));
    }



    public function create(){

        $orders = Order::all();
        return view('notificationOrder.create',['orders'=> $orders]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notificationOrder = new NotificationOrder();
        $notificationOrder->mensaje=$request->mensaje;
        $notificationOrder->idOrder=$request->idOrder;

        $notificationOrder->save();


        return Redirect()->route('notificationOrder.index',$notificationOrder);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NotificationOrder  $notificationOrder
     * @return \Illuminate\Http\Response
     */
    public function show(NotificationOrder $notificationOrder)
    {
        return view('notificationOrder.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotificationOrder  $notificationOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotificationOrder $notificationOrder)
    {
        $notificationOrder->mensaje=$request->mensaje;
        $notificationOrder->idOrder=$request->idOrder;

        $notificationOrder->save();


        return Redirect()->route('notificationOrder.index',$notificationOrder);
    }

    public function edit(NotificationOrder $notificationOrder){

        $orders = Order::all();

        return view('notificationOrder.edit', compact('notificationOrder', 'orders'));

       
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotificationOrder  $notificationOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotificationOrder $notificationOrder)
    {
        $notificationOrder->delete();
        return back()->with('succes','Registro eliminado correctamente');
    }
}
