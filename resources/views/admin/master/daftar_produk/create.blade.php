@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.master.daftar_produk.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control {{ $errors->has('nama')?'is-invalid':''}}" placeholder="Nama">
                    @if ($errors->has('nama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control{{ $errors->has('harga')?'is-invalid':''}}" placeholder="Harga">
                    @if ($errors->has('harga'))
                    <div class="invalid-feedback">
                        {{ $errors->first('harga') }}
                    </div>
                    @endif
                </div>

                <button class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
@endsection
