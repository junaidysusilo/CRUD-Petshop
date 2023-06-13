@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Items</th>
                            <th>Total Harga</th>
                            <th>Tanggal</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no_transaksi = 1;
                        ?>
                        @foreach ($transaksis as $transaksi)
                            <tr>
                                <td>{{ $no_transaksi }}</td>
                                <td>{{ $transaksi->kode_transaksi }}</td>
                                <td>
                                    <ol>
                                        @foreach ($transaksi->items as $item)
                                        <li>{{ $item->nama }}({{ $item->kuantitas }})</li>  
                                        @endforeach
                                    </ol>
                                </td>
                                <td>Rp. {{ number_format($transaksi->total_harga) }}</td>
                                <td>Rp. {{ $transaksi->created_at->toDayDateTimeString() }}</td>
                                <td>
                                    <form action="{{ route('admin.transaksi.destroy', $transaksi->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $no_transaksi++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection

