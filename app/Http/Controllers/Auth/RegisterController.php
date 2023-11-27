<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::SENDMAIL;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
    
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'lastName'=>['required', 'string'],
            'sex'=>'required',
            'phone'=>['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $slug=\slug('US');

        try {
            Mail::send('mails.emailVerificationEmail',['slug'=>$slug], function ($message) use($data){
            $message->to($data['email']);
            $message->subject('Email Verification Mail');
        });

        } catch (\Throwable $th) {
            //throw $th;
        }
        
        return User::create([
            'name' => $data['name'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'lastName'=>$data['lastName'],
            'sex'=>$data['sex'],
            'phone'=>$data['phone'],
            'password' => Hash::make($data['password']),
            'slug'=> $slug
        ]);

        
        // Sending verification mail
    
        // return \redirect()->route('sendEmail');

    }

    public function verifyAccount($slug){
        \dd("Mourir");
        $user=User::where('slug',$slug)->first();
        $message = 'Sorry your email cannot be identified.';

        if(!is_null($user)){
            if(! $user->email_verified_at){
                $user->email_verified_at=\date('d/m/Y H:i:s');
                $user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
        return redirect()->route('login')->with('success', $message);

    }
    
    
}
