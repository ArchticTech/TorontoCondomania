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
        $user = User::where('email', $email)->first();
        $msg = '';

        if(!$user)
        {
            // Create a new user
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
                'email_verification_token' => Str::random(60), // Generate a unique token for email verification
            ]);
            $msg = "new_user_created";
        }
        else if ($user->email_verified_at != null)
        {
            return response()->json([
                "error" => "user_already_exists"
            ], 200);
        }
        else {
            $msg = "user_not_verified";
        }
        // Send an email with a verification link
        $this->sendVerificationEmail($user);

        // Return a response indicating successful registration
        return response()->json(['msg' => $msg]);
    }
    public function authenticate($email, $password)
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = auth()->user();
        
            if ($user->email_verified_at !== null) {
                // User's email is verified, generate a token
                $token = $user->createToken('authToken')->plainTextToken;
        
                return response()->json(['token' => $token], 200);
            } else {
                // User's email is not verified
                $this->sendVerificationEmail($user);
                return response()->json(['error' => 'email_not_verified']);
            }
        } else {
            // Authentication failed
            return response()->json(['error' => 'invalid_credentials']);
        }
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
    public function resendEmail($email)
    {
        $user = User::where('email', $email)->first();
        
        if($user && $user->email_verified_at == null)
        {
            $this->sendVerificationEmail($user);
        }
    }
    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json('Logged out successfully', 200);
    }
}
