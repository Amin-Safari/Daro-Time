<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8">
    <title>یادآوری مصرف دارو</title>
</head>

<body style="font-family: Tahoma, Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #2c3e50;">یادآوری مصرف دارو</h2>
        <p>سلام،</p>
        <p>این ایمیل به عنوان یادآوری برای مصرف داروی زیر ارسال شده است:</p>

        <div style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0;">
            <p><strong>نام دارو:</strong> {{ $drug->name }}</p>
            <p><strong>تعداد دوز باقی‌مانده:</strong> {{ $drug->remaining_dose }}</p>
            <p><strong>هر چند ساعت:</strong> {{ $drug->frequency }} ساعت</p>
        </div>

        <p>لطفاً در زمان مقرر داروی خود را مصرف کنید.</p>

        <p style="margin-top: 30px; color: #666; font-size: 0.9em;">
            این ایمیل به صورت خودکار ارسال شده است. لطفاً به آن پاسخ ندهید.
        </p>
    </div>
</body>

</html>
