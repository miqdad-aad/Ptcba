@extends('admin.layout_admin')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Detail Pesanan {{ $data->kode_pesanan }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pesanan</a></li>
                        <li class="breadcrumb-item active">Detail Pesanan</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="{{ route('pesanan.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_pesanan" value="{{ $data->id_pesanan }}" />
        <div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <div id="progrss-wizard" class="twitter-bs-wizard">
                                        <ul class="twitter-bs-wizard-nav nav nav-pills nav-justified">
                                            <li class="nav-item">
                                                <a href="#progress-seller-details"
                                                    class="nav-link <?=$data->status_pengiriman >= 1 && $data->status_pengiriman < 5 ? 'active' : ''  ?>"
                                                    data-toggle="tab">
                                                    <div class="step-icon" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Seller Details">
                                                        <i class="bx bx-hourglass bx-spin"></i>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#progress-company-document"
                                                    class="nav-link  <?= $data->status_pembayaran == 1 ? 'active' : ''  ?>"
                                                    data-toggle="tab">
                                                    <div class="step-icon" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Company Document">
                                                        <i class="bx bxs-dollar-circle bx-spin"></i>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="#progress-bank-detail"
                                                    class="nav-link  <?=$data->status_pengiriman > 2 && $data->status_pengiriman <= 5 ? 'active' : ''  ?>"
                                                    data-toggle="tab">
                                                    <div class="step-icon" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Bank Details">
                                                        <i class="bx bxs-truck bx-spin"></i>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#progress-bank-detail"
                                                    class="nav-link  <?=$data->status_pengiriman == 5 ? 'active' : ''  ?>"
                                                    data-toggle="tab">
                                                    <div class="step-icon" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Bank Details">
                                                        <i class="bx bx-badge-check bx-spin"></i>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- wizard-nav -->

                                        <div id="bar" class="progress mt-4">
                                            <?php
                                                 $size = 0;
                                                if($data->status_pengiriman == 1){
                                                    $size = '30';
                                                }
                                                if($data->status_pembayaran == 1){
                                                    $size = '50';
                                                }
                                                if($data->status_pengiriman == 2 || $data->status_pengiriman == 4){
                                                    $size = '70';
                                                }
                                                if($data->status_pengiriman == 5){
                                                    $size = '100';
                                                }

                                                ?>
                                            <div style="width: {{ $size }}%;"
                                                class="progress-bar bg-success progress-bar-striped progress-bar-animated">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <p>Status : {{ $data->nama_status }}</p>
                                <p>Jenis Transportasi : {{ $data->jenis_transportasi }}</p>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            Pengambilan
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-striped" id="table-barang" width="100%">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th style="vertical-align: middle !important;" scope="col">
                                                            Tempat : {{ $data->tempat_pengambilan }}</th>
                                                        <th style="vertical-align: middle !important;" scope="col">
                                                            Kabupaten : {{ $data->nama_kabupaten_pengambilan }}</th>
                                                        <th style="vertical-align: middle !important;" scope="col">
                                                            Kecamatan : {{ $data->nama_kecamatan_pengambilan }} </th>
                                                        <th style="vertical-align: middle !important;" scope="col">
                                                            Alamat : {{ $data->alamat_pengambilan }}</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            Penerima
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-striped" id="table-barang" width="100%">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th style="vertical-align: middle !important;" scope="col">Nama
                                                            Penerima : {{ $data->nama_penerima }}</th>
                                                        <th style="vertical-align: middle !important;" scope="col">Nomor
                                                            Penerima : {{ $data->nomor_penerima }}</th>
                                                        <th style="vertical-align: middle !important;" scope="col">
                                                            Kabupaten : {{ $data->nama_kabupaten_penerima }}</th>
                                                        <th style="vertical-align: middle !important;" scope="col">
                                                            Kecamatan : {{ $data->nama_kecamatan_penerima }} </th>
                                                        <th style="vertical-align: middle !important;" scope="col">
                                                            Alamat : {{ $data->alamat_penerima }}</th>
                                                    </tr>
                                                </thead>
                                            </table>
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
                                                        <th style="vertical-align: middle !important;" scope="col">No
                                                        </th>
                                                        <th style="vertical-align: middle !important; width:50%;"
                                                            scope="col">Nama Barang</th>
                                                        <th style="vertical-align: middle !important;" scope="col">Panjang
                                                            Barang</th>
                                                        <th style="vertical-align: middle !important;" scope="col">Lebar
                                                            Barang</th>
                                                        <th style="vertical-align: middle !important;" scope="col">Tinggi
                                                            Barang</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($detail as $index => $k )
                                                    <tr>
                                                        <td scope="row" class="text-center">{{ $index+1 }}</td>
                                                        <td class="text-center">{{ $k->nama_barang }}</td>
                                                        <td class="text-right">{{ $k->panjang }} CM
                                                        </td>
                                                        <td class="text-right">{{ $k->lebar }} CM
                                                        </td>
                                                        <td class="text-right">{{ $k->tinggi }} CM
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-sm-12 mb-3">
                                    <a href="{{ route('pesanan.index') }}" class="btn btn-danger"><i
                                            class="bx bx-arrow-back"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>

        </div> <!-- end row -->
    </form>
</div> <!-- container-fluid -->
@endsection
@section('page-js')
@endsection
