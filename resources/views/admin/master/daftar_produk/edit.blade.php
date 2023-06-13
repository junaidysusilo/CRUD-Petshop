@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.master.daftar_produk.update', $produk->id_produk) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama"
                    class="form-control {{ $errors->has('nama')?'is-invalid':''}}" placeholder="Nama" 
                    value="{{ old ('nama', $produk->nama) }}">
                    @if ($errors->has('nama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" id="harga" 
                    class="form-control{{ $errors->has('harga')?'is-invalid':''}}" placeholder="Harga" 
                    value="{{ old ('harga', $produk->harga) }}">
                    @if ($errors->has('harga'))
                    <div class="invalid-feedback">
                        {{ $errors->first('harga') }}
                    </div>
                    @endif
                </div>
                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
