<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minia/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Jul 2022 12:43:56 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Register | Hallo Tracking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset ('assetsuser/images/logocba.png') }}">

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('assetsadmin/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assetsadmin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assetsadmin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assetsadmin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- <body data-layout="horizontal"> -->
    <div class="auth-page">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xxl-3 col-lg-4 col-md-5">
                    <div class="auth-full-page-content d-flex p-sm-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5 text-center">
                                    <a href="index.html" class="d-block auth-logo">
                                    <img src="{{ asset ('assetsuser/images/logocba.png') }}" style=" width: 45px; height: 45px; " alt="" height="28">
                                        <span class="logo-txt">Hallo Tracking</span>
                                    </a>
                                </div>
                                <div class="auth-content my-auto">
                                    <div class="text-center">
                                        <h5 class="mb-0">Register Account</h5>
                                        <p class="text-muted mt-2">Register To Hallo Tracking</p>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="name" class="form-control" id="username"
                                                placeholder="Nama Lengkap" required>
                                            <div class="invalid-feedback">
                                                Nama Lengkap
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="useremail"
                                                placeholder="Enter email" required>
                                            <div class="invalid-feedback">
                                                Please Enter Email
                                            </div>
                                        </div>

                                        

                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="userpassword" placeholder="Enter password" required>
                                            <div class="invalid-feedback">
                                                Please Enter Password
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Confirmation Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="userpassword" placeholder="Enter password" required>
                                            <div class="invalid-feedback">
                                                Please Enter Password
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <p class="mb-0">Register Ke Hallo Tracking</p>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light"
                                                type="submit">Register</button>
                                        </div>
                                    </form>
                                    <div class="mt-5 text-center">
                                        <p class="text-muted mb-0"> Jika Sudah Punya Akun Silahkan ! <a
                                                href="{{url('/login')}}" class="text-primary fw-semibold"> Login
                                            </a> </p>
                                    </div>


                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>
                                                document.write(new Date().getFullYear())

                                            </script> Hallo Tracking . Crafted with <i
                                                class="mdi mdi-heart text-danger"></i> by
                                            PT. Cahaya Bagus Anugrah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end auth full page content -->
                </div>
                <!-- end col -->
                <div class="col-xxl-9 col-lg-8 col-md-7">
                    <div class="auth-bg pt-md-5 p-4 d-flex">
                        <div class="bg-overlay bg-primary"></div>
                        <ul class="bg-bubbles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <!-- end bubble effect -->
                        <div class="row justify-content-center align-items-center">
                            <div class="col-xl-7">
                                <div class="p-0 p-sm-4 px-xl-0">
                                    <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div
                                            class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                                            <button type="button" data-bs-target="#reviewcarouselIndicators"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#reviewcarouselIndicators"
                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#reviewcarouselIndicators"
                                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <!-- end carouselIndicators -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="testi-contain text-white">
                                                    <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                    <h4 class="mt-4 fw-medium lh-base text-white">Untuk Memberi
                                                        Pengalaman Terbaik Kepada Pelanggan Secara Konsisten
                                                    </h4>
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>

                                            <div class="carousel-item">
                                                <div class="testi-contain text-white">
                                                    <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                    <h4 class="mt-4 fw-medium lh-base text-white">Menjadi Perusahaan
                                                        Logistik Terdepan di Negeri Sendiri yang Berdaya Saing Global
                                                    </h4>
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end carousel-inner -->
                                    </div>
                                    <!-- end review carousel -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container fluid -->
    </div>


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assetsadmin/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assetsadmin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetsadmin/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assetsadmin/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assetsadmin/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assetsadmin/libs/feather-icons/feather.min.js') }}"></script>
    <!-- pace js -->
    <script src="{{ asset('assetsadmin/libs/pace-js/pace.min.js') }}"></script>
    <!-- password addon init -->
    <script src="{{ asset('assetsadmin/js/pages/pass-addon.init.js') }}"></script>

</body>


<!-- Mirrored from themesbrand.com/minia/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Jul 2022 12:43:56 GMT -->

</html>
