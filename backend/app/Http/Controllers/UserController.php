<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){
        $data = $request->all();
        $validator = Validator::make($request->all(),[
            "name" => "required|string|max:50",
            "email" => "required|unique:users|max:50",
            "password" => "required|unique:users|max:50"
        ]);

        if ($validator) {
            $user = new User();
            $user->name = $data["name"];
            $user->email = $data["email"];
            $user->password = Hash::make($data["password"]);

            $result = $user->save();

            if ($result) {
                return response()->json([
                    "status" => 200,
                    "success" => true,
                    "message" => "Nuevo usuario registrado con exito!!!"
                ]);
            }else{
                return response()->json([
                    "status" => 400,
                    "success" => false,
                    "message" => "Hubo un error"
                ]);
            }
        } else {
            return response()->json([
                "status" => 400,
                "success" => false,
                "error" => $validator->errors(),
            ]);
        }
        
    }




    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');

        $token = Auth::attempt($credentials);

        if (!$token) {
             return response()->json([
                "status" => 400,
                "success" => false,
                "error" => "Credenciales incorrectas",
            ]);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'status' => 200,
            'message' => 'Login exitoso!!!',
            'user' => $user,
            'token' => $token
        ]);
        
    }

}
