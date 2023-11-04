<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $season = Season::all();

        return view('seasons.index', compact('season'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('seasons.create');

    }
    public function store(Request $request)
    {
        //

        $temp = new Season();
        $temp->name=$request->name;
        $temp -> save();

        return Redirect()->route('seasons.index',$temp);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        return view('seasons.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        $season->name = $request->name;

        $season->save();

        return redirect()->route('seasons.index', $season);
    }
    
    public function edit(Season $season){
        return view('seasons.edit',compact('season'));
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        $season->delete();
        return back()->with('succes','Registro eliminado correctamente');
    }
}
