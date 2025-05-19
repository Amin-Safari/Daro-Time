<?php

namespace App\Mail;

use App\Models\Medicine;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MedicineReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $medicine;

    public function __construct(Medicine $medicine)
    {
        $this->medicine = $medicine;
    }

    public function build()
    {
        return $this->markdown('emails.medicine-reminder')
            ->subject('یادآوری مصرف دارو - ' . $this->medicine->name);
    }
}
