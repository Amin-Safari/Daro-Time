<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MedicineReminder;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MedicineReminderNotification;

class NotificationController extends Controller
{
    public function sendReminder(Medicine $medicine)
    {
        $user = $medicine->user;

        // ارسال ایمیل
        if ($medicine->reminder_type === 'email') {
            Mail::to($user->email)->send(new MedicineReminder($medicine));
        }

        // ارسال نوتیفیکیشن
        if ($medicine->reminder_type === 'notification') {
            $user->notify(new MedicineReminderNotification($medicine));
        }

        // ارسال پیامک
        if ($medicine->reminder_type === 'sms') {
            // اینجا کد ارسال پیامک قرار می‌گیرد
            // مثال: $this->sendSMS($user->mobile, "یادآوری مصرف داروی {$medicine->name}");
        }

        // به‌روزرسانی زمان آخرین یادآوری
        $medicine->update([
            'last_reminder' => now(),
            'remaining_dose' => $medicine->remaining_dose - 1
        ]);

        return response()->json([
            'success' => true,
            'message' => 'یادآوری با موفقیت ارسال شد'
        ]);
    }

    public function subscribeToNotifications(Request $request)
    {
        $user = auth()->user();
        $user->update([
            'push_subscription' => $request->subscription
        ]);

        return response()->json([
            'success' => true,
            'message' => 'اشتراک نوتیفیکیشن با موفقیت ثبت شد'
        ]);
    }
}
