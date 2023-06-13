<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarProduk extends Model
{
    use HasFactory;
    protected $table = 'daftar_produk';
    protected $primaryKey = 'id_produk';
    // protected $fillable = [
    //     'nama',
    //     'harga'
    // ];
    protected $guarded = ['id_produk'];
}
