@extends('auth.master')
@section('content')
    <div class="wrapper">
        <div class="inner">
            <form action="{{ route('login.store') }}" method = "post" class="mx-auto"> @csrf
                <h3>Login Form</h3>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('success') }}</strong>
                        <button type="button" class="btn-close mt-0" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session()->get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="form-wrapper">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-wrapper">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button class="mb-3" id = "button">Login </button>
                <div>You have no account yet? <a href="{{ route('registerForm') }}" class="fw-bold">Register Here</a></bdiv>

            </form>
        </div>
    </div>
@endsection
