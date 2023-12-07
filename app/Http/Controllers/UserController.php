<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {

        //---DEL LADO DEL ADMIN O CRUD

        $users = User::with('roles')->get();
        return response()->json($users, Response::HTTP_OK);

    }
    
    

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


   
    
    
}
