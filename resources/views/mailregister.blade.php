@extends('layouts.master')
@section('name')
<div class="container">
    <h1 class="mb-5 text-center ">Daro Time
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
            class="bi bi-capsule-pill" viewBox="0 0 16 16">
            <path
                d="M11.02 5.364a3 3 0 0 0-4.242-4.243L1.121 6.778a3 3 0 1 0 4.243 4.243l5.657-5.657Zm-6.413-.657 2.878-2.879a2 2 0 1 1 2.829 2.829L7.435 7.536zM12 8a4 4 0 1 1 0 8 4 4 0 0 1 0-8m-.5 1.042a3 3 0 0 0 0 5.917zm1 5.917a3 3 0 0 0 0-5.917z" />
        </svg>
    </h1>
    <h2>بازیابی رمز عبور</h2>
    <p>شما درخواست بازیابی رمز عبور داده‌اید.</p>
    <p>برای تغییر رمز عبور خود، روی دکمه زیر کلیک کنید:</p>
    <a href="{{ route('register.pass',['token'=> $token]) }}" class="btn btn-primary">تغییر رمز عبور</a><hr>
    <p>اگر شما این درخواست را نداده‌اید، این ایمیل را نادیده بگیرید.</p>
</div>
@endsection