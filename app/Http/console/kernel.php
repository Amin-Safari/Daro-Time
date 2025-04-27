<?php
namespace App\Console;
use App\Jobs\ReminderDoseJob; // اطمینان حاصل کنید که Job خود را وارد کرده‌اید
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // زمان‌بندی Job ReminderDoseJob برای اجرا هر دقیقه
        $schedule->job(new ReminderDoseJob)->everyMinute();
    }
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        // سایر ثبت‌نام‌های دستورات می‌توانند اینجا باشند
    }
}