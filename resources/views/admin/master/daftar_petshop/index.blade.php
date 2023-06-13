@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.master.petshop.update') }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama_petshop">Nama Petshop</label>
                <input type="text" name="nama_petshop" id="nama_petshop"
                class="form-control {{ $errors->has('nama_petshop') ? 'is-invalid' : '' }}" placeholder="Nama Petshop"
                value="{{ old ('nama_petshop', $petshop->nama_petshop) }}">
            @if ($errors->has('nama_petshop'))
                <div class="invalid-feedback">
                    {{ $errors->first('nama_petshop') }}
                </div>
            @endif
            </div>
            <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik</label>
                <input type="text" name="nama_pemilik" id="nama_pemilik"
                class="form-control {{ $errors->has('nama_pemilik') ? 'is-invalid' : '' }}" placeholder="Nama Pemilik"
                value="{{ old ('nama_pemilik', $petshop->nama_pemilik) }}">
            @if ($errors->has('nama_pemilik'))
                <div class="invalid-feedback">
                    {{ $errors->first('nama_pemilik') }}
                </div>
            @endif
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat"
                class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" placeholder="Alamat" cols="30" rows="10"
                >{{ old ('alamat', $petshop->alamat) }}</textarea>
            @if ($errors->has('alamat'))
                <div class="invalid-feedback">
                    {{ $errors->first('alamat') }}
                </div>
            @endif
            </div>
            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input type="text" name="no_hp" id="no_hp"
                class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" placeholder="No HP"
                value="{{ old ('no_hp', $petshop->no_hp) }}">
            @if ($errors->has('no_hp'))
                <div class="invalid-feedback">
                    {{ $errors->first('no_hp') }}
                </div>
            @endif
            </div>
            <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection
