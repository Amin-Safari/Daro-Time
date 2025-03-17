@extends('layouts.master')
@section('name')
    @include('layouts.header')
    <br><br><br><br>
    <div id="carouselExampleDark" class="carousel carousel-dark slide " style="padding-top: 2cm;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="https://gapgpt.app/media/user_files/6d1050a9-53dd-4c63-bd22-6d0923854bf3.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="..." class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container ">
        <img src="{{ asset('images/SharedScreenshot11.jpg') }}" class="w-100" alt="aaa">
    <h1 class="mt-5 mb-4">تایم دارو: راهنمای شما برای یادآوری زمان مصرف دارو</h1>
    <p>در دنیای امروزی، با افزایش مشغله‌های روزمره، فراموش کردن زمان مصرف داروها می‌تواند به سرعت به یک مشکل جدی تبدیل شود. سایت “تایم دارو” با هدف کمک به شما در مدیریت بهتر مصرف داروها و یادآوری زمان‌های دقیق مصرف طراحی شده است.</p>
    <h2>ویژگی‌های منحصر به فرد ما:</h2>
    <p>
        <ul>
            <li><h4>یادآوری هوشمند:</h4><p>با استفاده از اپلیکیشن ما، می‌توانید زمان‌های دقیقتری برای مصرف داروهای خود تعیین کنید. این اپلیکیشن به شما یادآوری خواهد کرد تا هرگز مصرف داروهایتان را فراموش نکنید.</p></li>
            <li><h4>پشتیبانی از انواع داروها:</h4><p> چه داروهای روزمره، چه مکمل‌ها و چه داروهای خاص، “تایم دارو” به شما کمک می‌کند تا تمامی مصرف‌های خود را مدیریت کنید.</p></li>
            <li><h4>روند آسان و سریع:</h4><p>رابط کاربری ساده و کاربرپسند “تایم دارو” به شما امکان می‌دهد تا به راحتی داروهای خود را اضافه کرده و تنظیمات یادآوری را شخصی‌سازی کنید.</p></li>
            <li><h4>محیط امن و قابل اعتماد:</h4><p> حفظ حریم خصوصی و امنیت داده‌های شما برای ما اهمیت دارد. تمام اطلاعات شما در یک محیط امن ذخیره می‌شود.</p></li>
        
        </ul>
        

        <h6>همین امروز بپیوندید و از راهکاری هوشمند و کارآمد برای مدیریت زمان مصرف داروهای خود بهره‌مند شوید!</h6>
    </p>
</div>
    @include('layouts.footer')
@endsection
