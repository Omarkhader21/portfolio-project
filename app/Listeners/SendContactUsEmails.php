<?php

namespace App\Listeners;

use App\Events\ContactUsFormSubmitted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendContactUsEmails
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactUsFormSubmitted $event): void
    {
        $data = $event->data;

        // Send a "thank you" email to the user
        Mail::send('emails.thank-you', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])
                ->subject('Thank you for contacting us!');
        });

        // Send the contact form details to the admin
        Mail::send('emails.contact-us', ['data' => $data], function ($message) {
            $message->to(env('MAIL_FROM_ADDRESS')) // Use ADMIN_EMAIL from .env
                ->subject('New Contact Us Form Submission');
        });
    }
}
