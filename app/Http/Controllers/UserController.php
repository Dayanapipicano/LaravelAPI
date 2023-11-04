<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol = Rol::all();

        return view('user.create',['rol'=> $rol]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name=$request->name;
        $user->lastName=$request->lastName;
        $user->typeDocument=$request->typeDocument;
        $user->document=$request->document;
        $user->phone=$request->phone;
        $user->idRol=$request->idRol;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        
        $user->save();

        return Redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.show');
    }
    
    public function shows()
    {
        $user = Auth::user();
        
        $rol = Rol::all();
        return view('perfil', compact('user','rol'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     public function updatePerfil(Request $request, User $user)
     {
         $user->name = $request->name;
         $user->lastName = $request->lastName;
         $user->typeDocument = $request->typeDocument;
         $user->document = $request->document;
         $user->email = $request->email;
         $user->password = $request->password;
          // Verifica si se ha cargado una nueva imagen
    if ($request->hasFile('image')) {
        // Generar un nombre de archivo único basado en la marca de tiempo y la extensión original
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        
        // Almacenar la imagen en la carpeta 'public/product'
        $request->file('image')->storeAs('public/product', $imageName);
        
        // Eliminar la imagen anterior (opcional) si lo deseas
        if ($user->image) {
            Storage::delete('public/product/' . $user->image);
        }

        // Asignar el nombre del archivo al atributo 'image' del modelo de producto
        $user->image = $imageName; // Almacena solo el nombre del archivo
    }
 
         $user->save();
 
         return redirect()->route('perfil', $user);
     }
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->typeDocument = $request->typeDocument;
        $user->document = $request->document;
        $user->idRol = $request->idRol;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect()->route('user.index', $user);
    }
    public function edit(User $user){

        $rol = Rol::all();

        return view('user.edit', compact('user', 'rol'));

       
     }
     public function perfil()
     {
         return view('perfil');
     }

     public function perfils(User $user){

        $rol = Rol::all();

        return view('perfil', compact('user', 'rol'));

       
     }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('succes','Registro eliminado correctamente');
    }

    public function validation(Request $request){
        $user = request()->only('email','password');
        
        if(Auth::attempt($user)){
            request()->session()->regenerate();
            return
            //view('catalogos.index');
            redirect('inicio');
        } else{
            return view('registro');
        }
    }
    public function destroySesion(Request $request){
Auth::guard('web')->logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
        return redirect()->route('inicio');;
    }
}
