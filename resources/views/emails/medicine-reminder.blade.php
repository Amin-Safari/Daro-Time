@component('mail::message')
    # یادآوری مصرف دارو

    سلام {{ $medicine->user->name }},

    زمان مصرف داروی **{{ $medicine->name }}** فرا رسیده است.

    **جزئیات دارو:**
    - تعداد دوز باقی‌مانده: {{ $medicine->remaining_dose }}
    - هر {{ $medicine->frequency }} ساعت یکبار

    لطفاً در اسرع وقت داروی خود را مصرف کنید.

    @component('mail::button', ['url' => url('/dashboard')])
        مشاهده داشبورد
    @endcomponent

    با تشکر،<br>
    {{ config('app.name') }}
@endcomponent
