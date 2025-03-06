@extends('layouts.master')
@section('name')
    @include('layouts.headerb')
    <div class="d-block  mt-5 vh-100 d-lg-none">
        <div class="rounded border border-success ">
            <div class="m-3">

                <h1 class="mb-5 text-center ">Daro Time
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-capsule-pill" viewBox="0 0 16 16">
                        <path
                            d="M11.02 5.364a3 3 0 0 0-4.242-4.243L1.121 6.778a3 3 0 1 0 4.243 4.243l5.657-5.657Zm-6.413-.657 2.878-2.879a2 2 0 1 1 2.829 2.829L7.435 7.536zM12 8a4 4 0 1 1 0 8 4 4 0 0 1 0-8m-.5 1.042a3 3 0 0 0 0 5.917zm1 5.917a3 3 0 0 0 0-5.917z" />
                    </svg>
                </h1>
                <form action="{{ route ('singup.store') }} " method="POST">
                    <div class="mb-3">
                        <label for="tel1" class="form-label" >شماره موبایل:</label>
                        <input type="tel" class="form-control" value="09" placeholder="09-- --- ----" type="tel" maxlength="11" id="tel1">
                    </div>
                    <div class="mb-3">
                        <label for="Password1" class="form-label">رمز:</label>
                        <input type="password" class="form-control" id="Password1">
                    </div>
                    <div class="form-text text-danger">erore</div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" value="1" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">من را به خاطر بسپار</label>
                    </div>
                    <button type="submit" class="d-felx w-100 btn btn-primary">Submit</button>
                </form>
                <p>آیا رمز خود را فراموش کرده اید؟</p><a href="" class="btn btn-outline-succes">فراموشی رمز</a>
                <br>
                <p>آیا ثبت نام نکرده اید؟</p><a href="" class="btn btn-outline-succes">ثبت نام</a>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center vh-100 d-none d-lg-flex  ">
        <div class="rounded border border-info     ">
            <div class="m-3">

                <h1 class="mb-5 text-center ">Daro Time
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-capsule-pill" viewBox="0 0 16 16">
                        <path
                            d="M11.02 5.364a3 3 0 0 0-4.242-4.243L1.121 6.778a3 3 0 1 0 4.243 4.243l5.657-5.657Zm-6.413-.657 2.878-2.879a2 2 0 1 1 2.829 2.829L7.435 7.536zM12 8a4 4 0 1 1 0 8 4 4 0 0 1 0-8m-.5 1.042a3 3 0 0 0 0 5.917zm1 5.917a3 3 0 0 0 0-5.917z" />
                    </svg>
                </h1>
                <form action="{{ route ('singup.store') }} " method="POST">
                    <div class="mb-3">
                        <label for="tel1" class="form-label" >شماره موبایل:</label>
                        <input type="tel" class="form-control" value="09" placeholder="09-- --- ----" type="tel" maxlength="11" id="tel1">
                    </div>
                    <div class="mb-3">
                        <label for="Password1" class="form-label">رمز:</label>
                        <input type="password" class="form-control" id="Password1">
                    </div>
                    <div class="form-text text-danger">erore</div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">من را به خاطر بسپار</label>
                    </div>
                    <button type="submit" class="d-felx w-100 btn btn-primary">Submit</button>
                </form>
                <p>آیا رمز خود را فراموش کرده اید؟</p><a href="" class="btn btn-outline-succes">فراموشی رمز</a>
                <br>
                <p>آیا ثبت نام نکرده اید؟</p><a href="" class="btn btn-outline-succes">ثبت نام</a>
            </div>
        </div>
    </div>
    <script></script>
@endsection
