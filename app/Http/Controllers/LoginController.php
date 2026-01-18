<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('logbook/dashboard');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'active' => 1
        ];

        if (Auth::Attempt($data)) {
            return redirect('logbook/dashboard');
        }else{
            $activeCheck = User::select('active')
                    ->where('email', $request->input('email'))
                    ->where('active', 0)
                    ->exists();

            if($activeCheck){
                Session::flash('error', 'Periksa email anda dan klik link aktivasi dari email anda');
            }else{
                Session::flash('error', 'Opps! Email atau Password Salah');
            }
            
            return redirect('logbook/login');
        }
    }

    public function changepass()
    {
        return view('changepass');
    }

    public function actionchangepass(Request $request)
    {
        Auth::logout();
        Session::flash('error', 'Password berhasil diubah');
        return redirect('logbook/login');
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('logbook/login');
    }
}
