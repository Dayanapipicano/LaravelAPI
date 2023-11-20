<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
    
        if ($user && $user->hasRole('admin')) {
            $users = User::with('roles')->get();
            return response()->json($users, Response::HTTP_OK);
        } else {
            return response()->json(['error' => 'No tienes permisos para acceder a estos datos.'], 403);
        }
    }
    
    
    
    

/* 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'lastName' => 'required|max:255',
            'typeDocument' => 'required|max:255',
            'document' => 'required|integer',
            'phone' => 'required|integer',
            'idRol' => 'required|integer',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|max:255',
        ]);


        $userData = $request->all();
        $userData['password'] = Hash::make($request->input('password'));

        $user = User::create($userData);

        return response()->json($user, Response::HTTP_CREATED);
    }
 */



    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'lastName' => 'required|max:255',
            'typeDocument' => 'required|max:255',
            'document' => 'required|integer',
            'phone' => 'required|integer',
            'idRol' => 'required|integer',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);
    
        $user->fill($request->except('password')); // Actualiza todos los campos excepto la contraseña
    
        if ($request->has('password')) {
            // Si el campo de contraseña no está vacío, actualiza la contraseña
            $user->password = bcrypt($request->input('password'));
        }
    
        $user->save();
    
        return response()->json($user, Response::HTTP_OK);
    }
    


    public function edit($id)
{
    $user = User::with('role')->find($id);

    if (!$user) {
        return response()->json(['error' => 'Usuario no encontrado'], Response::HTTP_NOT_FOUND);
    }

    return response()->json($user, Response::HTTP_OK);
}



 




    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }



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
}
