<div>
    <form wire:submit.prevent="sendMail" class="*:flex *:flex-col *:gap-1 mt-5 md:w-2/3 w-full">
        <!-- Name Field -->
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter your name" class="input"
                wire:model="name">
            <div class="error-message">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <!-- Email Field -->
        <div class="mt-2">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" placeholder="Enter your email address" class="input"
                wire:model="email">
            <div class="error-message">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <!-- Subject Field -->
        <div class="mt-2">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" placeholder="Enter the subject" class="input"
                wire:model="subject">
            <div class="error-message">
                @error('subject')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <!-- Message Field -->
        <div class="mt-2">
            <label for="message">Message</label>
            <textarea name="message" id="message" placeholder="Enter your message" class="input" wire:model="message"></textarea>
            <div class="error-message">
                @error('message')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <button type="button" class="btn btn-filled ml-auto flex items-center justify-center" wire:click="sendMail"
            wire:loading.attr="disabled" :disabled="$rateLimited" wire:key="contact-us-form-{{ $rateLimited }}">
            <!-- Spinner while loading -->
            <svg wire:loading class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.372 0 0 5.373 0 12h4zm2 5.291A7.964 7.964 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <!-- Button Text -->
            <span wire:loading.remove>Send to Us</span>
        </button>
    </form>
</div>
