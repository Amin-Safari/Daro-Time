@extends('layouts.master')

@section('name') 
    @include('layouts.header')
    <div class="container">
        <br><br><br><br><br>
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
            </svg>
        </div>
        <br>
        <hr><br>
        <form id="user-form">
            @csrf
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col">
                    <div class="input-group mb-3 input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg">نام</span>
                        <input type="text" id="name" class="form-control rounded-end" value="{{ auth()->user()->name }}" disabled readonly>
                        <div class="invalid-feedback" id="name-error"></div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3 input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg">ایمیل</span>
                        <input type="email" id="email" class="form-control rounded-end" value="{{ auth()->user()->email }}" disabled readonly>
                        <div class="invalid-feedback" id="email-error"></div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group input-group-lg mb-4">
                        <span class="input-group-text " id="inputGroup-sizing-lg">شماره</span>
                        <input type="tel" id="mobile" value="{{ auth()->user()->mobile }}" class="form-control rounded-end" disabled readonly>
                        <div class="invalid-feedback" id="mobile-error"></div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="button" id="submit-button" class="btn btn-primary ps-5 pe-5" style="display:none;">
                    <span id="spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none;"></span>
                    ارسال
                </button>
                <button type="button" id="edit-button" class="btn btn-warning ps-5 pe-5">ویرایش 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                    </svg>
                </button>
            </div>
        </form><br><br>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // فعالسازی ورودی‌ها و تغییر دکمه‌ها
            $('#edit-button').on('click', function () {
                $('#name, #email, #mobile').prop('disabled', false).removeAttr('readonly');
                $('#submit-button').show();
                $(this).hide();
            });

            // ارسال اطلاعات فرم با Ajax
            $('#submit-button').on('click', function () {
                $(this).prop('disabled', true); // غیرفعال کردن دکمه
                $('#spinner').show(); // نمایش اسپینر

                // پاک کردن خطاهای قبلی
                $('.invalid-feedback').text('');
                $('.form-control').removeClass('is-invalid');

                // جمع‌آوری اطلاعات فرم
                let formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    mobile: $('#mobile').val(),
                    _token: '{{ csrf_token() }}'
                };

                // ارسال درخواست Ajax
                $.ajax({
                    url: '{{ route("user.update") }}',
                    type: 'PATCH',
                    data: formData,
                    success: function (response) {
                        alert('اطلاعات با موفقیت به‌روزرسانی شد!');
                        location.reload(); // بارگذاری مجدد صفحه
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) { // خطاهای اعتبارسنجی
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function (key, value) {
                                $('#' + key + '-error').text(value[0]);
                                $('#' + key).addClass('is-invalid');
                            });
                        } else {
                            alert('خطایی رخ داده است. لطفاً دوباره تلاش کنید.');
                        }
                    },
                    complete: function () {
                        $('#submit-button').prop('disabled', false); // فعال کردن دکمه
                        $('#spinner').hide(); // مخفی کردن اسپینر
                    }
                });
            });
        });
    </script>
@endsection