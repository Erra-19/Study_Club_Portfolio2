<?php

namespace Database\Seeders;

use App\Models\pengiriman_status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class statusseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengirimanstatus = [
            [
                'nama_status' => 'Pesanan Diterima',
                'deskripsi_status' => 'Pesanan telah diterima dan sedang diproses oleh sistem',
            ],
            [
                'nama_status' => 'Siap Dijemput',
                'deskripsi_status' => 'Pesanan siap dijemput dan kurir dalam perjalanan',
            ],
            [
                'nama_status' => 'Sedang Dikemas',
                'deskripsi_status' => 'Pesanan sedang dalam proses pengemasan untuk persiapan pengiriman',
            ],
            [
                'nama_status' => 'Siap Dikirim',
                'deskripsi_status' => 'Pesanan sudah dikemas dan siap dikirim ke alamat tujuan',
            ],
            [
                'nama_status' => 'Dalam Perjalanan',
                'deskripsi_status' => 'Pesanan dalam perjalanan',
            ],
            [
                'nama_status' => 'Tiba di Pusat Sortit',
                'deskripsi_status' => 'Pesanan tiba di puset penyortiran untuk diproses sebelum menuju ke alamat tujuan',
            ],
            [
                'nama_status' => 'Perjalanan Menuju Penerima',
                'deskripsi_status' => 'Pesanan dalam perjalanan menuju alamat tujuan',
            ],
            [
                'nama_status' => 'Selesai',
                'deskripsi_status' => 'Pesanan telah sampai dan dikonfirmasi oleh penerima',
            ],
            [
                'nama_status' => 'Tertuna',
                'deskripsi_status' => 'Pengiriman mengalamai penundaan',
            ],
            [
                'nama_status' => 'Rusak',
                'deskripsi_status' => 'Barang mengalami kerusakaan dalam pengiriman',
            ],
            [
                'nama_status' => 'Hilang',
                'deskripsi_status' => 'Barang tidak ditemukan atau hilang dalam pengiriman',
            ],
            [
                'nama_status' => 'Gagal',
                'deskripsi_status' => 'Pengiriman gagal',
            ],
            [
                'nama_status' => 'Perjalanan Kembali Menuju Pengirim',
                'deskripsi_status' => 'Barang sedang dalam perjalanan kembali ke pengirim',
            ],
        ];

        foreach ($pengirimanstatus as $status) {
            pengiriman_status::create($status);
        }
    }
}
