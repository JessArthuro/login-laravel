@extends('layouts.app-master')

@section('content')
    <h1>Home</h1>

    @auth
        <p>Bienveniendo {{ auth()->user()->name ?? auth()->user()->username }}, estas autenticado al sitio web</p>

        <a href="/logout">Cerrar sesion</a>
    @endauth

    @guest
        <p>Para ver el contenido debes <a href="/login">Iniciar sesion</a></p>
    @endguest
@endsection
