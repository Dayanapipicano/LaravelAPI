<?php

namespace App\Http\Controllers;

use App\Models\Returns;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PQR;
use Illuminate\Http\Request;

class ReturnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returns = Returns::all();

        return view('returns.index', compact('returns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $orders = Order::all();
        $pqrs = PQR::all();
        return view('returns.create',['orders'=> $orders,'pqrs'=> $pqrs]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $returns = new Returns();
        $returns->reason=$request->reason;
        $returns->idOrder=$request->idOrder;
        $returns->idPqr=$request->idPqr;

        $returns->save();


        return Redirect()->route('returns.index',$returns);

    }
    public function show(Returns $returns)
    {
        return view('returns.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Returns  $returns
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Returns $returns)
    {
        $returns->reason = $request->reason;
        $returns->idOrder = $request->idOrder;
        $returns->idPqr = $request->idPqr;
    
        $returns->save();

        return redirect()->route('returns.index', $returns);
    }

    public function edit(Returns $returns){

        $orders = Order::all();
        $pqrs = PQR::all();

        return view('returns.edit', compact('returns','orders', 'pqrs'));


  
       
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Returns  $returns
     * @return \Illuminate\Http\Response
     */
    public function destroy(Returns $returns)
    {
        $returns->delete();
        return back()->with('succes','Registro eliminado correctamente');
    }
}
