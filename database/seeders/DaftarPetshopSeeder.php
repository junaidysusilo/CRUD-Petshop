<?php

namespace Database\Seeders;

use App\Models\DaftarPetshop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use database;

class DaftarPetshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $petshop = new DaftarPetshop();
        $petshop->fill([
            'nama_petshop' => 'Jojo Petshop',
            'nama_pemilik' => 'Andini',
            'alamat' => 'Perum Permata Baru, Jepun',
            'no_hp' => '081234567890'
        ]);
        $petshop->save();
    }
}
