<?php

namespace App\Http\Controllers;

use App\Models\TypePay;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypePayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typePay = TypePay::all();

        return view('typePay.index', compact('typePay'));
    }
    public function create(){
        return view('typePay.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formaDePago = new TypePay();
        $formaDePago->name=$request->name;
        $formaDePago->save();


        return Redirect()->route('typePay.index',$formaDePago);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypePay  $typePay
     * @return \Illuminate\Http\Response
     */
    public function show(TypePay $typePay)
    {
        return view('typePay.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypePay  $typePay
     * @return \Illuminate\Http\Response
     */

     public function edit(TypePay $typePay){
        return view('typePay.edit',compact('typePay'));
     }
    public function update(Request $request, TypePay $typePay)
    {
        $typePay->name = $request->name;

        $typePay->save();

        return redirect()->route('typePay.index', $typePay);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypePay  $typePay
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypePay $typePay)
    {
        $typePay->delete();
        return back()->with('succes','Registro eliminado correctamente');
    }
}
