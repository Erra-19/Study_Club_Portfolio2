<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {            
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ]);
        }

        if ($user->nomor_staff && in_array($user->pekerjaan, ['admin', 'manager'])) {            
            Auth::login($user);
            return redirect('/admin');
        } else {            
            return back()->withErrors([
                'email' => 'You do not have permission to log in.',
            ]);
        }
    }
}
