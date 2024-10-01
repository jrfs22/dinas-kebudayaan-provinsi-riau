<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('authentication.login');
    }

    public function profile()
    {
        return view('after-login.profile.index');
    }

    public function signin(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
            ], [
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email harus dalam bentuk format email',
                'email.exists' => 'Tidak ditemukan yang cocok',
                'password.required' => 'Password tidak boleh kosong'
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $this->alert(
                    'Sign in',
                    'Sign in Successfuly',
                    'success'
                );

                return redirect()->route('visi-misi');
            }

            $this->alert(
                'Sign in Failed',
                'Email atau Password Salah',
                'error'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Sign in Failed',
                $e->getMessage(),
                'error'
            );
        }
    }

    public function logout()
    {
        Auth::logout();

        Session::invalidate();

        return redirect()->route('login');
    }
}
