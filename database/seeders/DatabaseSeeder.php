<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        Permission::create(['name' => 'crud_daftar_produk']);
        Permission::create(['name' => 'edit_petshop']);
        Permission::create(['name' => 'transaksi']);

        $role_admin = Role::create(['name' => 'Admin']);
        $role_admin = Role::create(['name' => 'Fia Cantik']);
        $role_admin->syncPermissions(['crud_daftar_produk', 'edit_petshop', 'transaksi']);

        $user = new User();
        $user->fill(
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make(123456),
                'remember_token' => Str::random(10)
            ]
        );
        $user->save();
        $user->assignRole($role_admin);

        $user = new User();
        $user->fill([
            'name' => 'Fia Cantik',
            'username' => 'fiacantik',
            'email' => 'fiacantik@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(123456),
            'remember_token' => Str::random(10)
        ]);
        $user->save();
        $user->assignRole($role_admin);

        $this->call(DaftarProdukSeeder::class);
        $this->call(DaftarPetshopSeeder::class);
    }
}
