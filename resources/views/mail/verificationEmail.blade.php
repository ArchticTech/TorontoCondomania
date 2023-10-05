<p>Hello {{ $user->name }},</p>

<p>Please click the following link to verify your email address:</p>

<a href="{{ $verification_link }}">{{ $verification_link }}</a>

<p>If you didn't create an account, you can safely ignore this email.</p>
