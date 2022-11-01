@extends('admin.layout_admin')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Detail Surat Jalan</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Surat Jalan</a></li>
                        <li class="breadcrumb-item active">Detail Surat Jalan</li>
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <p>No Surat jalan : {{ $data->kode_surat_jalan }}</p>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <p>Tanggal Muat : <?= date('d-m-Y', strtotime($data->tgl_muat)) ?></p>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <p>Nama Driver : {{ $data->nama_driver }}</p>
                                </div>
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
                                            <th style="vertical-align: middle !important;" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detail as $key => $g)
                                    <tr data-index="{{ $g->id_pesanan }}" >
                                        <td class="text-center">{{ $key+1 }}</td>
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
                                        <td class="text-right">{{ number_format($g->total_pesanan,2) }} Rp</td>
                                        <td class="text-center"><a href="{{ url('update/lokasi/'. $g->id_pesanan) }}" class="btn btn-sm btn-info">Update Lokasi</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                        <a href="{{ route('surat_jalan.index') }}" class="btn btn-danger"><i
                                            class="bx bx-arrow-back"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

        </div> <!-- end row -->
    </form>
</div>
@endsection
@section('page-js')
<script>
    $(document).ready(function(){
        $('.tabel-detail').DataTable({})
    })
</script>
@endsection
