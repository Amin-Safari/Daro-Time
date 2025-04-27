@extends('layouts.master')
@section('name')
@include('layouts.header')
<br><br><br><br>
<div class="container">
    <div id="drug-info-container" class="mt-4">
   {{-- @foreach($drugs as $drug)
        <div class='drug-item'>
            <!-- نمایش اطلاعات دارو -->
        </div>
    @endforeach --}}
    </div>

    <!-- دکمه افزودن دارو -->
    <div class="text-center">
        <hr>
        <button id="add-drug-btn" class="btn btn-outline-primary ps-5 pe-5">افزودن دارو 
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-prescription2" viewBox="0 0 16 16">
                <path d="M7 6h2v2h2v2H9v2H7v-2H5V8h2z"/>
                <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v10.5a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 14.5V4a1 1 0 0 1-1-1zm2 3v10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V4zM3 3h10V1H3z"/>
            </svg>
        </button>
    </div>
    <br>

    <!-- فرم افزودن دارو -->
    <div id="drug-form-container" style="display: none;">
        <form id="drug-form" action="{{ route('add-medicine') }}" method="post">
            @csrf    
            <div class="row">
                <div class="col-12">
                    <div class="input-group mb-3 input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg">نام دارو</span>
                        <input type="text" name="medicine_name" class="form-control rounded-end" required>
                        <div class="invalid-feedback" id="name-error"></div>
                    </div>
                </div>
                <div class="col-md-6">                    
                    <div class="input-group mb-3 input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg">تعداد دوز</span>
                        <input type="number" name="dosage" class="form-control rounded-end" required>
                        <div class="invalid-feedback" id="name-error"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3 input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg">هر چند ساعت</span>
                        <input type="number" name="frequency" class="form-control rounded-end" required>
                        <div class="invalid-feedback" id="name-error"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3 input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg">تاریخ شروع</span>
                        <input type="date" name="start_date" class="form-control rounded-end" required>
                        <div class="invalid-feedback" id="name-error"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3 input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg">ساعت شروع</span>
                        <input type="time" name="start_time" class="form-control rounded-end" required>
                        <div class="invalid-feedback" id="name-error"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3 input-group-lg">
                        <span class="input-group-text" id="inputGroup-sizing-lg">نوع یادآوری</span>
                        <select name="reminder_type" class="form-control rounded-end" required>
                            <option value="email">ایمیل</option>
                            <option value="sms">پیامک</option>
                            <option value="call">تماس</option>
                            <option value="notification">اعلان</option>
                        </select>
                        <div class="invalid-feedback" id="name-error"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center d-grid gap-2 mt-2">
                        <button type="submit" class="btn btn-success ps-5 pe-5">ذخیره</button>
                        <button type="button" id="cancel-btn" class="btn btn-danger ps-5 pe-5">لغو</button>
                    </div>
                </div>
            </div>            
        </form>
    </div>


<!-- جدول تاریخچه داروهای تمام شده -->
<div class="table-responsive mt-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>نام دارو</th>
                <th>تعداد دوز</th>
                <th>هر چند ساعت</th>
                <th>تاریخ شروع</th>
                <th>تاریخ اتمام</th>
            </tr>
        </thead>
        <tbody id="completed-drugs-table">
            @foreach($completedDrugs as $completedDrug)
                <tr>
                    <td>{{ $completedDrug->name }}</td>
                    <td>{{ $completedDrug->dosage }}</td>
                    <td>{{ $completedDrug->frequency }}</td>
                    <td>{{ \Carbon\Carbon::parse($completedDrug->start_date)->format('Y-m-d') }}</td>
                    <td>{{ \Carbon\Carbon::parse($completedDrug->last_reminder)->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
  
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // نمایش فرم با انیمیشن
        $('#add-drug-btn').click(function() {
            $('#drug-form-container').slideDown();
        });
        // مخفی کردن فرم با انیمیشن
        $('#cancel-btn').click(function() {
            $('#drug-form-container').slideUp();
        });
        // ارسال فرم دارو با Ajax
        $('#drug-form').submit(function(event) {
            event.preventDefault(); // جلوگیری از ارسال عادی فرم
            const $this = $(this);
            const submitButton = $this.find('button[type="submit"]');
            // نشان دادن اسپینر در دکمه
            submitButton.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> در حال ارسال...');
            $.ajax({
                url: $this.attr('action'),
                method: 'POST',
                data: $this.serialize(),
                success: function(response) {
                    // پردازش موفقیت آمیز
                    loadActiveDrugs(); // بارگذاری مجدد داروها
                    $this[0].reset(); // بازنشانی فرم
                    $('#drug-form-container').slideUp(); // مخفی كردن فرم
                    submitButton.prop('disabled', false).html('ذخیره'); // برگرداندن دکمه
                },
                error: function(xhr) {
                    // پردازش خطا
                    alert('خطا در ارسال اطلاعات.');
                    submitButton.prop('disabled', false).html('ذخیره'); // برگرداندن دکمه
                }
            });
        });
        // بارگذاری داروهای فعال
        function loadActiveDrugs() {
            $.ajax({
                url: '/active-drugs', // URL برای دریافت داروهای در حال مصرف
                method: 'GET',
                success: function(data) {
                    const drugInfoContainer = $('#drug-info-container');
                    drugInfoContainer.empty();  // پاک کردن اطلاعات قبلی
                    data.forEach(function(drug) {
                        const remainingDose = drug.remaining_dose;
                        // بررسی اینکه آیا دوز باقی‌مانده صفر است یا خیر
                        if (remainingDose > 0) {
                            const currentTime = new Date();
                            const lastReminderTime = new Date(drug.last_reminder); // زمان آخرین یادآوری
                            const frequency = drug.frequency; // فرکانس به دقیقه
                            // محاسبه زمان بعدی یادآوری
                            const nextReminderTime = new Date(lastReminderTime.getTime() + frequency * 60 * 1000);
                            // محاسبه زمان باقی‌مانده تا یادآوری بعدی
                            const remainingTime = nextReminderTime - currentTime; // زمان باقی‌مانده به میلی‌ثانیه
                            const remainingMinutes = Math.max(Math.floor(remainingTime / 1000 / 60), 0); // تبدیل به دقیقه و اطمینان از عدم منفی بودن
                            // اضافه کردن به HTML
                            drugInfoContainer.append(`
                                <div class='drug-item'>
                                    <div class='input-group mb-3'>
                                        <span class='input-group-text'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-capsule-pill' viewBox='0 0 16 16'>
                                                <path d='M11.02 5.364a3 3 0 0 0-4.242-4.243L1.121 6.778a3 3 0 1 0 4.243 4.243l5.657-5.657Z'/>
                                            </svg>
                                            نام دارو
                                        </span>
                                        <input type='text' class='form-control w-25' value='${drug.name}' readonly>
                                        <span class='input-group-text'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clipboard-plus' viewBox='0 0 16 16'>
                                                <path fill-rule='evenodd' d='M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7'/>
                                                <path d='M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z'/>
                                                <path d='M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z'/>
                                            </svg>
                                            دوز باقی‌مانده
                                        </span>
                                        <input type='text' class='form-control' value='${remainingDose}' readonly>
                                        <span class='input-group-text'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-hourglass-split' viewBox='0 0 16 16'>
                                                <path d='M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z'/>
                                            </svg>
                                            زمان باقی‌مانده
                                        </span>
                                        <input type='text' class='form-control' value='${remainingMinutes} دقیقه' readonly>
                                    </div>
                                </div>`);
                        }
                    });
                },
                error: function(xhr) {
                    console.error('Error loading active drugs:', xhr);
                }
            });
        }
        // بارگذاری داروهای فعال هنگام بارگذاری صفحه و هر یک دقیقه
        loadActiveDrugs();
        setInterval(loadActiveDrugs, 60000); // 60000 میلی‌ثانیه = 1 دقیقه
    });
</script>
@endsection