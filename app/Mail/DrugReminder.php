<?php

namespace App\Mail;

use App\Models\Drug;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DrugReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $drug;

    public function __construct(Drug $drug)
    {
        $this->drug = $drug;
    }

    public function build()
    {
        return $this->view('emails.drug-reminder')
            ->subject('یادآوری مصرف دارو');
    }
}
