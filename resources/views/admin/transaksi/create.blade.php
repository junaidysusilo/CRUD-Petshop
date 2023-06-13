@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.transaksi.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="id_daftar">Daftar Produk</label>
                            <select class="form-control" id="id_daftar">
                                @foreach ($daftars as $daftar)
                                    <option value="{{ $daftar->id_produk }}" 
                                        data-nama="{{ $daftar->nama }}"
                                        data-harga="{{ $daftar->harga }}" 
                                        data-id="{{ $daftar->id_produk }}">
                                        {{ $daftar->nama }} Rp {{ number_format($daftar->harga) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="">&nbsp;</label>
                            <button type="button" class="btn btn-primary d-block" onclick="tambahItem()">Tambah Item</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive"></div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kuantitas</th>
                                <th>Harga</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody class="transaksiItem">

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Jumlah</th>
                                <th class="kuantitas">0</th>
                                <th class="totalHarga">0</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input name="total_harga" value="0" type="hidden">
                        <button class="btn btn-success">Simpan Transaksi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
<script>
    var totalHarga = 0;
    var kuantitas = 0;
    var listItem = [];

    function tambahItem() {
        updateTotalHarga(parseInt($('#id_daftar').find(':selected').data('harga')))
        var item = listItem.filter((el) => el.id_daftar === $('#id_daftar').find(':selected').data('id'))
        if (item.length > 0){
            item[0].kuantitas += 1
        }else{
            var item = {
                id_daftar: $('#id_daftar').find(':selected').data('id'),
                nama: $('#id_daftar').find(':selected').data('nama'),
                harga: $('#id_daftar').find(':selected').data('harga'),
                kuantitas:1,
        }
            listItem.push(item)
        }
        updateKuantitas(1)
        updateTable()
    }

    function updateTable(){
        var html = '';
        listItem.map((el, index) => {
            var harga = formatRupiah(el.harga.toString())
            var kuantitas = formatRupiah(el.kuantitas.toString())
            html += `
            <tr>
                <td>${index + 1}</td>
                <td>${el.nama}</td>
                <td>${kuantitas}</td>
                <td>${harga}</td>
                <td>
                    <input type="hidden" name="id_daftar[]" value="${el.id_daftar}">
                    <input type="hidden" name="kuantitas[]" value="${el.kuantitas}">
                    <button type="button" onclick="deleteItem(${index})" class="btn btn-sm btn-danger">Hapus
                    </button>
                </td>
            </tr>
            `
        })
        $('.transaksiItem').html(html)
    }

    function deleteItem(index){
        var item = listItem[index]
        if(item.kuantitas > 1){
            listItem[index].kuantitas -= 1;
            updateTotalHarga(-(item.harga))
            updateKuantitas(-1)
        }else{
            listItem.splice(index,1)
            updateTotalHarga(-(item.harga * item.kuantitas))
            updateKuantitas(-(item.kuantitas))
        }
        updateTable()
    }

    function updateTotalHarga(nom) {
        totalHarga += nom;
        $('[name=total_harga]').val(totalHarga)
        $('.totalHarga').html(formatRupiah(totalHarga.toString()))
    }
    function updateKuantitas(nom){
        kuantitas += nom;
        $('.kuantitas').html(formatRupiah(kuantitas.toString()))
    }
</script>
@endsection

