<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth As Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public $guard = 'admin';

    public function __construct()
    {
        $this->middleware('admin',['except'=>'showProfile']);
    }
    public function showProfile(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            array(
                "email"                 => "required|email|max:255",
                "password"              => "required|min:6",

            )
        );
        // 2a. jika semua validasi terpenuhi simpan ke database
        if($validator->passes())
        {
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'level'=>'A' ])) {
                // The user is active, not suspended, and exists.
                $data['title'] = 'Dashboard';
               return  Redirect::to('/dashboard')->with($data);
                

            }
            else
            {
                return Redirect::to('/login_admin')->withErrors('Failed to login, email and password does not match with database')->withInput($request->except('password'));
            }

        }
        // 2b. jika tidak, kembali ke halaman form registrasi
        else
        {
            return Redirect::to('/login_admin')
                ->withErrors($validator)
                ->withInput();
        }

    }
    public function logoutAdmin()
    {
        Auth::logout();
        return Redirect::to('/login_admin');
    }
}
