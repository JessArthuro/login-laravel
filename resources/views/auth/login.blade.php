@extends('layouts.auth-master')

@section('content')
    <form action="/login" method="POST" autocomplete="off">
        @csrf
        @include('layouts.partials.messages')

        <div class="mb-3">
            <label for="InputUsername" class="form-label">Username / Email address</label>
            <input type="text" name="username" class="form-control" id="InputUsername" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="InputPassword" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="InputPassword">
        </div>
        <div class="mb-3">
            <a href="/register">Create account</a>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesion</button>
    </form>
@endsection
