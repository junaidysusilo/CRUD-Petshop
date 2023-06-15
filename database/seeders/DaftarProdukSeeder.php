<?php

namespace Database\Seeders;

use App\Models\DaftarProduk;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaftarProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produk = new DaftarProduk();
        $produk->fill([
            'nama' => 'Royal Canin',
            'harga' => 15000
        ]);
        $produk->save();

        $produk = new DaftarProduk();
        $produk->fill([
            'nama' => 'Whiskas',
            'harga' => 20000
        ]);
        $produk->save();

        $produk = new DaftarProduk();
        $produk->fill([
            'nama' => 'Cat Choize',
            'harga' => 17000
        ]);
        $produk->save();
    }
}
