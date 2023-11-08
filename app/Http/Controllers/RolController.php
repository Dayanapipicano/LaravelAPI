<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Http\Response;





class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
       $rol = Rol::all();
       return response()->json($rol,Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'name' => 'required|max:255'
        ]);

        $rol = Rol::create($request->all());

        return response()->json($rol, Response::HTTP_CREATED);
    }
    public function create()
    {
        return view('roles.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
    
            return response()->json($rol, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol)
    {
      
        $request->validate([
            'name' => 'required|max:225',
        ]);

        $rol->update($request->all());

        return response()->json($rol, Response::HTTP_OK);
    }



    public function edit(Rol $rol){
        return response()->json($rol, Response::HTTP_OK);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
    
        $rol->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }


    
    
}
