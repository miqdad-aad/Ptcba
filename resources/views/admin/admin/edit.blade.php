@extends('admin.layout_admin')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Driver</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Driver</a></li>
                        <li class="breadcrumb-item active">Edit Driver</li>
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
                    <h4 class="card-title">Edit Driver</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('driver.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <input type="hidden" value="{{ $data->id }}" name="id_user" />
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div>
                                <div class="mb-3">
                                    <label for="example-text-input" class="form-label">Nama Lengkap</label>
                                    <input class="form-control" value="{{ $data->name }}" type="text" name="nama_lengkap" placeholder="Nama Lengkap"
                                        id="example-text-input">
                                </div>
                                <div class="mb-3">
                                    <label for="example-search-input" class="form-label">Alamat Email</label>
                                    <input class="form-control" value="{{ $data->email }}" type="email" name="alamat_email" placeholder="Alamat Email aktif"
                                        id="example-search-input">
                                </div>
                                <div class="mb-3">
                                    <label for="example-search-input" class="form-label">Nomor yang Bisa
                                        Dihubungi</label>
                                    <input class="form-control" value="{{ $data->nomor_hp }}" type="number" name="nomor_hp" placeholder="08..."
                                        id="example-search-input">
                                </div>
                                <div class="mb-3">
                                    <label for="example-email-input" class="form-label">Tanggal Masuk</label>
                                    <input class="form-control dtpicker" name="tanggal_masuk" type="text" value="<?= date('d-m-Y', strtotime($data->tanggal_masuk)) ?>"
                                        id="example-email-input">
                                </div>
                                <div class="mb-3">
                                    <label for="example-password-input" class="form-label">Alamat</label>
                                    <textarea class="form-control" cols="3">{{ $data->alamat }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="example-password-input" class="form-label">Password</label>
                                    <input class="form-control" name="password" type="password" id="example-password-input">
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <div class="mt-3 mt-lg-0">
                                <div class="mb-3">
                                    <label for="example-date-input" class="form-label">Foto</label>
                                    <input class="form-control" name="foto" type="file" id="input-id">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <a href="{{ route('pesanan.index') }}" class="btn btn-danger"><i
                                    class="bx bx-arrow-back"></i> Kembali</a>
                            <button class="btn btn-success" type="submit"><i class="bx bxl-telegram"></i> Simpan
                                Data</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
</div> <!-- container-fluid -->
@endsection
@section('page-js')
<script>
    let fotoPath =" {{ asset('foto-driver/' .$data->foto) }}";
    $(document).ready(function () {
        flatpickr($('.dtpicker'), {
            dateFormat: "d-m-Y",
        });
        $("#input-id").fileinput({
            'showUpload': false,
            'previewFileType': 'any',
            initialPreview: `<img src='${fotoPath}' class='file-preview-image' alt='Desert' title='Desert'>`
        });
    })

</script>
@endsection
