<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDaftarProdukRequest;
use App\Http\Requests\EditDaftarProdukRequest;
use App\Models\DaftarProduk;
use Illuminate\Http\Request;

class DaftarProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftars = DaftarProduk::all();
        return view('admin.master.daftar_produk.index', ['page_title' => 'Daftar Produk', 'daftars' => $daftars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.daftar_produk.create', ['page_title' => 'Tambah Daftar Produk']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDaftarProdukRequest $request)
    {
        $produk = new DaftarProduk();
        $produk->fill($request->all());
        $produk->save();
        return redirect()->route('admin.master.daftar_produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarProduk $daftarProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarProduk $daftarProduk)
    {
        return view('admin.master.daftar_produk.edit', ['page_title' => 'Edit Daftar Produk', 'produk' => $daftarProduk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditDaftarProdukRequest $request, DaftarProduk $daftarProduk)
    {
        $daftarProduk->fill($request->all());
        $daftarProduk->save();
        return redirect()->route('admin.master.daftar_produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarProduk $daftarProduk)
    {
        $daftarProduk->delete();
        return redirect()->route('admin.master.daftar_produk.index');
    }
}
