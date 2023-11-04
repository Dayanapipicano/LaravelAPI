<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Season;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Image::all();

        return view('image.index',compact('image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new Image();
        $image->url=$request->url;
        $image->images_id=$request->images_id;
        $image->images_type=$request->images_type;

        $image->save();


        return Redirect()->route('image.index',$image);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('image.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

     public function edit($images_id, $images_type) {
        dd($images_id, $images_type);
        $image = Image::where('images_id', $images_id)->where('images_type', $images_type)->firstOrFail();
        $seasons = Season::all(); 
        return view('image.edit', compact('image', 'seasons'));
    }
    
    public function update(Request $request, $images_id, $images_type)
    {

        dd($images_id, $images_type, $request->all());
        $image = Image::where('images_id', $images_id)->where('images_type', $images_type)->firstOrFail();
    
        $image->url = $request->url;
        $image->images_id = $request->images_id;
        $image->images_type = $request->images_type;
    
        $image->save();
    
        return redirect()->route('image.index')->with('success', 'Imagen actualizada exitosamente.');
    }
    

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function destroy($images_id, $images_type)
{
   
    Image::where('images_id', $images_id)->where('images_type', $images_type)->delete();
    return back()->with('success', 'Registro eliminado correctamente');
}
}
