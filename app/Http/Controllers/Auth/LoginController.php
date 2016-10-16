<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Aadhaar;
use Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function aadhaar()
    {
        return view('auth.aadhaar');
    }

    public function validateAadhaar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aadhaarId' => 'required|exists:users,aadhaar_id',
        ], [
            'aadhaarId.exists' => 'Invalid id or Aadhaar is not registered with us.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if ($request->has('otp')) {
            if (Aadhaar::verifyOtp()) {
                auth()->login(User::whereAadhaarId($request['aadhaarId'])->first());
                return redirect('/');
            }
        }

        if (Aadhaar::generateOtp()) {
            return redirect()->back()->with([
                'otpGenerated' => true,
            ])->withInput();
        }

        return redirect()->back()->withErrors(['Unable to generate OTP.']);
    }
}
