@extends('admin.layout_admin')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Pelanggan</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pelanggan</a></li>
                        <li class="breadcrumb-item active">Pelanggan</li>
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
                            <h4>Data Pelanggan</h4>
                        </div>
                        <div class="col-sm-6 ag-right">
                            <a href="{{ route('pelanggan.add') }}" class="btn btn-sm btn-success"><i class="bx bx-user-plus"></i> Tambah Baru</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="data-driver" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Lengkap</th>
                                <th>Nomor Hp</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection
@section('page-js')
<script>
    $(document).ready(function () {
        var path = "{{ asset('') }}";
        var table = $('#data-driver').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pelanggan.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'tempat_pengambilan',
                    name: 'email',
                    className: 'text-center',
                    render : function(meta,data,row){
                        return `<img src="${path}foto-pelanggan/${row.foto}" class="img-circle" alt="Cinque Terre" width="100" height="100"> `
                     }
                },
                {
                    data: 'name',
                    className: 'text-center',
                    name: 'name'
                },
                {
                    data: 'nomor_hp',
                    className: 'text-center',
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
