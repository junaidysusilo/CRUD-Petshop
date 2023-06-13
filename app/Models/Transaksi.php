<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id', 'total_harga', 'kode_transaksi'
    ];
    public static function boot()
    {
        parent::boot();

        //sebelum insert data
        self::creating(function ($model){
            $model->kode_transaksi = $model->getRandomString();
        });
    }

    public function generateRandomString($lenght = 6)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i=0; $i < $lenght; $i++){
            $randomString .= $characters[rand(0, $charactersLength - 1)]; 
        }
        return $randomString."".date("YmdHis");
    }
    public function getRandomString()
    {
        $str = $this->generateRandomString();
        return $str;
    }

    //satu transaksi memiliki banyak transaksi item
    public function items()
    {
        return $this->hasMany(TransaksiItem::class, 'id_transaksi');
    }
}
