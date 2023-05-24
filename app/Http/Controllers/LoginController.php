<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function show()
  {
    if(Auth::check()){
      return redirect('/home'); //si existe una sesion iniciada se redirecciona a home
    }

    return view('auth.login');
  }

  public function login(LoginRequest $request)
  {
    $credentials = $request->getCredentials();

    if(!Auth::validate($credentials)){
      return redirect('/login')->withErrors('Username and/or password is incorrect.'); //si las credenciales que ingreso no existen en la bd se redirecciona a login
    }

    $user = Auth::getProvider()->retrieveByCredentials($credentials);

    Auth::login($user);
    return $this->authenticated($request, $user);
  }

  public function authenticated(Request $request, $user){
    return redirect('/home');
  }
}