<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kustomer;
use App\Models\Barang;
use App\Models\Jenis_barang;
use App\Models\Resitemp;

class TrackingController extends Controller
{
    public function index()
    {
        return view('tracking.index');
    }

    public function search(Request $request)
    {
        $resi = $request->input('resi');
        $nomor_resi = $resi;
        $resitemp = Resitemp::where('nomor_resi', $resi)->first();

        if (!$resitemp) {
            return redirect()->back()->with('error', 'Nomor resi tidak ditemukan.');
        }

        $kustomer = Kustomer::find($resitemp->id_kustomer);

        if (!$kustomer) {
            return redirect()->back()->with('error', 'Kustomer tidak ditemukan.');
        }

        $barang = Barang::where('id_kustomer', $kustomer->id)->first();

        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan.');
        }

        $jenis_barang = Jenis_barang::find($barang->id_jenis_barang);

        $data = [
            [            
                'nama_pengirim' => $kustomer->nama_pengirim,
                'email_pengirim' => $kustomer->email_pengirim,
                'nomor_telpon_pengirim' => $kustomer->nomor_telpon_pengirim,
                'alamat_kirim' => $kustomer->alamat_kirim,
                'nama_penerima' => $kustomer->nama_penerima,
                'nomor_telpon_penerima' => $kustomer->nomor_telpon_penerima,
                'alamat_tujuan' => $kustomer->alamat_tujuan,
                'nama_barang' => $barang->nama_barang,
                'jenis_barang' => $jenis_barang ? $jenis_barang->jenis_barang : 'Tidak Diketahui',
                'berat_barang' => $barang->berat_barang,
                'mudah_pecah' => $barang->mudah_pecah ? 'Yes' : 'No',
                'id_kustomer' => $kustomer->id,
            ]
        ];

        return view('EasySendDetail', ['data' => $data, 'nomor_resi' => $nomor_resi]);
    }
}