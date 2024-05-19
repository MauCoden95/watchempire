<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{


    public function register(Request $request){
        $data = $request->all();
        $random = rand(100000, 999999);
        $validator = Validator::make($request->all(),[
            "name" => "required|string|max:50",
            "email" => "required|unique:users|max:50",
            "dni" => "required|unique:users|max:50",
            "address" => "required|max:50",
            "phone" => "required|max:50",
            "password" => "required|unique:users|max:50"
        ]);

        if ($validator) {
            $user = new User();
            $user->name = $data["name"];
            $user->email = $data["email"];
            $user->dni = $data["dni"];
            $user->address = $data["address"];
            $user->phone = $data["phone"];
            $user->confirmed_code = $random;
            $user->password = Hash::make($data["password"]);

            $result = $user->save();

            if ($result) {
                Mail::send('emails.confirmation_code', ['name' => $user->name, 'confirmation_code' => $random], function ($message) use ($user) {
                    $message->from('noreply@yourdomain.com', 'Your App Name');
                    $message->to($user->email, $user->name);
                    $message->subject('Confirmación de Registro');
                });

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


    public function verify($code){
        $user = User::where('confirmation_code',$code)->first();

        if (! $user) {
            return redirect("http://localhost:8080");
        }

        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();


        return redirect("http://localhost:8080/tienda");
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
                'status' => 400,
                'message' => 'Login fallido'
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
