@component('mail::message')
<h4>Reset password</h4>
<p>Hi {{ $user->name }}!</p>
<p>You are receiving this email because we received a password reset request for your account.</p>
<p>If you did not request a password reset, no further action is required.</p>
@component('mail::button', ['url' => action([\App\Http\Controllers\ForgotPasswordController::class, 'edit'], $token)])
Reset password
@endcomponent
@component('mail::footer')
<small>{{ config('app.name') }}</small>
<br>
<a href="{{ action([\App\Http\Controllers\SessionsController::class, 'create']) }}">tpuq.test</a>
@endcomponent
@endcomponent
