<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }
    public function registerStore(Request $request)
    {
        // $this->validateRequest($request);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        // $active = $request->input('role') == 'employer' ? 0 : 1;
        $active = $request->role == 'employer' ? 0 : 1;
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            "password" => bcrypt($request->password),
        ]);

        return redirect()->route("loginForm")->with("success", "You have successfully registered!");
    }

    public function login()
    {
        $previousURL = url()->previous();
        $baseURL = url()->to("/");

        if ($previousURL != $baseURL . "/login") {
            session()->put("url.intended", $previousURL);
        }

        return view("auth.login");
    }

    public function loginStore(Request $request)
    {

        // $previousURL = url()->previous();

        // session()->put("intendentURL", $previousURL);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->usertype === '1') {
                return redirect()->route('index');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->with("error", "Email & password do not match our records!");
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }

    // AuthController.php
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
    }
}
