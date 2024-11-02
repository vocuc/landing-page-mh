<?php

namespace App\Observers;

use App\Models\ContactForm;
use App\Services\ProductPayment\ProductPaymentService;
use Illuminate\Support\Facades\Mail;

class ContactFormObserver
{
    public function created(ContactForm $contactForm): void
    {
        Mail::raw($contactForm->name . '-' . $contactForm->email . '-' . $contactForm->note, function ($message) {
            $message->to(config('constants.MAIL_CONTACT'));
        });
    }
}
