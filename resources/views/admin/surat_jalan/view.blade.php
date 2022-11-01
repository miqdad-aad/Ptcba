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
                            <h4>Datar Surat Jalan</h4>
                        </div>
                        <div class="col-sm-6 ag-right">
                            <a href="{{ route('surat_jalan.add') }}" class="btn btn-sm btn-success"><i
                                    class="bx bx-user-plus"></i> Tambah Baru</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 data-sj">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Kode Surat Jalan</th>
                                            <th class="text-center">Tanggal Muat</th>
                                            <th class="text-center">Nama Driver</th>
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
        var table = $('.data-sj').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('surat_jalan.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'kode_surat_jalan',
                    name: 'name'
                },
                {
                    data: 'tgl_muat',
                    name: 'email',
                    render : function(meta,data,row){
                        return moment(row.tgl_muat).format('DD-MM-YYYYY');
                    }
                },
                {
                    data: 'nama_driver',
                    name: 'name'
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
    })

</script>
@endsection
