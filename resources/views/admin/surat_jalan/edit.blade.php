@extends('admin.layout_admin')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Surat Jalan</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Surat Jalan</a></li>
                        <li class="breadcrumb-item active">Edit Surat Jalan</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="{{ route('surat_jalan.update') }}" id="form-sj" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $data->id_surat_jalan }}" name="id_surat_jalan" />
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Muat</label>
                                    <div class="input-group input-group-sm mb-3">
                                        <input name="tgl_muat" type="text" class="form-control tanggal-sj text-right"
                                            value="<?= date('d-m-Y', strtotime($data->tgl_muat)) ?>" aria-label="Small"
                                            aria-describedby="inputGroup-sizing-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i
                                                    class="bx bx-calendar-event"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="exampleFormControlSelect2">Driver</label>
                                <br>
                                <select name="id_driver" class="form-control driver">
                                    <option value="{{ $data->id_driver }}">{{ $data->nama_driver }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleInputEmail1">Pesanan</label>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm tabel-detail" width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="vertical-align: middle !important;" scope="col">No</th>
                                            <th style="vertical-align: middle !important; " scope="col">Kode Pesanan
                                            </th>
                                            <th style="vertical-align: middle !important; width:50%;" scope="col">Tujuan
                                            </th>
                                            <th style="vertical-align: middle !important; ">Berat Pesanan</th>
                                            <th style="vertical-align: middle !important; ">Total Pesanan</th>
                                            <th style="vertical-align: middle !important;" scope="col"><button
                                                    class="btn btn-xs btn-success" data-bs-toggle="modal"
                                                    data-bs-target=".bs-example-modal-xl" type="button"><i
                                                        class="bx bx-list-plus "></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detail as $key => $g)
                                    <tr data-index="{{ $g->id_pesanan }}" >
                                        <td class="text-center"></td>
                                        <td>{{ $g->kode_pesanan }}</td>
                                        <td>
                                            Nama Penerima : {{ $g->nama_penerima }} <br>
                                            Tempat Pengambilan : {{ $g->tempat_pengambilan }}
                                            Kabupaten : {{ $g->nama_kabupaten_pengambilan }} <i class="bx bx-send"></i> {{ $g->nama_kabupaten_penerima }} <br> 
                                            Kecamatan : {{ $g->nama_kecamatan_pengambilan }} <i class="bx bx-send"></i> {{ $g->nama_kecamatan_penerima }} <br> 
                                            Alamat : {{ $g->alamat_pengambilan }}  <i class="bx bx-send"></i>  {{ $g->alamat_penerima }} <br>
                                            <input type="hidden" value="{{ $g->id_pesanan }}" name="detail[{{ $key }}][id_pesanan]" />
                                            <input type="hidden" class="id_detail_surat_jalan" value="{{ $g->id_detail_surat_jalan }}"/>
                                        </td> 
                                        <td class="text-right">{{ $g->berat_pesanan }} Kg</td>
                                        <td class="text-right">{{ $g->total_pesanan }} Barang</td>
                                        <td class="text-center"><button data-id="{{ $g->id_pesanan }}" class="btn btn-xs btn-danger btn-hapus" type="button"><i class="bx bx-trash-alt"></i></button></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                        <a href="{{ route('surat_jalan.index') }}" class="btn btn-danger"><i
                                            class="bx bx-arrow-back"></i> Kembali</a>
                            <button class="btn btn-success" type="submit"><i class="bx bxl-telegram"></i> Simpan
                                Data</button>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

        </div> <!-- end row -->
    </form>
</div> <!-- container-fluid -->
<div class="modal fade bs-example-modal-xl" tabindex="-1" id="modal-transaksi" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 data-pesanan">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Pesanan</th>
                                        <th class="text-center">Tujuan</th>
                                        <th class="text-center">Tempat Pengambilan</th>
                                        <th class="text-center">Nama Penerima</th>
                                        <th class="text-center">Berat Pesanan</th>
                                        <th class="text-center">Total Pesanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
@section('page-js')
<script>
    $(document).ready(function () {
        flatpickr($('.tanggal-sj'), {
            dateFormat: "d-m-Y",
        });

        $(".driver").select2({
            placeholder: "PIlih Driver",
            allowClear: true,
            ajax: {
                dataType: "json",
                method: "POST",
                url: "{{ route('driver') }}",
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

        var table = $('.data-pesanan').DataTable({
            processing: true,
            serverSide: true,
            select: true,
            ajax: {
                url : "{{ route('pesanan.index') }}",
                data : {
                    id_status : 0
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'kode_pesanan',
                    name: 'name'
                },
                {
                    data: 'tempat_pengambilan',
                    name: 'email',
                    render: function (meta, data, row) {
                        return `Kabupaten : ${row.nama_kabupaten_pengambilan} <i class="bx bx-send"></i> ${row.nama_kabupaten_penerima} <br> Kecamatan : ${row.nama_kecamatan_pengambilan} <i class="bx bx-send"></i> ${row.nama_kecamatan_penerima} <br> Alamat : ${row.alamat_pengambilan}  <i class="bx bx-send"></i>  ${row.alamat_penerima}`;
                    }
                },
                {
                    data: 'tempat_pengambilan',
                    name: 'email'
                },
                {
                    data: 'nama_penerima',
                    name: 'email'
                },
                {
                    data: 'berat_pesanan',
                    name: 'email',
                    render: function (meta, data, row) {
                        return `${row.berat_pesanan} KG`;
                    }
                },
                {
                    data: 'total_pesanan',
                    name: 'email',
                    render: function (meta, data, row) {
                        return `${row.total_pesanan} Barang`;
                    }
                },
            ]
        });

        let is_ready = [];
        $('.data-pesanan tbody').on('click', 'tr', function () {
            var row = table.row($(this).closest('tr')).data();
            let i = $('.tabel-detail').find('tbody').find('tr').length || 0;
            i++;
            var template = `<tr data-index="${row.id_pesanan}" >
            <td class="text-center"></td>
                                <td>${row.kode_pesanan}</td>
                                <td>
                                    Nama Penerima : ${row.nama_penerima} <br>
                                    Tempat Pengambilan : ${row.tempat_pengambilan}
                                    Kabupaten : ${row.nama_kabupaten_pengambilan} <i class="bx bx-send"></i> ${row.nama_kabupaten_penerima} <br> 
                                    Kecamatan : ${row.nama_kecamatan_pengambilan} <i class="bx bx-send"></i> ${row.nama_kecamatan_penerima} <br> 
                                    Alamat : ${row.alamat_pengambilan}  <i class="bx bx-send"></i>  ${row.alamat_penerima} <br>
                                    <input type="hidden" value="${row.id_pesanan}" name="detail[${i}][id_pesanan]" />
                                </td> 
                                <td class="text-right">${row.berat_pesanan} Kg</td>
                                <td class="text-right">${row.total_pesanan} Barang</td>
                                <td class="text-center"><button data-id="${row.id_pesanan}" class="btn btn-xs btn-danger btn-hapus" type="button"><i class="bx bx-trash-alt"></i></button></td>
                            </tr>`
            if (is_ready.includes(row.id_pesanan) == false) {
                $('.tabel-detail').append(template);
                is_ready.push(row.id_pesanan);
            }
            $('#modal-transaksi').modal('hide');
            numberTable();
        });

        numberTable();
        $(document).on('click', '.btn-hapus', function () {
            let id_pesanan = $(this).attr('data-id');
            if(($(this).closest('tr').find('.id_detail_surat_jalan') || 0) != 0 ){
                $('#form-sj').append(`<input type="hidden" name="remove[]" value="${id_pesanan}" />`)
            }
            $(this).closest('tr').remove();

            is_ready = [];
            $('.tabel-detail').find('tbody').find('tr').each(function () {
                is_ready.push($(this).data('index'))
            })
            numberTable();

        })
    })

    function numberTable() {
        let i = 1;
        $('.tabel-detail').find('tbody').find('tr').each(function () {
            $(this).find('td').eq(0).text(i);
            i++
        })
    }

</script>
@endsection
