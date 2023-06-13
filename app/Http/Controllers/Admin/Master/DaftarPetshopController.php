<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePetshopRequest;
use App\Models\DaftarPetshop;

class DaftarPetshopController extends Controller
{
    public function index()
    {
        $petshop = DaftarPetshop::first();
        return view('admin.master.daftar_petshop.index', ['petshop' => $petshop, 'page_title' => 'Profil Petshop']);
    }
    public function update(UpdatePetshopRequest $request)
    {
        $petshop = DaftarPetshop::first();
        $petshop->fill($request->all());
        $petshop->update();
        return redirect()->back();
    }
}
