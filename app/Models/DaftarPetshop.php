<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPetshop extends Model
{
    use HasFactory;
    protected $table = 'daftar_petshop';
    // protected $fillable = [
    //     'nama_petshop',
    //     'nama_pemilik',
    //     'alamat',
    //     'no_hp'
    // ];
    protected $guarded = ['id'];
}
