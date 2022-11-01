@extends('admin.layout_admin')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Pesanan</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pesanan</a></li>
                        <li class="breadcrumb-item active">Pesanan</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Datar Pesanan</h4>
                        </div>
                        <div class="col-sm-6 ag-right">
                            <a href="{{ route('pesanan.add') }}" class="btn btn-sm btn-success"><i
                                    class="bx bx-user-plus"></i> Tambah Baru</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="datatable"
                                    class="table table-bordered dt-responsive  nowrap w-100 data-pesanan">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Kode Pesanan</th>
                                            <th class="text-center">Tujuan</th>
                                            <th class="text-center">Tempat Pengambilan</th>
                                            <th class="text-center">Nama Penerima</th>
                                            <th class="text-center">Status Pesanan</th>
                                            <th class="text-center">Jenis Transportasi</th>
                                            <th class="text-center">Total Pesanan</th>
                                            <th class="text-center">Tanggal Buat Pesanan</th>
                                            <th class="text-center">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection
@section('page-js')
<script>
    $(document).ready(function () {
        var table = $('.data-pesanan').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pesanan.index') }}",
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
                        return `Kabupaten : ${row.nama_kabupaten_pengambilan} <i class="bx bx-send"></i> ${row.nama_kabupaten_penerima} <br> Kecamatan : ${row.nama_kecamatan_pengambilan} <i class="bx bx-send"></i> ${row.nama_kecamatan_penerima}`;
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
                    data: 'nama_status',
                    name: 'email',
                    className: 'text-center'
                },
                {
                    data: 'berat_pesanan',
                    name: 'email',
                    render: function (meta, data, row) {
                        return row.jenis_transportasi.toUpperCase();;
                    }
                },
                {
                    data: 'total_pesanan',
                    name: 'email',
                    render: function (meta, data, row) {
                        return `${row.total_barang} Barang`;
                    }
                },
                {
                    data: 'created_at',
                    name: 'email',
                    className: 'text-center',
                    render: function (meta, data, row) {
                        return moment(row.created_at).format('DD MMM YYYY hh:mm:ss')
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $(document).on('click', '.btn-bayar', function () {
            var data = table.row($(this).closest('tr')).data();
            snap.pay(data.token, {
                // Optional
                onSuccess: function (result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('bayar.sukses') }}",
                        data: {
                            kode_pesanan: data.kode_pesanan
                        },
                        success: function (data) {
                            table.ajax.reload(null, true)
                        }
                    });
                },
                // Optional
                onPending: function (result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onError: function (result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                }
            });
        })
    })

</script>
@endsection
