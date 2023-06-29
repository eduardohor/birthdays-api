<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

  protected $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = $this->user->all();

    return response()->json($users, 200);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreUserRequest $request)
  {
    $data = $request->all();

    $user = $this->user->create($data);

    return response()->json(['message' => 'Usuário criado com sucesso!', 'user' => $user], 201);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    if (!$user = $this->user->find($id)) {
      return response()->json(['error' => 'Usuário não encontrado'], 404);
    }

    return response()->json(['user' => $user], 200);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
