<?php

namespace Database\Seeders;

use App\Models\jenis_barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class jenisseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisbarang = [
            [
                'jenis_barang' => 'Umum',
                'deskripsi_jenis_barang' => 'Barang umum, tidak perlu penanganan khusus',
            ],
            [
                'jenis_barang' => 'Berharga',
                'deskripsi_jenis_barang' => 'Barang bernilai tinggi, seperti perhiasan dan dokumen penting',
            ],
            [
                'jenis_barang' => 'Berbahaya',
                'deskripsi_jenis_barang' => 'Barang berbahaya seperti bahan kimia, gas, atau mudah terbakar',
            ],
            [
                'jenis_barang' => 'Pecah Belah',
                'deskripsi_jenis_barang' => 'Barang mudah rusak atau pecah',
            ],
            [
                'jenis_barang' => 'Dokumen',
                'deskripsi_jenis_barang' => 'Surat atau dokumen umum lainnya',
            ],
            [
                'jenis_barang' => 'Elektronik',
                'deskripsi_jenis_barang' => 'Barang elektronik seperti kamera, laptop, atau handphone',
            ],
            [
                'jenis_barang' => 'Beku',
                'deskripsi_jenis_barang' => 'Barang beku yang memerlukan pengiriman cepat',
            ],
            [
                'jenis_barang' => 'Medis',
                'deskripsi_jenis_barang' => 'Barang kesehatan seperti obat-obatan atau alat kesehatan',
            ],
            [
                'jenis_barang' => 'Hewan Hidup',
                'deskripsi_jenis_barang' => 'Hewan yang dikirim dalam kondisi hidup, memerlukan perawatan khusus saat pengiriman',
            ],
        ];

        foreach ($jenisbarang as $jenis) {
            jenis_barang::create($jenis); // or use JenisBarang::create($jenis) depending on your model's name
        }
    }
}
