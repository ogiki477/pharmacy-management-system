@component('mail::message')

Hi, {{ $user->name }}. Forgot Your Password?

<p>Ha!! It happens. Click the link below to reset your password</p>
@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
   Reset Your Password
@endcomponent

<p>
In case you have any issue recovering your password, please contact us using the form from contact-us.
Thanks,
</p><br>
{{ config('app.name') }}

@endcomponent
