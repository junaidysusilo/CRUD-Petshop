@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.master.daftar_produk.create') }}" class="btn btn-success btn-sm mb-2">Tambah Daftar Produk</a>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no_daftar = 1;
                        ?>
                        @foreach ($daftars as $daftar)
                            <tr>
                                <td>{{ $no_daftar }}</td>
                                <td>{{ $daftar->nama }}</td>
                                <td>{{ $daftar->harga }}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{ route('admin.master.daftar_produk.edit', ['daftar_produk' => $daftar->id_produk]) }}">Edit</a>
                                    <form action="{{ route('admin.master.daftar_produk.destroy', ['daftar_produk' => $daftar->id_produk]) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $no_daftar++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection

