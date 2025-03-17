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
                @if (session()->has('message'))
                <div class="card alert alert-danger">{{ session('message') }}</div>
            @endif
                <form action="{{ route('register') }} " method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tel1" class="form-label">ایمیل:</label>
                        <input type="email" name="email" class="form-control" id="tel1">
                    </div>
                    <div class="form-text text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                    <button type="submit" class="d-felx w-100 btn btn-primary">ارسال</button>
                </form>
            </div>
        </div>
    </div>
    <div class=" justify-content-center   d-none d-lg-flex">
        <div class="rounded border border-primary" style="background-color: rgba(0, 0, 0, 0.047)">
            <div class="m-4 " style="width: 300px">

                <h1 class="mb-5 text-center ">Daro Time
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-capsule-pill" viewBox="0 0 16 16">
                        <path
                            d="M11.02 5.364a3 3 0 0 0-4.242-4.243L1.121 6.778a3 3 0 1 0 4.243 4.243l5.657-5.657Zm-6.413-.657 2.878-2.879a2 2 0 1 1 2.829 2.829L7.435 7.536zM12 8a4 4 0 1 1 0 8 4 4 0 0 1 0-8m-.5 1.042a3 3 0 0 0 0 5.917zm1 5.917a3 3 0 0 0 0-5.917z" />
                    </svg>
                </h1>
                @if (session()->has('message'))
                <div class="card alert alert-danger">{{ session('message') }}</div>
            @endif
                <form action="{{ route('register') }} " method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tel1a" class="form-label">ایمیل:</label>
                        <input type="email" name="email" class="form-control" id="tel1a">
                    </div>
                    <div class="form-text text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                    <button type="submit" class="d-felx w-100 btn btn-primary">ارسال</button>
                </form>
            </div>
        </div>
        <script>
            document.getElementById('body').style.backgroundColor = " rgb(204, 208, 255)";
        </script>
    @endsection
