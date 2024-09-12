<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kustomer;
use App\Models\Barang;
use App\Models\Jenis_barang;
use App\Models\Resitemp;

class EasySendDetailController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->input('data');
        $nomor_resi = $request->input('nomor_resi');

        return view('EasySendDetail', compact('data', 'nomor_resi'));
    }

    public function update(Request $request, $id)
    {
        return (new ESUpdateController)->update($request, $id);
    }
}