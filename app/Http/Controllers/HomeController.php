<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Property;
use App\Models\User;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::all();

        return view('main', compact('properties'));
    }
    public function register($name, $email, $password)
    {
        // Create a new user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'email_verification_token' => Str::random(60), // Generate a unique token for email verification
        ]);

        // Send an email with a verification link
        $this->sendVerificationEmail($user);

        // Return a response indicating successful registration
        return response()->json(['message' => 'Registration successful. Please check your email for verification.'], 201);
    }

    protected function sendVerificationEmail($user)
    {
        // Send an email with a verification link containing the token
        $email = Mail::to($user->email)->send(new EmailVerification($user));

        dd($email);
    }
}
