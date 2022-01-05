@extends('templates.auth.layout')

@section('content_auth')
<div class="card-header">
  <h3 class="text-center font-weight-light my-4">Create Account</h3>
  @if(session('errorpassword'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('errorpassword') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
</div>
<div class="card-body">
  <form action="/register" method="POST">
    @csrf
    <div class="form-floating mb-3">
      <input name="username" class="form-control @error('username') is-invalid @enderror" id="username" type="text" placeholder="Enter your last name" value="{{ old('username') }}" />
      <label for="username">User Name</label>
      @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <input name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email" placeholder="name@example.com" value="{{ old('email') }}" />
      <label for="inputEmail">Email address</label>
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="row mb-3">
      <div class="col-md-6">
        <div class="form-floating mb-3 mb-md-0">
          <input name="password" class="form-control" id="inputPassword" type="password" placeholder="Create a password" />
          <label for="inputPassword">Password</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-floating mb-3 mb-md-0">
          <input name="confirmpassword" class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
          <label for="inputPasswordConfirm">Confirm Password</label>
        </div>
      </div>
    </div>
    <div class="mt-4 mb-0">
      <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
    </div>
  </form>
</div>
<div class="card-footer text-center py-3">
  <div class="small"><a href="/">Have an account? Go to login</a></div>
</div>
@endsection