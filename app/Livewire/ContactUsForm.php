<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Events\ContactUsFormSubmitted;
use Illuminate\Support\Facades\RateLimiter;

class ContactUsForm extends Component
{
    #[Validate('required', message: 'The name field is required.')]
    #[Validate('min:3', message: 'The name must be at least 3 characters.')]
    public ?string $name = '';

    #[Validate('required', message: 'The email field is required.')]
    #[Validate('email', message: 'Please provide a valid email address.')]
    public ?string $email = '';

    #[Validate('required', message: 'The subject field is required.')]
    #[Validate('min:5', message: 'The subject must be at least 5 characters.')]
    public ?string $subject = '';

    #[Validate('required', message: 'The message field is required.')]
    #[Validate('min:10', message: 'The message must be at least 10 characters.')]
    public ?string $message = '';
    public bool $rateLimited = false; // Track rate limit status
    public function mount()
    {
        $this->checkRateLimit();
    }

    public function checkRateLimit()
    {
        $rateLimiterKey = 'contact-us-form:' . request()->ip();
        $this->rateLimited = RateLimiter::tooManyAttempts($rateLimiterKey, 1); // Ensure rateLimited reflects actual state
    }

    public function sendMail()
    {
        $this->validate();

        // Rate Limiter Key
        $rateLimiterKey = 'contact-us-form:' . request()->ip();

        // Check rate limit
        if (RateLimiter::tooManyAttempts($rateLimiterKey, 1)) {
            $seconds = RateLimiter::availableIn($rateLimiterKey);
            flash()->options(['position' => 'bottom-right'])->warning("You can only submit the form once every 3 minutes. Please wait {$seconds} seconds.");
            $this->rateLimited = true; // Set rateLimited to true when rate limit is hit
            return;
        }

        // Record the attempt and set the rate limiter timeout to 3 minutes
        RateLimiter::hit($rateLimiterKey, 180);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ];

        event(new ContactUsFormSubmitted($data));

        flash()->options(['position' => 'bottom-right'])->success('Your message has been sent successfully.');

        $this->reset(); // Reset form fields
        $this->checkRateLimit(); // Update rate limit status
    }


    public function render()
    {
        return view('livewire.contact-us-form');
    }
}
