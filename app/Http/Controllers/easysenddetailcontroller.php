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

        // Use the data and random number to display the details in the view
        return view('EasySendDetail', compact('data', 'nomor_resi'));
    }
    // EasySendDetailController.php

public function update(Request $request, $id)
{
    // Call the update method in the EasySendController
    return (new ESUpdateController)->update($request, $id);
}
}