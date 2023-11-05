<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SeasonController extends Controller
{
   
    public function index()
    {
        $seasons = Season::all(); // Paginación para evitar respuestas largas
        return response()->json($seasons, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',

        ]);

        $season = Season::create($request->all());

        return response()->json($season, Response::HTTP_CREATED);
    }

    public function show(Season $season)
    {
        return response()->json($season, Response::HTTP_OK);
    }

    public function update(Request $request, Season $season)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $season->update($request->all());

        return response()->json($season, Response::HTTP_OK);
    }


    public function edit(Season $season)
{
    return response()->json($season, Response::HTTP_OK);
}

    public function destroy(Season $season)
    {
        $season->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    protected function failedValidation(Request $request, $validator)
    {
        throw (new ValidationException($validator))
            ->redirectTo($this->getValidationErrorsRedirect($request));
    } 
    

    protected function getValidationErrorsRedirect(Request $request)
    {
        return url()->previous(); // Redireccionar a la página anterior en caso de error de validación
    }




}






