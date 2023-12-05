<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use \stdClass;

class AuthController extends Controller
{

    //------DEL LADO DEL CLIENTE-----

    //REGISTRO DE USUSARIO 

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'lastName' => 'required|string|max:255',
            'typeDocument' => 'required|string|max:255',
            'document' => 'required|integer',
            'phone' => 'required|integer',
            'idRol' => 'nullable|integer',
            'image' => 'image|mimes:jpeg,png,jpg',


        ]);

        if ($validator->fails()) {
            // Log de errores de validación
            Log::error('Validation failed: ' . json_encode($validator->errors()));
            return response()->json($validator->errors());
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'lastName' => $request->lastName,
            'typeDocument' => $request->typeDocument,
            'document' => $request->document,
            'phone' => $request->phone,
            'image' => 'perfil.jpg',
        ]);
        $requestedRole = $request->idRol;
        $defaultRole = Role::findByName('cliente');

        $roleToAssign = $requestedRole ? Role::find($requestedRole) : $defaultRole;

        $user->assignRole($roleToAssign);

        // Asigna permisos basados en el rol
        $permissions = $roleToAssign->permissions->pluck('name')->toArray();
        $user->givePermissionTo($permissions);

        // Genera el token de acceso
        $token = $user->createToken('auth_token')->plainTextToken;
        // Log de éxito
        Log::info('User registered successfully: ' . json_encode($user));

        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }


    //LOGIN 

    public function logins(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = auth()->user();

        // Cargar solo los nombres de los roles
        $user->load('roles:name');

        // Asignar roles
        $userRoles = $user->roles->pluck('name')->toArray();

        // Asignar permisos basados en los roles
        $permissions = Role::whereIn('name', $userRoles)->get()->flatMap->permissions->pluck('name')->toArray();
        $user->givePermissionTo($permissions);

        // Crear el token con roles
        $token = $user->createToken('auth_token', ['roles' => $userRoles])->plainTextToken;

        $response = [
            'message' => 'Hi ' . $user->name,
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
            'roles' => $userRoles,
            'permissions' => $permissions,
        ];

        // No redireccionar, solo responder con JSON
        return response()->json($response);
    }



    //CIERRE DE SESION


    public function logout()
    {

        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was succesfully deleted'
        ];
    }





    public function updateProfile(Request $request)
    {
        $user = auth()->user();
    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'typeDocument' => 'required|string|max:255',
            'document' => 'required|integer',
            'phone' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'current_password' => 'sometimes|required|string|min:8',
            'new_password' => $request->filled('current_password') ? 'required|string|min:8|confirmed' : '',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($validator->fails()) {
      
            abort(422, $validator->errors());
        }
    
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                
                abort(422, ['message' => 'La contraseña actual no es válida.']);
            }
    
            if ($request->filled('new_password')) {
                $user->update([
                    'password' => Hash::make($request->new_password),
                    'new_password_confirmation' => $request->new_password_confirmation,
                ]);
    
                Auth::user()->tokens()->where('id', Auth::user()->currentAccessToken()->id)->update(['last_used_at' => now()]);
            }
        }
    
        if ($request->hasFile('image')) {
           
            Storage::delete('public/product/' . $user->image);
    
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->storeAs('public/product', $imageName);
    
            $user->image = $imageName;
        } elseif ($request->input('image') === null) {
            Storage::delete('public/product/' . $user->image);
            $user->image = null;
        }
    
        $user->update([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'typeDocument' => $request->typeDocument,
            'document' => $request->document,
            'phone' => $request->phone,
            'email' =>  $request->email,
        ]);
    
        // Cambiar la respuesta exitosa
        return response()->json(['exitoso' => true, 'mensaje' => 'Perfil actualizado con éxito', 'user' => $user]);
    }
    
    



    //TE MANDA LOS DATOS SOLO DEL USUSARIO CON EL QUE INICIO SESION
    public function getPerfil()
    {
        $user = auth()->user();
        $token = $user->createToken('auth_token')->plainTextToken;
    
        // Verificar y ajustar la URL completa de la imagen en el perfil
        if ($user->image) {
            $user->image = asset('storage/product/' . $user->image);
        }
    
        Log::info('User profile information: ' . json_encode($user));
        Log::info('Token in getPerfil: ' . $token);
    
        return response()->json(['accessToken' => $token, 'user' => $user]);
    }
    
}
