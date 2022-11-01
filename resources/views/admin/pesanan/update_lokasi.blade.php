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

    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Lokasi Pengiriman</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                        href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                        aria-selected="true">Update Lokasi</a>
                                    <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false">Riwayat Lokasi</a>
                                </div>
                            </div><!-- end col -->
                            <div class="col-md-9">
                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                        aria-labelledby="v-pills-home-tab">
                                        <form action="{{ route('updateLokasi.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_pesanan" value="<?= $data->id_pesanan ?>" />
                                            <div class="row">
                                                <div class="col-sm-12 mb-3">
                                                    <textarea class="lokasi" name="lokasi" id="ckedtor"></textarea>
                                                </div>
                                                <div class="col-sm-12 text-right">
                                                    <button class="btn btn-success" type="submit"><i
                                                            class="bx bxl-telegram"></i> Simpan Data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                        aria-labelledby="v-pills-profile-tab">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="timeline">
                                                    <div class="timeline-container">
                                                        <div class="timeline-end">
                                                            <p>Start</p>
                                                        </div>
                                                        <div class="timeline-continue">
                                                            @foreach ( $lokasi as $k => $val )
                                                            @if ($k % 2 == 0)
                                                            <div class="row timeline-right ">
                                                                <div class="col-md-6">
                                                                    <div class="timeline-icon">
                                                                        <i class="bx bxs-truck text-primary h2 mb-0"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="timeline-box">
                                                                        <div
                                                                            class="timeline-date bg-primary text-center rounded">
                                                                            <h3 class="text-white mb-0"><?= date('d', strtotime($val->created_at)) ?></h3>
                                                                            <p class="mb-0 text-white-50"><?= date('M', strtotime($val->created_at)) ?></p>
                                                                        </div>
                                                                        <div class="event-content">
                                                                            <div class="timeline-text">
                                                                                <h3 class="font-size-18">Lokasi pengiriman ke {{ $k+1 }}</h3>
                                                                                <p>Jam <?= date('H:i', strtotime($val->created_at)) ?></p>
                                                                                {!! $val->lokasi_pesanan !!}
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            @else
                                                            <div class="row timeline-left">
                                                                <div class="col-md-6 d-md-none d-block">
                                                                    <div class="timeline-icon">
                                                                        <i class="bx bxs-truck text-primary h2 mb-0"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="timeline-box">
                                                                        <div
                                                                            class="timeline-date bg-primary text-center rounded">
                                                                            <h3 class="text-white mb-0"><?= date('d', strtotime($val->created_at)) ?></h3>
                                                                            <p class="mb-0 text-white-50"><?= date('M', strtotime($val->created_at)) ?></p>
                                                                        </div>
                                                                        <div class="event-content">
                                                                            <div class="timeline-text">
                                                                                <h3 class="font-size-18">Lokasi pengiriman ke {{ $k+1 }}</h3>
                                                                                <p>Jam <?= date('H:i', strtotime($val->created_at)) ?></p>
                                                                               {!! $val->lokasi_pesanan !!}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 d-md-block d-none">
                                                                    <div class="timeline-icon">
                                                                        <i class="bx bxs-truck text-primary h2 mb-0"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif

                                                            @endforeach


                                                        </div>
                                                        <div class="timeline-start">
                                                            <p>End</p>
                                                        </div>
                                                        {{-- <div class="timeline-launch">
                                                            <div class="timeline-box">
                                                                <div class="timeline-text">
                                                                    <h3 class="font-size-18">Launched our company on 21
                                                                        June 2021</h3>
                                                                    <p class="text-muted mb-0">Pellentesque sapien ut
                                                                        est.</p>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--  end col -->
                        </div><!-- end row -->
                    </div><!-- end card-body -->
                </div><!-- end card -->
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>

    </div> <!-- end row -->
</div> <!-- container-fluid -->
@endsection
@section('page-js')
<script>
    $(document).ready(function () {
        $('.lokasi').summernote({
            placeholder: 'Masukan lokasi anda sekarang',
            height: 100
        });
    });

</script>
@endsection
