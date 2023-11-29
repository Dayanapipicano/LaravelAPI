<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;


class ProductController extends Controller
{
    //----CRUD PRODUCTO

    public function index()
    {
    
        $products = Product::with('temporada')->get();

      
        foreach ($products as $product) {
            if ($product->image) {
                $product->image = asset('storage/product/' . $product->image);
            }
        }


        return response()->json($products, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'price' => 'required|integer',
            'concentration' => 'required|integer',
            'idSeason' => 'required|integer'
        ]);

        try {

            if ($request->hasFile('image')) {
                $imageFile = $request->file('image');

               
                $imageName = time() . '.' . $imageFile->getClientOriginalExtension();


                $imageFile->storeAs('public/product', $imageName);
            }

          
            $product = Product::create($request->except('image') + ['image' => $imageName]);

         
            $product->image = $imageName;

         
            return response()->json($product, Response::HTTP_CREATED);
        } catch (\Exception $e) {

            return response()->json(['error' => 'Error al guardar el producto.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }





    public function show(Product $product)
    {
        
        if ($product->image) {
            
            $product->image = asset('storage/product/' . $product->image);
        }


        return response()->json($product, Response::HTTP_OK);
    }




    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'price' => 'required|integer',
            'concentration' => 'required|integer',
            'idSeason' => 'required|integer'
        ]);
    
        try {

         
            // Eliminar la imagen antigua si se proporciona una nueva
            if ($request->hasFile('image')) {
                Storage::delete('public/product/' . $product->image);
    
                $imageFile = $request->file('image');
                $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
                $imageFile->storeAs('public/product', $imageName);
    
                $product->image = $imageName;
            }
    
          
            $product->update($request->except('image'));
   
            return response()->json($product, Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el producto.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    



    public function edit($id)
    {
        $product = Product::with('temporada')->find($id);

        if (!$product) {
            return response()->json(['error' => 'Usuario no encontrado'], Response::HTTP_NOT_FOUND);
        }

        // Obtener la URL base del almacenamiento público
        $baseUrl = asset('storage/product/');

        // Si la imagen existe, construir la URL completa
        if ($product->image) {
            $product->image = $baseUrl . '/' . $product->image;
        }

        return response()->json($product, Response::HTTP_OK);
    }



    public function destroy(Product $product)
    {
        try {

            if ($product->image) {
                Storage::delete('public/product/' . $product->image);
            }


            $product->delete();


            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (\Exception $e) {

            return response()->json(['error' => 'Error al eliminar el producto.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }




    //FILTRO TEMPORADA

    public function productTemporada($seasonId)
    {
        // Verifica si se proporcionó un ID de temporada válido
        if (!$seasonId || !Season::find($seasonId)) {
            return response()->json(['error' => 'Season not found'], 404);
        }

        // Filtra los productos según la temporada seleccionada y carga la relación 'temporada'
        $products = Product::with('temporada')->where('idSeason', $seasonId)->get();


        foreach ($products as $product) {
            if ($product->image) {

                $product->image = asset('storage/product/' . $product->image);
            }
        }

        return response()->json($products);
    }
}






































  //INSERTAR PDF
       /*  $img= $request->file("imagen");
        $nombreArchivo= "pdf_".time().".".$img->guessExtension();
        $request-> file("imagen")->storeAs('public/imagenes', $nombreArchivo);
        $producto -> imagen = $nombreArchivo;

        $producto->precio= $request->precio;
        $producto->idTemporada = $request->idTemporada; */
