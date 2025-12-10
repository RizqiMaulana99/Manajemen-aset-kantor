<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asset::create([
            'nama_aset' => 'Laptop Dell',
            'kategori' => 'Elektronik',
            'lokasi' => 'Ruang Kerja',
            'kondisi' => 'Baik',
            'jumlah' => 10,
            'tanggal_perolehan' => '2023-01-01',
        ]);

        Asset::create([
            'nama_aset' => 'Meja Kantor',
            'kategori' => 'Furnitur',
            'lokasi' => 'Ruang Rapat',
            'kondisi' => 'Baik',
            'jumlah' => 5,
            'tanggal_perolehan' => '2023-02-01',
        ]);

        Asset::create([
            'nama_aset' => 'Proyektor',
            'kategori' => 'Elektronik',
            'lokasi' => 'Ruang Presentasi',
            'kondisi' => 'Baik',
            'jumlah' => 2,
            'tanggal_perolehan' => '2023-03-01',
        ]);
    }
}
