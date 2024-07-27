<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        // GET EMAIL/PASSWORD
        $data = $request->validated();
        // VALIDATED
        if ($data) {
            $find = User::where('email', $data['emailOrUsername'])->orWhere('name', $data['emailOrUsername'])->first();
            // CHECK EMAIL
            if ($find) {
                // CHECK PASSWORD
                if (Hash::check($data['password'], $find->password)) {
                    // LOGIN
                    Auth::login($find);
                    return redirect()->route('dashboard');
                }else{
                    return redirect()->back()->withInput()->withErrors(['message' => 'password anda salah']);
                }
            }else{
                return redirect()->back()->withErrors(["message" => "Email tidak terdaftar"]);
            }
        }
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login');
    }
}
