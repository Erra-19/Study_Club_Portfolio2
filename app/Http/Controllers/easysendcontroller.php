<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kustomer;
use App\Models\Barang;
use App\Models\Jenis_barang;
use App\Models\Resitemp;

class EasySendController extends Controller
{
    public function dropdown()
    {
        $jenisbarang = Jenis_barang::all();
        return view('EasySend', compact('jenisbarang'));
    }    

    public function form(Request $request)
    {    
        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'email_pengirim' => 'required|email|max:255',
            'nomor_telpon_pengirim' => 'required|numeric',
            'alamat_kirim' => 'required|string|max:255',
            'nama_penerima' => 'required|string|max:255',
            'nomor_telpon_penerima' => 'required|numeric',
            'alamat_tujuan' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'id_jenis_barang' => 'required|exists:jenis_barang,id',
            'berat_barang' => 'required|numeric',
            'mudah_pecah' => 'required|in:fragile,not_fragile',
        ]);
    
        $kustomer = Kustomer::create([
            'nama_pengirim' => $request->input('nama_pengirim'),
            'email_pengirim' => $request->input('email_pengirim'),
            'nomor_telpon_pengirim' => $request->input('nomor_telpon_pengirim'),
            'nama_penerima' => $request->input('nama_penerima'),
            'nomor_telpon_penerima' => $request->input('nomor_telpon_penerima'),
            'alamat_kirim' => $request->input('alamat_kirim'),
            'alamat_tujuan' => $request->input('alamat_tujuan'),           
        ]);

        $barang = Barang::create([
            'nama_barang' => $request->input('nama_barang'),
            'id_jenis_barang' => $request->input('id_jenis_barang'),
            'berat_barang' => $request->input('berat_barang'),
            'mudah_pecah' => $request->input('mudah_pecah') === 'fragile' ? 1 : 0,
            'id_kustomer' => $kustomer->id,
        ]);

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
                'jenis_barang' => $barang->jenis_barang->jenis_barang,
                'berat_barang' => $barang->berat_barang,
                'mudah_pecah' => $barang->mudah_pecah ? 'Yes' : 'No',
                'id_kustomer' => $kustomer->id,
            ]
        ]; 

        $randomNumber = rand(100000, 999999);
    
        $resitemp = new Resitemp();
        $resitemp->id_kustomer = $kustomer->id;
        $resitemp->nomor_resi = $randomNumber;
        $resitemp->save();

        return redirect()->route('easysenddetail', ['data' => $data, 'nomor_resi' => $randomNumber]);
    }
}