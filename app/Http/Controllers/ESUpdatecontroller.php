<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kustomer;
use App\Models\Barang;
use App\Models\Jenis_barang;
use App\Models\Resitemp;

class ESUpdatecontroller extends Controller
{
    public function updateform($id)
    {        
        $kustomer = Kustomer::find($id);
        $barang = Barang::where('id_kustomer', $id)->first();
        $jenisbarang = Jenis_barang::all();
        return view('ESUpdate', ['barang' => $barang, 'kustomer'=> $kustomer, 'jenisbarang'=>$jenisbarang]);
    }
    public function update(Request $request, $id)
    {    
        $kustomer = Kustomer::find($id);
        $barang = Barang::where('id_kustomer', $id)->first();
        // Validate the incoming request
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

        // Update kustomer information
        $kustomer->nama_pengirim = $request->input('nama_pengirim');
        $kustomer->email_pengirim = $request->input('email_pengirim');
        $kustomer->nomor_telpon_pengirim = $request->input('nomor_telpon_pengirim');
        $kustomer->nama_penerima = $request->input('nama_penerima');
        $kustomer->nomor_telpon_penerima = $request->input('nomor_telpon_penerima');
        $kustomer->alamat_kirim = $request->input('alamat_kirim');
        $kustomer->alamat_tujuan = $request->input('alamat_tujuan');
        $kustomer->save();

        // Update barang information
        $barang->nama_barang = $request->input('nama_barang');
        $barang->id_jenis_barang = $request->input('id_jenis_barang');
        $barang->berat_barang = $request->input('berat_barang');
        $barang->mudah_pecah = $request->input('mudah_pecah') === 'fragile' ? 1 : 0;
        $barang->save();

        
        // Redirect to the EasySendDetail view with the updated data
        return redirect()->route('easysenddetail', ['data' => [
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
        ]]);
    }
    public function delete($id)
    {
        $kustomer = Kustomer::find($id);
        $barang = Barang::where('id_kustomer',$id)->first();
        $nomor_resi = Resitemp::where('id_kustomer', $id)->first();

        if ($kustomer && $barang && $nomor_resi) {
            $kustomer->delete();
            $barang->delete();
            $nomor_resi->delete();

            return redirect('/EasySend')->with('success', 'Data berhasil dihapus');
            } else {
                return redirect('/EasySend')->with('error', 'Data tidak ditemukan');
        }
    }
}