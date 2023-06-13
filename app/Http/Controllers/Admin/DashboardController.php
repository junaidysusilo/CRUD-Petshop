<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarProduk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahProduk = DaftarProduk::all()->count();
        $jumlahTransaksi = Transaksi::all()->count();
        return view('admin.dashboard', ['page_title' => 'Welcome back, ' . Auth::user()->name, "jumlahProduk" => $jumlahProduk, "jumlahTransaksi" => $jumlahTransaksi]);
    }
}
