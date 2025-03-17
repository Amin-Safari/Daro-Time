@extends('layouts.master')
@section('name')
    @include('layouts.headerb')
    <div class="d-block  mt-5 vh-100 d-lg-none ">
        <div class="  ">
            <div class="m-3">

                <h1 class="mb-5 text-center ">Daro Time
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-capsule-pill" viewBox="0 0 16 16">
                        <path
                            d="M11.02 5.364a3 3 0 0 0-4.242-4.243L1.121 6.778a3 3 0 1 0 4.243 4.243l5.657-5.657Zm-6.413-.657 2.878-2.879a2 2 0 1 1 2.829 2.829L7.435 7.536zM12 8a4 4 0 1 1 0 8 4 4 0 0 1 0-8m-.5 1.042a3 3 0 0 0 0 5.917zm1 5.917a3 3 0 0 0 0-5.917z" />
                    </svg>
                </h1>
                @if (session()->has('error'))
                    <div class="card alert alert-danger">{{ session('error') }}</div>
                @endif
                <form action="{{ route('signin') }} " method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">نام خود را وارد کنید:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            id="name">
                    </div>
                    <div class="form-text text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tel1a" class="form-label">شماره موبایل خود را وارد کنید:</label>
                        <input type="tel" name="mobile" class="form-control" value="{{ old('mobile') }}"
                            placeholder="09-- --- ----" maxlength="11" id="tel1a">
                    </div>
                    <div class="form-text text-danger">
                        @error('mobile')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name2" class="form-label">ایمیل خود را وارد کنید:</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                            id="name2">
                    </div>
                    <div class="form-text text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Password1" class="form-label">رمز عبور خود را وارد کنید:</label>
                        <input type="password" name="password" class="form-control" id="Password1">
                    </div>
                    <div class="form-text text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Password2" class="form-label">رمز عبور را مجدد وارد کنید:</label>
                        <input type="password" name="password_confirmation" class="form-control" id="Password2">
                    </div>
                    <div class="form-text text-danger">
                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                    </div>
                    <button type="submit" class="d-felx w-100 btn btn-primary">ارسال</button>
                </form>
                <br>
                <div class="d-flex">
                    <p>آیا قبلا ثبت نام کرده اید؟</p>
                    <a href="/signup" class="btn ms-2 btn-outline-primary">ورود</a>
                </div>
                <br>
            </div>
        </div>
    </div>
    <div class=" justify-content-center align-items-center vh-100 d-none d-lg-flex ">
        <div class="rounded border border-primary ps-4 pe-4" style="background-color: rgba(0, 0, 0, 0.047)">
            <div class="m-4 " style="width: 400px">

                <h1 class="mb-5 text-center ">Daro Time
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-capsule-pill" viewBox="0 0 16 16">
                        <path
                            d="M11.02 5.364a3 3 0 0 0-4.242-4.243L1.121 6.778a3 3 0 1 0 4.243 4.243l5.657-5.657Zm-6.413-.657 2.878-2.879a2 2 0 1 1 2.829 2.829L7.435 7.536zM12 8a4 4 0 1 1 0 8 4 4 0 0 1 0-8m-.5 1.042a3 3 0 0 0 0 5.917zm1 5.917a3 3 0 0 0 0-5.917z" />
                    </svg>
                </h1>
                @if (session()->has('error'))
                    <div class="card alert alert-danger">{{ session('error') }}</div>
                @endif
                <form action="{{ route('signin') }} " method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name1" class="form-label">نام خود را وارد کنید:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            type="tel" id="name1">
                    </div>
                    <div class="form-text text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tel1" class="form-label">شماره موبایل خود را وارد کنید:</label>
                        <input type="tel" name="mobile" class="form-control" value="{{ old('mobile') }}"
                            placeholder="09-- --- ----" maxlength="11" id="tel1">
                    </div>
                    <div class="form-text text-danger">
                        @error('mobile')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name12" class="form-label">ایمیل خود را وارد کنید:</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                            id="name12">
                    </div>
                    <div class="form-text text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Password1a" class="form-label">رمز عبور خود را وارد کنید:</label>
                        <input type="password" name="password" class="form-control" id="Password1a">
                    </div>
                    <div class="form-text text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Password2a" class="form-label">رمز عبور را مجدد وارد کنید:</label>
                        <input type="password" name="password_confirmation" class="form-control" id="Password2a">
                    </div>
                    <div class="form-text text-danger">
                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                    </div>
                    <button type="submit" class="d-felx w-100 btn btn-primary">ارسال</button>
                </form>
                <br>
                <div class="d-flex">
                    <p>آیا قبلا ثبت نام کرده اید؟</p>
                    <a href="/signup" class="btn ms-2 btn-outline-primary">ورود</a>
                </div>
                <br>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('body').style.backgroundColor = " rgb(204, 208, 255)";
    </script>
@endsection
