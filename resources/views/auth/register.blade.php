@extends('layouts.auth-master')

@section('content')
    <form action="/register" method="POST" autocomplete="off">
        @csrf
        @include('layouts.partials.messages')

        <div class="form-floating mb-3">
            <input type="text" name="username" placeholder="Username" class="form-control" id="InputUsername"
                aria-describedby="emailHelp">
            <label for="InputUsername" class="form-label">Username <span class="form-text">(Opcional)</span></label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" placeholder="Email" class="form-control" id="InputUsername"
                aria-describedby="emailHelp">
            <label for="InputUsername" class="form-label">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" placeholder="Password" class="form-control" id="InputPassword">
            <label for="InputPassword" class="form-label">Password</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password_confirmation" placeholder="Password Confirmation" class="form-control"
                id="InputPassword">
            <label for="InputPassword" class="form-label">Password Confirmation</label>
        </div>
        <div class="mb-3">
          <a href="/login">Login</a>
      </div>

        <button type="submit" class="btn btn-primary">Create account</button>
    </form>
@endsection
