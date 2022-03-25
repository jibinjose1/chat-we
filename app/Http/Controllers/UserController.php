<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Crypt;
use Mail;
use Str;
use Carbon\Carbon;

class UserController extends Controller
{
    public function loginView(Request $request)
    {
        return view('modules.user.login');
    }
    public function doLogin(Request $request)
    {
        $email          = $request->get('email');
        $password       = $request->get('password');
        $userData       = User::where('email',$email)->first();
    
        if($userData && Hash::check($password,$userData->password)){
            $loginSuccess = 'Login Successfully';
            Session::put('user',$userData);
            Session::put('loginSuccess',$loginSuccess);
            return redirect()->route('home',['id'=>Crypt::encrypt($userData->id)]);
        }
        else{
            $loginError = 'The Credential You Entered wrong';
            Session::put('loginError',$loginError);
            return redirect()->route('login.view');
        }
        
    }
    public function registerView()
    {
        return view('modules.user.register');
    }
    public function doRegister(Request $request)
    {
        $username   =  $request->get('name');
        $email      =  $request->get('email');
        $password   =  $request->get('password');
        $token      =  $request->get('_token');

        $user                   = new User;
        $user->name             = $username;
        $user->email            = $email;
        $user->password         = Hash::make($password);
        $user->remember_token   = $token;

        if($user->save()){
            return redirect()->route('login.view')->with(['success'],'User Register Successfully');
        }
        else{
            return redirect()->route('register.view')->with(['error'],'Please Enter Valid Details');
        }
        
    }
    public function profile()
    {
        return view('modules.user.profile');
    }
    public function logout()
    {
        Session::forget('user');
        Session::forget('loginSuccess');
        Session::forget('loginError ');
        return redirect()->route('login.view');
    }
    public function forgotPassword()
    {
        return view('modules.user.forgotpassword');
    }
    public function sendResetMail(Request $request)
    {
        $token      = $request->get('_token');
        $userEmail  = $request->get('mail');
        $userData   = User::select('id','name','email')
                            ->where('email',$userEmail)->first();

        if(!empty($userData)){
            $encryptID   = Crypt::encrypt($userData->id);
            $toEmail     = $userData->email;
            $name        = $userData->name;
            $subject     = "Chat We - forgot Password";
            $userToken   = Str::random(60);
            $expiryTime  = Carbon::now()->addMinutes(60*24)->format('Y-m-d');

            Mail::send('modules.user.resetMail',['token'=>$userToken,'name'=>$name,'id'=>$encryptID], function ($message) use ($subject,$toEmail){
                    $message->from('jibinzewia@gmail.com');
                    $message->to($toEmail);
                    $message->subject($subject);
            });
            return redirect()->route('login.view')->with('success','Forget Password Send Successfully,Please check your Gmail');
        }
        else{ 
            return redirect()->route('forgot.password')->with('error','Please Enter Valid Email!');
        }
    }
    public function resetPasswordView(Request $request)
    {
        $encryptID = $request->get('id');
        $otp       = random(100000,999999);

        return view('modules.user.resetpassword',compact('encryptID','otp'));
    }
    public function resetPassword(Request $request)
    {
        $newPassword        = $request->newpassword;
        $confirmPassword    = $request->confimpassword;
        $id                 = $request->get('userid');
        $userID             = Crypt::decrypt($id);
        $userData           = User::select('id','name','email')
                                    ->where('id',$userID)->first();
        $toEmail            = $userData->email;
        $name               = $userData->name;
        $subject            = "Chat We - forgot Password";   
        
        if(!empty($userData)){
            if($newPassword == $confirmPassword){

                $userData->password = Hash::make($confirmPassword);
                    if($userData->save()){
                        Mail::send('modules.user.successMail',['name'=>$name], function ($message) use ($subject,$toEmail){
                            $message->from('jibinzewia@gmail.com');
                            $message->to($toEmail);
                            $message->subject($subject);
                        });
                    }
                $success = 'Password Reset Successfully!';
                Session::put('success',$success);
                Session::forget('error');
                return redirect()->route('login.view');
            }
            else{
                $error              = 'Password Not Match!';
                Session::put('error',$error);
                Session::forget('success');
                return redirect()->route('reset.password.view',compact('id'));
            }
        }
        
    }
}
