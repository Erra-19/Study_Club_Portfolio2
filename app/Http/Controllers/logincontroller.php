<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;

class LoginController extends Controller
{
    public function login(Request $request)
    {        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $staff = Staff::where('email', $request->input('email'))->first();

        if (!$staff || !Hash::check($request->input('password'), $staff->password)) {            
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ]);
        }

        if ($staff->staff_id && in_array($staff->staff_job, ['admin', 'manager'])) {            
            Auth::login($staff);
            return redirect('/admin');
        } else {            
            return back()->withErrors([
                'email' => 'You do not have permission to log in.',
            ]);
        }
    }    
}