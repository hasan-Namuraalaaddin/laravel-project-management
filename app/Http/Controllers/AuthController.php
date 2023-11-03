<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function register(Request $request)
  {

    $validaitonData = $request->validate(
      [
        'name' => 'required|max:55',
        'email' => 'email|required|unique:users',
        'password' => 'required'
      ]
    );

    $validaitonData['password'] = bcrypt($validaitonData['password']);
    $user = User::create($validaitonData);

    $accessToken = $user->createToken('authToken')->accessToken;
    return response(['user' => $user, 'accessToken' => $accessToken]);
  }

  public function login(Request $request)
  {

    $user = User::where('email', $request->email)->first();
    if (!$user) {

      return response(['message' => 'User not found or email is not correct']);
    }
    if (!Hash::check($request->password, $user->password)) {

      return response(['message' => 'password is not correct']);
    }
    $user->tokens()->delete();

    return response()->json(
      [
        'status' => 'success',
        'message' => 'User logged in successfully.',
        'name' => $user->name,
        'token' => $user->createToken('auth_token')->plainTextToken,
      ]
    );
  }

  public function logout(Request $request){

    $request->user()->currentAccessToken()->delete();

    return response()->json(
      [
        'status' => 'success',
        'message' => 'User logged out successfully'
      ]
    );

  }
}
