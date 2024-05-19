
Hi {{$user->fullName}}

We’re Sending you this email because You requested a password reset. click on
this link to create a new password:

<a href="{{route('customer.verifyPasswordResetCode', $password_reset_code)}}" class="password-button">Set a new password</a>
