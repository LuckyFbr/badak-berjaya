<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
     public function register()
    {
        $validator = Validator::make(request()->all(),[
            'nik' => 'required|max:16',
            'fullname' => 'required',
            'nickname' => 'required',
            'password' => 'required|min:8',
            'phone_number' => 'required',
            'email' => 'required|email',
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(),422);
        }

         $user = User::create([
            'nik' => request('nik'),
            'fullname' => request('fullname'),
            'nickname' => request('nickname'),
            'password' => request('password'),
            'phone_number' => request('phone_number'),
            'email' => request('email'),
        ]);

        return response()->json(['message' => 'Pendaftaran akun berhasil'], 201);
    }

    public function login(Request $request){
         //set validation
        $validator = Validator::make($request->all(), [
            'nickname'  => 'required',
            'password'  => 'required|min:8',
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        //get credentials from request
        $credentials = $request->only('nickname', 'password');

        //if auth failed
        if(!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah'
            ], 401);
        }

        //if auth success
        return response()->json([
            'success' => true,
            'user'    => auth()->user(),    
            'token'   => $token   
        ], 200);
    }
     /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
        
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function requestResetPassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email'
    ]);

    if ($validator->fails()) {
        return response()->json($validator->messages(), 422);
    }

    $response = Password::sendResetLink($request->only('email'));

    if ($response === Password::RESET_LINK_SENT) {
        return response()->json(['message' => 'Reset password link sent successfully']);
    } else {
        return response()->json(['message' => 'Failed to send reset password link'], 500);
    }
}

public function resetPassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8'
    ]);

    if ($validator->fails()) {
        return response()->json($validator->messages(), 422);
    }

    $response = Password::reset($request->only(
        'email', 'password', 'password_confirmation', 'token'
    ), function ($user, $password) {
        $user->password = Hash::make($password);
        $user->save();
    });

    if ($response === Password::PASSWORD_RESET) {
        return response()->json(['message' => 'Password reset successfully']);
    } else {
        return response()->json(['message' => 'Failed to reset password'], 500);
    }
}
    

}