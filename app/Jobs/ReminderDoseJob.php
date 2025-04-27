<?php
namespace App\Jobs;
use App\Models\Medicine;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
class ReminderDoseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public function handle()
    {
        // دریافت داروهایی که باید یادآوری شوند
        $medicines = Medicine::where('remaining_dose', '>', 0)
            ->where('last_reminder', '<', Carbon::now())
            ->get();
        foreach ($medicines as $medicine) {
            // محاسبه زمان بعدی یادآوری
            $frequency = $medicine->frequency; // فرکانس به دقیقه
            $nextReminderTime = Carbon::parse($medicine->last_reminder)->addMinutes($frequency);
            // اگر زمان فعلی به زمان بعدی یادآوری رسید
            if (Carbon::now()->greaterThanOrEqualTo($nextReminderTime)) {
                // به روز رسانی دوز باقی‌مانده
                $medicine->remaining_dose -= 1; // کاهش دوز باقی‌مانده
                $medicine->last_reminder = Carbon::now(); // به روز رسانی زمان آخرین یادآوری
                $medicine->save();
                // اینجا می‌توانید کد مربوط به ارسال یادآوری (ایمیل، پیامک و غیره) را اضافه کنید
            }
        }
    }
}