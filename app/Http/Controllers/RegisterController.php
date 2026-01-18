<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\MailSend;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    
    public function actionregister(Request $request)
    {        
        $str = Str::random(100);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'verify_key' => $str,
            'remember_token' => $request->_token,
            'active' => 1
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'website' => 'www.asdemo.my.id',
            'datetime' => date('Y-m-d H:i:s'),
            'url' => request()->getHttpHost().'/register/verify/'.$str
        ];

        //Mail::to($request->email)->send(new MailSend($details));
        //Session::flash('message', 'Link verifikasi telah dikirim ke Email Anda. Silahkan Cek Email Anda untuk Mengaktifkan Akun');
        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan email dan password.');
        return redirect('logbook/login');
    }

    public function verify($verify_key)
    {
        $keyCheck = User::select('verify_key')
                    ->where('verify_key', $verify_key)
                    ->exists();
        
        if ($keyCheck) {
            $user = User::where('verify_key', $verify_key)
            ->update([
                'email_verified_at' => date('Y-m-d H:i:s'),
                'active' => 1
            ]);
            
            return "Verifikasi Berhasil. Akun Anda sudah aktif.";
        }else{
            return "Key tidak valid!";
        }
    }
}
