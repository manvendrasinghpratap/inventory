<?php

namespace App\Mail;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendOTP extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->mail_id = $id;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //$userdetails = User::where('email',$this->mail_id)->get();
        $userdetails = User::where('email',$this->mail_id)->first();
		$password = '123456';
        if(!empty($userdetails)){
            $userdetail = User::find($userdetails['id']);
            $userdetail->temp_pass = $password = mt_rand(10000, 99999);
            $userdetail->password = Hash::make($userdetail->temp_pass);
            $userdetail->save();
        }
		//return $this->view('mail.mail',['temp_pass'=>$password])->attach('/public/images/header.jpg')->to($this->mail_id)->subject('testing');
        //return $this->view('mail.mail',['temp_pass'=>$password])->attach('http://localhost/bigbucket/evaluationadmin/public/images/header.jpg')->to($this->mail_id)->subject('Login OTP');
		return $this->view('mail.mail',['temp_pass'=>$password])->to($this->mail_id)->subject('Login OTP')->from('weborigin.co.in@gmail.com');
		exit();
    
    }
}
