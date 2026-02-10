<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10'
        ]);

        // Check if user exists
        $user = User::where('mobile', $request->mobile)->first();

        if (!$user) {
            return back()->with('error', 'User not registered. Contact admin.');
        }

        // Generate OTP
        $otp = rand(100000, 999999);

        // Invalidate old OTPs
        Otp::where('mobile', $request->mobile)->update(['used' => true]);

        // Store OTP
        Otp::create([
            'mobile' => $request->mobile,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(5),
            'used' => false
        ]);

        return redirect()->route('otp.form')
            ->with('mobile', $request->mobile)
            ->with('otp', $otp)
            ->with('success', 'OTP sent successfully');
    }

    public function showOtpForm()
    {
        return view('auth.otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10',
            'otp' => 'required|digits:6'
        ]);

        $otpRecord = Otp::where('mobile', $request->mobile)
            ->where('otp', $request->otp)
            ->where('used', false)
            ->latest()
            ->first();

        if (!$otpRecord) {
            return back()->with('error', 'Invalid OTP');
        }

        if ($otpRecord->expires_at < Carbon::now()) {
            return back()->with('error', 'OTP expired');
        }

        $otpRecord->update(['used' => true]);

        return redirect()->route('set.mpin')
            ->with('success', 'OTP verified successfully');
    }

    public function resendOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|digits:10'
        ]);

        return $this->sendOtp($request);
    }
}
