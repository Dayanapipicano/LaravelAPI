<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{


    //ESTE SERIA PARA ADMIN
    public function index()
    {
        $order = Order::with([
            'shoppingCart' => function ($query) {
                $query->with(['user', 'product']); // Agregar las relaciones deseadas en el carrito de compras
            },
            'typePay'
        ])->get();
    
        return response()->json($order, Response::HTTP_OK);
    }
    

    
    public function store(Request $request)
    {
        $request->validate([
            'idShoppingCart' => 'required|integer',
            'idTypePay' => 'required|integer',
        ]);
    
        $order = Order::create($request->all());

        return response()->json($order, Response::HTTP_CREATED);
    }
    

    public function show(Order $order)
    {
        return response()->json($order, Response::HTTP_OK);
    }


    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }


}
