<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');

    $token = auth()->attempt($credentials);

    if (!$token = auth()->attempt($credentials)) {
      dd($token);
      return response()->json(['error' => 'Unauthorized'], 401);
    }

    return $this->respondWithToken($token);
  }

  public function me()
  {
    return response()->json(auth()->user());
  }

  public function refresh()
  {
    return $this->respondWithToken(auth()->refresh());
  }

  public function logout()
  {
    auth()->logout();

    return response()->json(['message' => 'Logout realizado com sucesso!']);
  }

  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => auth()->factory()->getTTL() * 60
    ]);
  }
}