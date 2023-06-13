@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dashboard</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-3 card mr-3 bg-primary text-white">
                <h3>Jumlah Produk</h3>
                <h1>{{ $jumlahProduk }}</h1>
            </div>
            <div class="col-3 card bg-success text-white">
                <h3>Jumlah Transaksi</h3>
                <h1>{{ $jumlahTransaksi }}</h1>
            </div>
        </div>
        </div>


    </div>
@endsection
