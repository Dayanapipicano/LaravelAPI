<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorite = Favorite::all();

        return view('favorite.index', compact('favorite'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $favorite = new Favorite();
        $favorite->idUser=$request->idUser;
        $favorite->idProduct=$request->idProduct;
        $favorite->save();


        return Redirect()->route('favorite.index',$favorite);
    }
    public function create()

    {
        $users = User::all();
        $products = Product::all();
        return view('favorite.create',['products'=> $products,'users'=> $users]);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        return view('favorite.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        $favorite->idUser=$request->idUser;
        $favorite->idProduct=$request->idProduct;
        $favorite->save();


        return Redirect()->route('favorite.index',$favorite);
    }

    public function edit(Favorite $favorite){

        $users = User::all();
        $products = Product::all();

        return view('favorite.edit', compact('favorite','users', 'products'));


  
       
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
        return back()->with('succes','Registro eliminado correctamente');
    }
}
