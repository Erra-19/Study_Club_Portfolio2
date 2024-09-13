<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        Staff::create([
            'name' => $request->input('name'),
            'staff_job' => $request->input('staff_job'),
            'staff_id' => $request->input('staff_id'),
            'staff_phone_numbers' => $request->input('staff_phone_numbers'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('/login');
    }
}