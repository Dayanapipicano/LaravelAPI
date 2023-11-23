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


   


    //LOGICA QUE ACTUALIZA PERFIL

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'typeDocument' => 'required|string|max:255',
            'document' => 'required|integer',
            'phone' => 'required|integer',
            'current_password' => 'sometimes|required|string|min:8',
            'new_password' => $request->filled('current_password') ? 'required|string|min:8|confirmed' : '',
        ]);
        
        
    
        if ($validator->fails()) {
            Log::error('Validation failed during profile update: ' . json_encode($validator->errors()));
            return response()->json($validator->errors(), 422);
        }
    
        // Verificar la contraseña actual si se proporciona
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json(['message' => 'La contraseña actual no es válida.'], 422);
            }
    
            // Actualizar la contraseña si se proporciona una nueva
            if ($request->filled('new_password')) {
                $user->update(['password' => Hash::make($request->new_password)]);
            }
        }
    
        // Actualizar otros detalles del perfil
        $user->update([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'typeDocument' => $request->typeDocument,
            'document' => $request->document,
            'phone' => $request->phone,
        ]);
    
        // Log de éxito
        Log::info('User profile updated successfully: ' . json_encode($user));
    
        return response()->json(['message' => 'Perfil actualizado con éxito', 'user' => $user]);
    }

    
    //TE MANDA LOS DATOS SOLO DEL USUSARIO CON EL QUE INICIO SESION
    public function getPerfil()
    {
        $user = auth()->user();
        $token = $user->createToken('auth_token')->plainTextToken;
    
        // Log o imprime la información del usuario y el token para depuración
        Log::info('User profile information: ' . json_encode($user));
        Log::info('Token in getPerfil: ' . $token);
    
        return response()->json(['user' => $user]);
    }
    
    
    
}
