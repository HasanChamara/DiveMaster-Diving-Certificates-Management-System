<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class ForgotPasswordController extends Controller
{
    public function showEmailForm()
    {
        return view('auth.forgot-password');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $otp = rand(100000, 999999);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['otp' => $otp, 'created_at' => Carbon::now()]
        );

        // Send email
        Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Your OTP Code');
        });

        session(['reset_email' => $request->email]);

        return redirect()->route('password.otp')->with('success', 'OTP sent to your email.');
    }

    public function showOtpForm()
    {
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required']);

        $record = DB::table('password_resets')->where('email', session('reset_email'))->first();

        if (!$record || $record->otp !== $request->otp) {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }

        session(['otp_verified' => true]);

        return redirect()->route('password.reset');
    }

    public function showResetForm()
    {
        if (!session('otp_verified')) {
            return redirect()->route('password.request');
        }

        return view('auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', session('reset_email'))->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Cleanup and clear session
        DB::table('password_resets')->where('email', session('reset_email'))->delete();
        session()->forget(['reset_email', 'otp_verified']);

        return redirect()->route('login')->with('success', 'Password reset successful. You can log in now.');
    }
}
