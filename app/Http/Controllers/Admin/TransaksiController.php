<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarProduk;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('admin.transaksi.index', ['page_title' => 'Transaksi', 'transaksis' => Transaksi::all()]);
    }
    public function create()
    {
        $daftars = DaftarProduk::all();
        return view('admin/transaksi/create', ['page_title' => 'Buat Transaksi', 'daftars' => $daftars]);
    }
    public function store(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi->fill([
            'user_id' => Auth::id(),
            'total_harga' => $request->get('total_harga')
        ]);
        $transaksi->save();
        $no_daftar = 0;
        foreach ($request->get('id_daftar') as $id_daftar) {
            $daftar = DaftarProduk::findOrFail($id_daftar);
            $transaksi_item = new TransaksiItem();
            $transaksi_item->fill([
                'id_transaksi' => $transaksi->id,
                'id_daftar' => $id_daftar,
                'nama' => $daftar->nama,
                'harga' => $daftar->harga,
                'kuantitas' => $request->get('kuantitas')[$no_daftar]
            ]);
            $transaksi_item->save();
            $no_daftar++;
        }
        return redirect()->route('admin.transaksi.index');
    }
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->back();
    }
}
