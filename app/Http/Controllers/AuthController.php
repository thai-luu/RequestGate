<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' =>'required'
            ]);

            $credentials = request(['email', 'password']);

            if(!Auth::attempt($credentials)) {
                return response()->json([
                    'status_code'=> 500,
                    'message' => 'Unauthorized'
                ]);
            }

            $user = User::where('email',$request->email)->first();

            if (!Hash::check($request->password, $user->password, [])){
                throw new \Exception('Error in Login');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            
            return response()->json([
                'status_code'=> 200,
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);

        } catch(\Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Login',
                'error' => $error,
            ]);
        }
    }

    public function changePassword(Request $request){
        $user = Auth::user();
        if (Hash::check($request->password, $user->password, [])){
            $user->password = bcrypt($request->new_password);
            $user->save();
            return response()->json([
                'status'=> 'success',
            ]);
        }
        return response()->json([
            'status' => 'failed',
        ]);
    }

    public function logout(){
        $user = Auth::user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return response()->json([
            'status_code' => 200,
            'message' => 'logout success',
        ]);
    }
}
