@extends('auth.master')
@section('content')
    <div class="wrapper">
        @if (session()->has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="inner">
            <form action="{{ route('register.store') }}" method = "post" class="mx-auto"> @csrf
                <h3>Registration Form</h3>
                <div class="form-wrapper">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-wrapper">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-wrapper">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" name="phone" @error('phone') is-invalid @enderror">
                    @error('phone')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-wrapper">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address" @error('address') is-invalid @enderror">
                    @error('address')
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

                <div class="">
                    <button class="btn btn-sm btn-info mb-3 rounded-5" id = "button">Submit</button>
                    <div>Already have an account? <a href="{{ route('loginForm') }}" class="fw-bold">Login Here</a></div>
                </div>
                {{-- <button>Register Now</button> --}}
            </form>
        </div>
    </div>
@endsection
