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
    
        // Crea el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'lastName' => $request->lastName,
            'typeDocument' => $request->typeDocument,
            'document' => $request->document,
            'phone' => $request->phone,
        ]);
    
        // Asigna el rol al usuario
        $requestedRole = $request->idRol;
        $defaultRole = Role::findByName('cliente');
    
        if (!$requestedRole && !$defaultRole) {
            // Log de error si no se proporciona idRol y no se encuentra el rol predeterminado
            Log::error('No role provided and default role not found.');
            return response()->json(['error' => 'No role provided and default role not found.'], 400);
        }
    
        $roleToAssign = $requestedRole ? Role::find($requestedRole) : $defaultRole;
    
        if (!$roleToAssign) {
            // Log de error si no se encuentra el rol proporcionado o el predeterminado
            Log::error('Role not found: ' . $requestedRole);
            return response()->json(['error' => 'Role not found: ' . $requestedRole], 400);
        }
    
        $user->assignRole($roleToAssign);
    
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
    public function logins(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        $user = auth()->user();
        $user->load('roles'); // Cargar roles
    
        // Asignar roles
        $userRoles = $user->roles->pluck('name')->toArray();
        $user->assignRole($userRoles);
    
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
    
    

    
    
    
    

    public function logout()
    {

        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was succesfully deleted'
        ];
    }
}
