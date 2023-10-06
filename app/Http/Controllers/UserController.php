<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\EmailVerification;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Register new user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register($name, $email, $password)
    {
        // Create a new user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'email_verification_token' => Str::random(60), // Generate a unique token for email verification
        ]);
        Auth::login($user);
        // Send an email with a verification link
        $this->sendVerificationEmail($user);

        // Return a response indicating successful registration
        return response()->json(['message' => 'Registration successful. Please check your email for verification.'], 201);
    }

    protected function sendVerificationEmail($user)
    {
        // Send an email with a verification link containing the token
        $email = Mail::to($user->email)->send(new EmailVerification($user));
    }
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verifyEmail(Request $request)
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            return response()->json(['success', 'Your email is already verified.']);
        }

        if ($user->markEmailAsVerified()) {
            event(new \Illuminate\Auth\Events\Verified($user));
            return response()->json(['success', 'Email verified successfully.']);
        } else {
            return response()->json(['error', 'Email verification failed.']);
        }
    }
}
