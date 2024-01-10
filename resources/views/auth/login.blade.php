@extends('layouts.test')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row">
            <!-- Email Address -->
            <div class="input-group col-lg-12 mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                        <i class="fa fa-envelope text-muted"></i>
                    </span>
                </div>
                <input id="email" type="email" name="email" placeholder="Email Address"
                    class="form-control bg-white border-left-0 border-md" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div class="input-group col-lg-12 mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                        <i class="fa fa-lock text-muted"></i>
                    </span>
                </div>
                <input id="password" type="password" name="password" placeholder="Password"
                    class="form-control bg-white border-left-0 border-md" value="{{ old('password') }}" required
                    autocomplete="password">
                @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="form-group col-lg-12 mx-auto mb-0">
                <button class="btn btn-primary btn-block py-2" type="submit">
                    <span class="font-weight-bold">Masuk</span>
                </button>
            </div>

            <!-- Divider Text -->
            <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                <div class="border-bottom w-100 ml-5"></div>
                <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                <div class="border-bottom w-100 mr-5"></div>
            </div>

            <!-- Already Registered -->
            <div class="text-center w-100">
                <p class="text-muted font-weight-bold">Belum Punya Akun? <a href="{{ route('register') }}" class="text-primary ml-2">Daftar
                        Akun</a></p>
            </div>

        </div>
    </form>
@endsection
