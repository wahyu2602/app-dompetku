@extends('templates.auth.layout')

@section('content_auth')
<div class="card-header">
  <h3 class="text-center font-weight-light my-4">Login</h3>
  @if(session('email') || session('password'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('email') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
</div>
<div class="card-body">
  <form action="/login" method="POST">
    @csrf
    <div class="form-floating mb-3">
      <input name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email" placeholder="name@example.com" value="{{ old('email') }}" />
      <label for="inputEmail">Email address</label>
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <input name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" placeholder="Password" />
      <label for="inputPassword">Password</label>
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>
  </form>
</div>
<div class="card-footer text-center py-3">
  <div class="small"><a href="/register">Need an account? Sign up!</a></div>
</div>
@endsection