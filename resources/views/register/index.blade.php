@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action="/register" method="post">
                @csrf
              <div class="form-floating">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') in-invalid @enderror" id="name"
                placeholder="Name" required value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control @error('email') in-invalid @enderror" id="email"
                placeholder="name@example.com" required value="{{ old('email') }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') in-invalid @enderror" id="password"
                placeholder="Password" required>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                placeholder="Confirm Password" required>
              </div>

              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">All Registered? <a href="/login">Login</a> </small>
          </main>
    </div>
</div>

@endsection
