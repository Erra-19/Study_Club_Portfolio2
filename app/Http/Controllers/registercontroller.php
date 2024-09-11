<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        User::create([
            'nama' => $request->input('nama'),
            'pekerjaan' => $request->input('pekerjaan'),
            'nomor_staff' => $request->input('nomor_staff'),
            'nomor_telpon' => $request->input('nomor_telpon'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('/login');
    }
}