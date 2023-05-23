@component('mail::message')
# Reset Password

Hello {{$user->name}},

You are receiving this email because we received a password reset request for your account.

Click the button below to reset your password:

@component('mail::button', ['url' => route('reset.password', $token), 'color' => 'primary'])
Reset Password
@endcomponent


If you did not request a password reset, no further action is required.

Thanks,
Your Application
@endcomponent
