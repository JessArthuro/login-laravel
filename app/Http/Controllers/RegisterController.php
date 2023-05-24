<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
  public function show()
  {
    if (Auth::check()) {
      return redirect('/home'); //si existe una sesion iniciada se redirecciona a home
    }
    return view('auth.register');
  }

  public function register(RegisterRequest $request)
  {
    $user = User::create($request->validated()); //se va crear el usuario si pasa las validaciones del RegisterRequest..
    return redirect('/login')->with('success', 'Account created successfully');
  }
}