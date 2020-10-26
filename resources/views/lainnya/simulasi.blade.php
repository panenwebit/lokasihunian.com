@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <h3 class="text-center">Simulasi KPR</h3>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="harga_property">Harga Properti</label>
                <input type="number" min="1" step="1" name="harga_property" id="harga_property" class="form-control" placeholder="Harga Properti" value="<?php if(isset($_GET['harga'])){ echo $_GET['harga']; }else{  echo '880000000'; };?>" autofocus>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="um_property">Uang Muka / DP</label>
                <input type="text" name="um_property" id="um_property" class="form-control" placeholder="Uang Muka / DP" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                <input type="text" name="jumlah_pinjaman" id="jumlah_pinjaman" class="form-control" placeholder="Jumlah Pinjaman" readonly>
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
                    <option value="15" selected>15</option>
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
                    <option value="7.70" selected>7.70</option>
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
                <h2 id="angsuran" class="display-4 mt-2">Rp. 0</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>
                * Simulasi diatas hanya melakukan perhitungan dengan suku bunga flat. <br>
                * Hasil perhitungan belum termasuk biaya layanan dan dapat berbeda dengan masing-masing Bank penyedia KPR.
            </p>
        </div>
    </div>
</div>
@endsection

@section('page_js_plugins')
<script>
$(document).ready(function(){
    var field_harga = $('#harga_property');
    var field_dp = $('#um_property');
    var field_pinjaman = $('#jumlah_pinjaman');

    var field_waktu = $('#lama_pinjaman');
    var field_bunga = $('#suku_bunga');

    var field_angsuran = $('#angsuran');

    function hitungKPR(){
        var harga = parseFloat($('#harga_property').val());
        var waktu = parseFloat($('#lama_pinjaman').val())*12;
        var bunga = parseFloat($('#suku_bunga').val());
        dp = Number((20/100)*harga);
        pinjaman = Number(harga - dp);

        cicilan_pokok = pinjaman / waktu;
        bunga_per_bulan = (pinjaman*(bunga/100))/waktu;
        angsuran2 = Number(cicilan_pokok) + Number(bunga_per_bulan);
        angsuran = angsuran2.toFixed(0);
        // alert(bunga_per_bulan);

        rp_angsuran = new Intl.NumberFormat('id-ID', {style: 'currency', currency: 'IDR'}).format(angsuran);
        rp_dp = new Intl.NumberFormat('id-ID', {style: 'currency', currency: 'IDR'}).format(dp);
        rp_pinjaman = new Intl.NumberFormat('id-ID', {style: 'currency', currency: 'IDR'}).format(pinjaman);

        field_dp.val(rp_dp);
        field_pinjaman.val(rp_pinjaman);
        field_angsuran.text(rp_angsuran);
    }

    field_harga.on('input', function(){
        hitungKPR();
    });

    field_waktu.on('change', function(){
        hitungKPR();
    });

    field_bunga.on('change', function(){
        hitungKPR();
    });

    hitungKPR();
});
</script>
@endsection