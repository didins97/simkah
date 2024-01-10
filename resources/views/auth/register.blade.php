@extends('layouts.test')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row">
            <!-- First Name -->
            <div class="input-group col-lg-6 mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                        <i class="fa fa-user text-muted"></i>
                    </span>
                </div>
                <input id="firstName" type="text" name="nama_depan" placeholder="Nama Depan"
                    class="form-control bg-white border-left-0 border-md" value="{{ old('nama_depan') }}">
                @error('nama_depan')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Last Name -->
            <div class="input-group col-lg-6 mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                        <i class="fa fa-user text-muted"></i>
                    </span>
                </div>
                <input id="lastName" type="text" name="nama_belakang" placeholder="Nama Belakang"
                    class="form-control bg-white border-left-0 border-md" value="{{ old('nama_belakang') }}">
                @error('nama_belakang')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

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

            <!-- Job -->
            <div class="input-group col-lg-12 mb-4" id="inputJob">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                        <i class="fas fa-chevron-circle-down"></i>
                    </span>
                </div>
                <select id="role" name="level" class="form-control custom-select bg-white border-left-0 border-md">
                    <option value="user">User(Calon Pengantin)</option>
                    <option value="vendor">Vendor</option>
                </select>
                @error('level')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-group col-lg-12 mb-4" id="inputNik">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                        <i class="fas fa-globe"></i>
                    </span>
                </div>
                <input id="Nik" type="text" name="nik" placeholder="Nomor Induk Kependudukan"
                    class="form-control bg-white border-md border-left-0 pl-3" value="{{ old('nik') }}">
                @error('nik')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Phone Number -->
            <div class="input-group col-lg-12 mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                        <i class="fa fa-phone-square text-muted"></i>
                    </span>
                </div>
                <input id="phoneNumber" type="text" name="nohp" placeholder="Nomor WhatsApp"
                    class="form-control bg-white border-md border-left-0 pl-3" value="{{ old('nohp') }}">
                @error('nohp')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div class="input-group col-lg-6 mb-4">
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

            <!-- Password Confirmation -->
            <div class="input-group col-lg-6 mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                        <i class="fa fa-lock text-muted"></i>
                    </span>
                </div>
                <input id="passwordConfirmation" type="password" placeholder="Confirm Password"
                    class="form-control bg-white border-left-0 border-md" name="password_confirmation"
                    value="{{ old('password-confirm') }}" required autocomplete="password-confirm">
                @error('password-confirm')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="form-group col-lg-12 mx-auto mb-0">
                <button type="submit" class="btn btn-primary btn-block py-2">
                    <span class="font-weight-bold">Buat Akun</span>
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
                <p class="text-muted font-weight-bold">Sudah Punya Akun? <a href="{{ route('login') }}"
                        class="text-primary ml-2">Masuk</a></p>
            </div>

        </div>
    </form>
@endsection
