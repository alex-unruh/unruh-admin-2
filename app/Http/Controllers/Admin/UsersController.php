<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;

/**
 * Users management class
 * @author Alexandre Unruh <alexandre@unruh.com.br>
 */
class UsersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::all();
    return view('admin.users.index', ['users' => $users]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data['profiles'] = config('admin.user_profiles');
    $data['user_status'] = ['Ativo', 'Inativo'];
    return view('admin.users.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  App\Http\Requests\UsersRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(UsersRequest $request)
  {
    $form = $request->validated();
    $user = new User();
    $user->fill($form);
    $user->save();
    return redirect()->route('users')->with('success', 'Usuário cadastrado com sucesso!');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    $data['user'] = $user;
    $data['profiles'] = config('admin.user_profiles');
    $data['user_status'] = ['Ativo', 'Inativo'];
    return view('admin.users.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param UsersRequest $request
   * @param User $user
   * @return \Illuminate\Http\Response
   */
  public function update(UsersRequest $request, User $user)
  {
    $form = $request->validated();
    $user->fill($form);
    $user->save();
    return redirect()->route('users')->with('success', 'Registro atualizado com sucesso!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    if (auth()->user()->id == $id) {
      return redirect()->back()->with('warning', 'Você não pode excluir seu próprio usuário');
    }

    $user = User::find($id);
    $user->delete();
    return redirect()->route('users')->with('success', 'Registro excluído com sucesso!');
  }
}
