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
                        <li class="breadcrumb-item active">Tambah Driver</li>
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
                    <h4 class="card-title">Setting Halaman About Us</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('about_us.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8 mb-3">
                                <div>
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Judul</label>
                                        <input class="form-control" type="text" name="judul"
                                            placeholder="judul" id="example-text-input">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-password-input" name="isi" class="form-label">isi</label>
                                        <textarea class="tkarea"></textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-4 mb-3">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-date-input" class="form-label">Foto</label>
                                        <input class="form-control" name="foto" type="file" id="input-id">
                                    </div>
                                </div>
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
    $(document).ready(function () {
        flatpickr($('.dtpicker'), {
            dateFormat: "d-m-Y",
        });
        $("#input-id").fileinput({
            'showUpload': false,
            'previewFileType': 'any'
        });

        $('.tkarea').summernote({
            placeholder: 'Masukan isi about is',
            height: 200
        });

    })

</script>
@endsection
