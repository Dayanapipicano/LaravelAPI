<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShoppingCartController extends Controller
{



    public function index()
    {
        $shoppingCarts = ShoppingCart::with(['user', 'product'])->get();
    
        foreach ($shoppingCarts as $shoppingCart) {
            $product = $shoppingCart->product;
    
            if ($product->image) {
                $product->image = asset('storage/product/' . $product->image);
            }
        }
    
        return response()->json($shoppingCarts, Response::HTTP_OK);
    }
    


    public function agregarProducto(Request $request)
    {
        $user = auth()->user();
    
        $request->validate([
            'idProduct' => 'required|integer',
            'product_quantity' => 'required|integer',
        ]);
    
        try {
            // Verificar si el producto ya está en el carrito
            $existingCartItem = ShoppingCart::where('idUser', $user->id)
                ->where('idProduct', $request->idProduct)
                ->first();
    
            if ($existingCartItem) {
                // Si ya existe, actualizar la cantidad
                $existingCartItem->increment('product_quantity', $request->product_quantity);
            } else {
                // Si no existe, crear un nuevo registro en el carrito de compras
                ShoppingCart::create([
                    'idUser' => $user->id,
                    'idProduct' => $request->idProduct,
                    'product_quantity' => $request->product_quantity,
                ]);
            }
    
            // Obtener los detalles del producto recién agregado
            $productDetails = Product::find($request->idProduct);
    
            return response()->json([
                'message' => 'Producto agregado al carrito correctamente',
                'product_details' => $productDetails,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al procesar la solicitud.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    
    



    public function show(ShoppingCart $shoppingCart)
    {
        return response()->json($shoppingCart, Response::HTTP_OK);
    }




    public function update(Request $request, ShoppingCart $shoppingCart)
    {
        $request->validate([
            'product_quantity' => 'required|integer',
            'idUser' => 'required|integer',
            'idProduct' => 'required|integer'
        ]);
    
        // Actualizar el carrito de compras
        $shoppingCart->update($request->only(['idUser', 'idProduct', 'product_quantity']));
    
        // Cargar las relaciones actualizadas
        $shoppingCart->load(['user', 'product']);
    
        return response()->json($shoppingCart, Response::HTTP_OK);
    }
    




    public function edit(ShoppingCart $shoppingCart)
    {
        $shoppingCart->load(['user', 'product']);
    
        return response()->json([
            'shoppingCart' => $shoppingCart,
            'users' => User::all(),
            'products' => Product::all(),
        ], Response::HTTP_OK);
    }
    

 


    public function destroy(ShoppingCart $shoppingCart)
    {
        $user = auth()->user();
        $shoppingCart->delete();
    
        return response()->json(['message' => 'Carrito de compras eliminado correctamente'], Response::HTTP_OK);
    }

    
}
