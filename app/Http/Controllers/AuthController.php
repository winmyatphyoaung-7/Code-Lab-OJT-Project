<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Mail\BetMail;
use App\Models\VerifyUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    //direct login page
    public function loginPage(){
        return Inertia::render("Login");
    }

    //user login
    public function login(LoginRequest $request){

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if(Auth::user()->email_verified_at == null){
                Auth::logout();
                return redirect()->route('auth#loginPage')->with(['verifyYourEmail' => 'Please verify your email to continue']);
            }
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with(['wrongPassword' => 'Incorrect Email or Password!']);
        }
    }

    //direct register page
    public function registerPage(){
        return Inertia::render("Register");
    }

    //user register
    public function register(RegisterRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]);

        VerifyUser::create([
            'token' => Str::random(60),
            'user_id' => $user->id,
        ]);

        Mail::to($user->email)->send(new BetMail($user));
        return redirect()->route('auth#loginPage')->with(['clickEmail' => 'Please click on the link sent to your email']);
    }

    //user verify email
    public function verifyEmail($token){
        $verifiedUser = VerifyUser::where('token',$token)->first();
        if(isset($verifiedUser)){
            $user = $verifiedUser->user;

            if(!$user->email_verified_at){
                $user->email_verified_at = Carbon::now();
                $user->save();
                return redirect()->route('auth#loginPage')->with(['emailVerified' => 'Your email has been verified']);
            }else{
                return redirect()->back()->with(['alreadyVerified' => 'Your email has already been verified']);
            }
        }else{
            return redirect()->route('admin#loginPage')->with(['error' => 'Something went wrong']);
        }
    }

    //dashboard
    public function dashboard(){
        if(Auth::user()->role == 'admin') {
            return redirect()->route('admin#homePage');
        }else {
            return redirect()->route('user#homePage');
        }
    }

    //logout
    public function logout() {
        Auth::logout();
        return redirect()->route('auth#loginPage');
    }

    //show forget password form
    public function showForgetForm(){
        return Inertia::render('ForgetPassword');
    }

    //send forget password link
    public function sendResetLink(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $token =  Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' =>  Carbon::now(),
        ]);

        $action_link = route('reset#passwordForm',['token' => $token, 'email' => $request->email]);
        $body =  "We are received a request to reset the password for <b> Signature Of Seven </b> account associated with ".$request->email.". You can reset your password by clicking the link below";
        Mail::send('admin.mail.email-forget',['action_link' => $action_link, 'body' => $body],function($message) use ($request){
            $message->from('winmyatphyoaung92@gmail.com' , 'Signature Of Seven');
            $message->to($request->email,"Ko Phyo")->subject('Reset Password');
        });

        return back()->with('resetLink','We have sent your password reset link!');
    }

    //show reset form
    public function showResetForm(Request $request, $token=null) {
        return Inertia::render('Reset')->with(['token' => $token,'email' => $request->email]);
    }

    //password reset
    public function resetPassword(Request $request){
        
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if(!$check_token) {
            return back()->withInput()->with('fail','Invalid token');
        }else{
            User::where('email',$request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();

            return redirect()->route('auth#loginPage')->with('emailVerified','Your password has been changed!');
        }
    }
}
