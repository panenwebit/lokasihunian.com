@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <h3 class="text-center">Simulasi KPR</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input type="number" min="1" step="1" name="harga_property" id="harga_property" class="form-control" placeholder="Harga Properti" autofocus>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="number" min="1" step="1" name="um_property" id="um_property" class="form-control" placeholder="Uang Muka / DP" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="number" min="1" step="1" name="jumlah_pinjaman" id="jumlah_pinjaman" class="form-control" placeholder="Jumlah Pinjaman" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="lama_pinjaman">Lama pinjaman (Tahun)</label>
                <select name="lama_pinjaman" id="lama_pinjaman" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
            </div>

            <div class="form-group">
                <label for="suku_bunga">Suku Bunga Tahunan (%)</label>
                <select name="suku_bunga" id="suku_bunga" class="form-control">
                    <option value="6.00">6.00</option>
                    <option value="6.68">6.68</option>
                    <option value="7.70">7.70</option>
                    <option value="7.75">7.75</option>
                    <option value="8.00">8.00</option>
                    <option value="9.25">9.25</option>
                    <option value="9.75">9.75</option>
                    <option value="9.99">9.99</option>
                    <option value="10.29">10.29</option>
                    <option value="10.99">10.99</option>
                    <option value="11.29">11.29</option>
                </select>
            </div>
        </div>

        <div class="col-md-8">
            <div class="d-flex">Angsuran per bulan</div>
            <div class="d-flex">
                <h2 id="angsuran">Rp. 0</h2>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_js_plugins')
<script>
$(document).ready(function(){
    var field_harga = $('#harga_property');
    var field_pinjaman = $('#jumlah_pinjaman');
    var field_dp = $('#um_property');
    var field_waktu = $('#lama_pinjaman');
    var field_bunga = $('#suku_bunga');
    var field_angsuran = $('#angsuran');

    field_harga.on('input', function(){
        var harga = parseFloat($('#harga_property').val());
        var waktu = parseFloat($('#lama_pinjaman').val())*12;
        var bunga = parseFloat($('#suku_bunga').val());
        dp = ((20/100)*harga);
        pinjaman = (harga - dp);

        cicilan_pokok = pinjaman / waktu;
        bunga_per_bulan = (bunga / waktu) * cicilan_pokok;
        angsuran = Number(cicilan_pokok) + Number(bunga_per_bulan);

        field_dp.val(dp);
        field_pinjaman.val(pinjaman);
        field_angsuran.text('Rp. '+angsuran);
    });
});
</script>
@endsection