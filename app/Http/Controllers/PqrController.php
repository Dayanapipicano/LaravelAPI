<?php

namespace App\Http\Controllers;

use App\Models\PQR;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PQRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pqr = PQR::all();

        return view('pqr.index', compact('pqr'));
    }


    public function create()

    {
        $users = User::all();
      
        return view('pqr.create',['users'=> $users]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pqr = new PQR();
        $pqr->reason = $request->reason;
        $pqr->idUser = $request->idUser;
        $pqr->save();
    
        
        return redirect()->route('pqrs.index',$pqr);
     
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PQR  $pQR
     * @return \Illuminate\Http\Response
     */
    public function show(PQR $pQR)
    {
        return view('pqr.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PQR  $pQR
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PQR $pqr)
    {
        $pqr->reason=$request->reason;
        $pqr->idUser=$request->idUser;
        $pqr->save();

        return redirect()->route('pqrs.index',$pqr);
    }

    public function edit(PQR $pqr){

        $users = User::all();

        return view('pqr.edit', compact('pqr', 'users'));

       
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PQR  $pQR
     * @return \Illuminate\Http\Response
     */
    public function destroy(PQR $pqr)
    {
        $pqr->delete();
        return back()->with('succes','Registro eliminado correctamente');
    }
}
