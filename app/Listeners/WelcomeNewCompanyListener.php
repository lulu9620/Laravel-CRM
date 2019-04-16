<?php

namespace App\Listeners;

use App\Mail\WelcomeNewCompanyMail;
use Illuminate\Support\Facades\Mail;

class WelcomeNewCompanyListener
{
    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->company->email)->send(new WelcomeNewCompanyMail());
    }
}
