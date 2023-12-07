<?php

namespace App\Http\Controllers;

use App\Models\TypePay;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class TypePayController extends Controller
{
     
    public function index()
    {
        $typepay = TypePay::all(); 
        return response()->json($typepay, Response::HTTP_OK);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
    
        $typepay = TypePay::create(['name' => $request->name]);
    
        return response()->json($typepay, Response::HTTP_CREATED);
    }
    

    public function show(TypePay $typepay)
    {
        return response()->json($typepay, Response::HTTP_OK);
    }

    public function update(Request $request, TypePay $typepay)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $typepay->update($request->all());

        return response()->json($typepay, Response::HTTP_OK);
    }


    public function edit(TypePay $typepay)
{
    return response()->json($typepay, Response::HTTP_OK);
}

    public function destroy(TypePay $typepay)
    {
        $typepay->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

}
