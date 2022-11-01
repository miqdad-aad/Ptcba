@extends('admin.layout_admin')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tabel Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="{{ route('pesanan.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        Pengambilan
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Nama Tempat</label>
                            <input type="text" name="tempat_pengambilan" class="form-control"
                                placeholder="Contoh : Pelabuhan Perak">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlSelect1">Kabupaten</label>
                            <select name="kabupaten_pengambilan" class="form-control kabupaten kabupaten_pengambilan element-tarif">

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlSelect2">Kecamatan</label>
                            <select name="kecamatan_pengambilan" class="form-control kecamatan">

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Jenis Transportasi</label>
                            <select name="jenis_transportasi" class="form-select jenis-trans element-tarif">
                                <option value="udara">Udara</option>
                                <option value="laut">Laut</option>
                                <option value="darat">Darat</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat_pengambilan" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-6 mb-3">
                <div class="card">
                    <div class="card-header">
                        Penerima
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Nama Penerima</label>
                            <input type="text" name="nama_penerima" class="form-control"
                                placeholder="Contoh : Adik Budi">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Nomor Wa</label>
                            <input type="text" name="nomor_penerima" class="form-control"
                                placeholder="Masukan nomor yang dapat dihubungi">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlSelect1">Kabupaten</label>
                            <select name="kabupaten_penerima" class="form-control kabupaten kabupaten_penerima element-tarif">

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlSelect2">Kecamatan</label>
                            <select name="kecamatan_penerima" class="form-control kecamatan">

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat_penerima" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        Detail Barang
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table-barang" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th style="vertical-align: middle !important;" scope="col">No</th>
                                    <th style="vertical-align: middle !important;  scope=" col">Nama Barang
                                    </th>
                                    <th style="vertical-align: middle !important;" scope="col">Ukuran Barang</th>
                                    <th style="vertical-align: middle !important;" scope="col"><button
                                            class="btn btn-xs btn-success btn-add" type="button"><i
                                                class="bx bx-list-plus "></i></button></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">Total</th>
                                    <th class="text-right"><input name="total_pesanan" readonly style=" background: transparent; border: none; " data-inputmask="'alias': 'currency', 'prefix': '','digits': '2' " type="text" value="0" class="total-berat input-mask form-control text-right" aria-label="Small" aria-describedby="inputGroup-sizing-sm"/></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-sm-12 mb-3">
                <a href="{{ route('pesanan.index') }}" class="btn btn-danger"><i class="bx bx-arrow-back"></i>
                    Kembali</a>
                <button class="btn btn-success" type="submit"><i class="bx bxl-telegram"></i> Simpan Data</button>
            </div>
        </div> <!-- end row -->
    </form>
</div> <!-- container-fluid -->
@endsection
@section('page-js')
<script>
    let kode_penerima = 0;
    $(document).ready(function () {
        $(".kabupaten").select2({
            placeholder: "PIlih Kabupaten",
            allowClear: true,
            ajax: {
                dataType: "json",
                method: "POST",
                url: "{{ route('kabupaten') }}",
                delay: 300,
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            item.id = item.id;
                            item.text = item.name;
                            return item;
                        }),
                    };
                },
            },
            escapeMarkup: function (m) {
                return m;
            },
        }).on("select2:select", function (e) {
            var data = e.params.data;
            if($(this).attr('name') == 'kabupaten_penerima'){
                kode_penerima = data.province_code;
            }
            console.log($(this).attr('name'));
        });
        $(".kecamatan").select2({
            placeholder: "PIlih Kecamatan",
            allowClear: true,
            ajax: {
                dataType: "json",
                method: "POST",
                url: "{{ route('kecamatan') }}",
                delay: 300,
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            item.id = item.id;
                            item.text = item.name;
                            return item;
                        }),
                    };
                },
            },
            escapeMarkup: function (m) {
                return m;
            },
        }).on("select2:select", function (e) {});
        $(document).on('click', '.btn-add', function () {
            let table = $('#table-barang');
            let index = table.find('tbody').find('tr').length || 0;
            index++
            let template = '';
            template += ` <tr>
                            <td scope="row" class="text-center"></td>
                            <td><input type="text" class="form-control" name="detail_barang[${index}][nama_barang]" /></td>
                            <td>
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"> P (CM)</span>
                                    </div>
                                    <input  data-inputmask="'alias': 'currency', 'prefix': '','digits': '2' " type="text" value="0" name="detail_barang[${index}][panjang]" class="berat panjang input-mask form-control text-right" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"> L (CM)</span>
                                    </div>
                                    <input  data-inputmask="'alias': 'currency', 'prefix': '','digits': '2' " type="text" value="0" name="detail_barang[${index}][lebar]" class="lebar input-mask form-control text-right" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"> T (CM)</span>
                                    </div>
                                    <input  data-inputmask="'alias': 'currency', 'prefix': '','digits': '2' " type="text" value="0" name="detail_barang[${index}][tinggi]" class="berat tinggi input-mask form-control text-right" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"> Total Berat</span>
                                    </div>
                                    <input readonly data-inputmask="'alias': 'currency', 'prefix': '','digits': '2' " type="text" value="0" name="detail_barang[${index}][total]" class="total input-mask form-control text-right" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                            </td>
                            <td class="text-center"><button class="btn btn-xs btn-danger btn-hapus" type="button"><i class="bx bx-trash-alt"></i></button></td>
                        </tr>`;
            table.find('tbody').append(template);
            $(".input-mask").inputmask({
                removeMaskOnSubmit: true,
                autoUnmask: true,
                unmaskAsNumber: true
            });
            numberTable(); 

        })
        $(document).on('click', '.btn-hapus', function () {
            $(this).closest('tr').remove()
            numberTable();
            perhitungan();
        });
        $(document).on('change', '.berat', function () {
            perhitungan();
        });
        $(document).on('change', '.element-tarif', function () {
            perhitungan();
        });


    })

    function numberTable() {
        let i = 1;
        $('#table-barang').find('tbody').find('tr').each(function () {
            $(this).find('td').eq(0).text(i);
            i++
        })
    }

    function perhitungan() {
        var trans = $('.jenis-trans').val();
        console.log(trans);
        let ongkos = 4000;
        if(trans == "udara"){
            ongkos = 6000;
        }

        let berat_barang = 0;
        $('#table-barang').find('tbody').find('tr').each(function(){
            let panjang = parseFloat($(this).find('.panjang').inputmask('unmaskedvalue') || 0);
            let lebar = parseFloat($(this).find('.lebar').inputmask('unmaskedvalue') || 0);
            let tinggi = parseFloat($(this).find('.tinggi').inputmask('unmaskedvalue') || 0);

            let berat = (panjang * lebar * tinggi) / parseFloat(ongkos);

            $(this).find('.total').val(berat);
            
            berat_barang += berat;
        })
        let kab_ambil = $(".kabupaten_pengambilan").val();
        let kab_penerima = $(".kabupaten_penerima").val();
        let tarif = 0;
       
        if(kab_ambil == kab_penerima || kode_penerima == 32 || kode_penerima == 33 || kode_penerima == 35 || kode_penerima == 51 || kode_penerima == 52 ){
            tarif = 4000;
        }else{
            tarif = 17000;
        }

        console.warn({kab_ambil,kab_penerima, kode_penerima});
        console.log(tarif);
        let total = berat_barang * tarif;

        $('.total-berat').val(total)

    }

</script>
@endsection
