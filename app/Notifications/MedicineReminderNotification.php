<?php

namespace App\Notifications;

use App\Models\Medicine;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class MedicineReminderNotification extends Notification
{
    use Queueable;

    protected $medicine;

    public function __construct(Medicine $medicine)
    {
        $this->medicine = $medicine;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('یادآوری مصرف دارو')
            ->line('زمان مصرف داروی ' . $this->medicine->name . ' فرا رسیده است.')
            ->line('لطفاً در اسرع وقت داروی خود را مصرف کنید.')
            ->action('مشاهده جزئیات', url('/dashboard'));
    }

    public function toArray($notifiable)
    {
        return [
            'medicine_id' => $this->medicine->id,
            'medicine_name' => $this->medicine->name,
            'remaining_dose' => $this->medicine->remaining_dose,
            'message' => 'زمان مصرف داروی ' . $this->medicine->name . ' فرا رسیده است.'
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'medicine_id' => $this->medicine->id,
            'medicine_name' => $this->medicine->name,
            'remaining_dose' => $this->medicine->remaining_dose,
            'message' => 'زمان مصرف داروی ' . $this->medicine->name . ' فرا رسیده است.'
        ]);
    }
}
