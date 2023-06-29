<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserRequest;
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
   * Store a newly created resource in storage.
   */
  public function store(StoreUpdateUserRequest $request)
  {
    $dataUser = $request->all();

    $user = $this->user->create($dataUser);

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
   * Update the specified resource in storage.
   */
  public function update(StoreUpdateUserRequest $request, string $id)
  {
    $dataUser = $request->all();

    if (!$user = $this->user->find($id)) {
      return response()->json(['error' => 'Não foi possível fazer a atualização. Usuário não encontrado'], 404);
    }

    $user->update($dataUser);

    return response()->json(['sucess' => 'Usuário atualizado com sucesso!', 'user' => $user], 200);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
