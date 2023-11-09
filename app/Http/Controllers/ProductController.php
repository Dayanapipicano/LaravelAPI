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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     

        $rol = Product::with('temporada')->get();
        return response()->json($rol,Response::HTTP_OK);
 
    }


    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            /* 'image' => 'required|max:255', */
            'price' => 'required|integer',
            'concentration' => 'required|integer',
            'idSeason' => 'required|integer' 
        
        ]);

        

        $product = Product::create($request->all());
        return response()->json($product, Response::HTTP_CREATED);
    
    }

    
    public function show(Product $product)
    {
        return response()->json($product, Response::HTTP_OK);
    }
 

 

     public function update(Request $request, Product $product)
{

 /*    $id = (int)$request->id; */

    $request->validate([
        'name' => 'required|max:255',
        'description' => 'required|max:1000',
        /* 'image' => 'required|max:255', */
        'price' => 'required|integer',
        'concentration' => 'required|integer',
        'idSeason' => 'required|integer'
    
    ]);


    $product->update($request->all());


    return response()->json($product, Response::HTTP_OK);

    
 
}


    public function edit($id){

        $product = Product::with('temporada')->find($id);
        if (!$product) {
            return response()->json(['error' => 'Usuario no encontrado'], Response::HTTP_NOT_FOUND);
        }

      return response()->json($product,Response::HTTP_OK);

       
     }
    
    public function destroy(Product $product)
    {
        
      /*   if ($product->image) {
            Storage::delete('public/product/' . $product->image);
        } */
    
        $product->delete();
        
      return response()->json(null,Response::HTTP_NO_CONTENT);
    }













    public function primavera()
    {
        $productosPrimavera = Product::where('idSeason', 1)->get();
    
      
    
        return view('product.primavera', ['productosPrimavera' => $productosPrimavera]);
    }
    
    public function verano()
    {
        $productosVerano = Product::where('idSeason', 2)->get(); 
    
      
    
        return view('product.verano', ['productosVerano' => $productosVerano]);
    }
    public function otoño()
    {
        $productosOtoño = Product::where('idSeason', 3)->get(); 
    
      
    
        return view('product.otoño', ['productosOtoño' => $productosOtoño]);
    }
    public function invierno()
    {
        $productosInvierno = Product::where('idSeason', 4)->get(); 
    
      
    
        return view('product.invierno', ['productosInvierno' => $productosInvierno]);
    }
    
    
    public function catalogo()
    {
        $product = Product::all();
      
        return $product;
    
    }

  


}






































  //INSERTAR PDF
       /*  $img= $request->file("imagen");
        $nombreArchivo= "pdf_".time().".".$img->guessExtension();
        $request-> file("imagen")->storeAs('public/imagenes', $nombreArchivo);
        $producto -> imagen = $nombreArchivo;

        $producto->precio= $request->precio;
        $producto->idTemporada = $request->idTemporada; */
