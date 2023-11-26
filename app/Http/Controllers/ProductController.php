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
        // Obtener la lista de productos con información relacionada
        $products = Product::with('temporada')->get();

        // Modificar la URL de la imagen para incluir el dominio
        foreach ($products as $product) {
            if ($product->image) {
                $product->image = asset('storage/product/' . $product->image);
            }
        }

        // Devolver la respuesta con todos los datos, incluida la URL completa de la imagen
        return response()->json($products, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'price' => 'required|integer',
            'concentration' => 'required|integer',
            'idSeason' => 'required|integer'
        ]);

        try {

            if ($request->hasFile('image')) {
                $imageFile = $request->file('image');

                // Generar un nombre de archivo único basado en la marca de tiempo y la extensión original
                $imageName = time() . '.' . $imageFile->getClientOriginalExtension();


                $imageFile->storeAs('public/product', $imageName);
            }

            // Crear el producto en la base de datos
            $product = Product::create($request->except('image') + ['image' => $imageName]);

            // Asignar el nombre del archivo al atributo 'image' del modelo de producto (para la respuesta JSON)
            $product->image = $imageName;

            // Devolver la respuesta con el nombre de la imagen asignado
            return response()->json($product, Response::HTTP_CREATED);
        } catch (\Exception $e) {

            return response()->json(['error' => 'Error al guardar el producto.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }





    public function show(Product $product)
    {
        // Verificar si la propiedad 'image' está presente y no es nula
        if ($product->image) {
            // Construir la URL completa para la imagen utilizando el helper asset
            $product->image = asset('storage/product/' . $product->image);
        }

        // Responder con el producto modificado
        return response()->json($product, Response::HTTP_OK);
    }




    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:1000',
            'price' => 'required|integer',
            'concentration' => 'required|integer',
            'idSeason' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        try {
            $response = null; // Definir la variable $response antes del bloque try

            if ($request->hasFile('image')) {
                $imageFile = $request->file('image');

                // Generar un nombre de archivo único basado en la marca de tiempo y la extensión original
                $imageName = time() . '.' . $imageFile->getClientOriginalExtension();

                // Almacenar la nueva imagen en la carpeta 'public/product'
                $imageFile->storeAs('public/product', $imageName);

                // Eliminar la imagen anterior si existe
                if ($product->image) {
                    Storage::delete('public/product/' . $product->image);
                }

                // Actualizar el modelo con la nueva información, incluido el nombre de la nueva imagen
                $product->update($request->except('image') + ['image' => $imageName]);

                // Asignar el nombre del archivo al atributo 'image' del modelo de producto (para la respuesta JSON)
                $product->image = $imageName;

                // Devolver la respuesta con la información actualizada
                $response = response()->json($product, Response::HTTP_OK);
            } else {
                // Si no se proporciona una nueva imagen, simplemente actualizar el modelo con la información existente
                $product->update($request->except('image'));

                // Devolver la respuesta con la información actualizada
                $response = response()->json($product, Response::HTTP_OK);
            }
        } catch (\Exception $e) {
            // Capturar cualquier excepción y devolver un mensaje de error
            $response = response()->json(['error' => 'Error al actualizar el producto.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return $response; // Devolver la respuesta después del bloque try
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
