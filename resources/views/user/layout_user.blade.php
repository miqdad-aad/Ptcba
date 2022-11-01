<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themezinho.net/shipper/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Jul 2022 13:06:53 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
    <title>Shipper Logistic - Transportation Template</title>
    <meta name="author" content="Themezinho">
    <meta name="description" content="Logistic and Transportation Template">
    <meta name="keywords" content="logistic, transportation, package, delivery, cargo, carousel, post, moving, caring">

    <!-- SOCIAL MEDIA META -->
    <meta property="og:description" content="Shipper Logistic - Transportation Template">
    <meta property="og:image" content="preview.html">
    <meta property="og:site_name" content="SHIPPER">
    <meta property="og:title" content="SHIPPER">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.themezinho.net/shipper">

    <!-- TWITTER META -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@SHIPPER">
    <meta name="twitter:creator" content="@SHIPPER">
    <meta name="twitter:title" content="SHIPPER">
    <meta name="twitter:description" content="Shipper Logistic - Transportation Template">
    <meta name="twitter:image" content="preview.html">

    <!-- FAVICON FILES -->
    <link href="{{ asset ('assetsuser/ico/apple-touch-icon-144-precomposed.png') }}" rel="apple-touch-icon-precomposed"
        sizes="144x144">
    <link href="{{ asset ('assetsuser/ico/apple-touch-icon-114-precomposed.png') }}" rel="apple-touch-icon-precomposed"
        sizes="114x114">
    <link href="{{ asset ('assetsuser/ico/apple-touch-icon-72-precomposed.png') }}" rel="apple-touch-icon-precomposed"
        sizes="72x72">
    <link href="{{ asset ('assetsuser/ico/apple-touch-icon-57-precomposed.png') }}" rel="apple-touch-icon-precomposed">
    <link href="{{ asset ('assetsuser/ico/favicon.png') }}" rel="shortcut icon">

    <!-- CSS FILES -->
    <link href="{{ asset ('assetsuser/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset ('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">


    <!-- DataTables -->
    <link href="{{ asset('assetsadmin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="soft-transition"></div>
    <!-- end soft-transition -->
    <div class="transition-overlay"></div>
    <!-- end transition-overlay -->
    <main>
        <aside class="side-box hidden-sm"> <span class="close-side-box"><i class="ion-close"></i></span>
            <div class="side-about">
                <h5>SHIPPER LOGISTIC</h5>
                <figure><img src="{{ asset ('assetsuser/images/image1.jpg') }}" alt="Image"></figure>
                <p>You can use the icons above to access more information about our credentials, providing solutions in
                    a host of specific industries.</p>
                <a href="#">READ MORE</a>
            </div>
            <!-- end side-about -->
            <div class="side-location">
                <h5>FIND A LOCATION</h5>
                <select class="selectpicker">
                    <option>Select Dealer</option>
                    <option>New York - NYC</option>
                </select>
            </div>
            <!-- end quick-services -->
            <div class="pdf-catalog">
                <h5>DOWNLOAD CATALOGUE</h5>
                <p>App is designed to provide the most reliable information and make the most of your travel experience.
                </p>
                <i class="ion-document-text"></i> <a href="#">DOWNLOAD</a>
            </div>
            <!-- end pdf-catalog -->
        </aside>
        <!-- end side-box -->
        <header class="full-header">
            <nav class="navbar navbar-default">
                <!-- end top-bar -->
                <div class="container">
                    <div class="navbar-header">
                        <div class="row">
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <button type="button" class="navbar-toggle toggle-menu menu-left push-body"
                                    data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span
                                        class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                        class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                <a class="navbar-brand" href="index-2.html"><img
                                        src="{{ asset ('assetsuser/images/logocba.png') }}" alt="Image" style=""></a>
                            </div>
                            <!-- end col-5 -->
                            <div class="col-md-3 col-sm-4 hidden-xs"> <i class="icon-global"></i>
                                <h6>BUKA JAM<br>
                                    <span>SENIN - SABTU 07:00 - 18:00 </span></h6>
                            </div>
                            <!-- end col-2 -->
                            <div class="col-md-3 col-sm-4 hidden-xs"> <i class="icon-map-pin"></i>
                                <h6>LOKASI<br>
                                    <span>SURABAYA - JAWA TIUR</span></h6>
                            </div>
                            <!-- end col-2 -->
                            <div class="col-md-3 hidden-sm hidden-xs"> <i class="icon-chat"></i>
                                <h6>CUSTOMER SERVICE<br>
                                    <span>SUPPORT@SHIPPER.COM</span></h6>
                            </div>
                            <!-- end col-2 -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end navbar-header -->
                    <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left"
                        id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav main-menu">
                            <li><a href="{{url('/hallo-tracking')}}" class="transition">HOME</a></li>
                            <li><a href="{{url('/about-us')}}" class="transition">ABOUT US</a></li>

                            <li><a href="{{url('/contact')}}" class="transition">CONTACT</a></li>
                        </ul>

                        <ul class="nav navbar-nav icon-nav hidden-sm">
                            <li><a href="javascript:void(0)" class="hamburger-menu"><i class="ion-navicon"></i></a></li>
                            <li><a href="{{ url('login') }}" class="search-btn"><i class="fa fa-user"
                                        aria-hidden="true"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="ion-android-cart"></i></a></li>

                        </ul>
                    </div>
                    <!-- end navbar-collapse -->
                </div>
                <!-- end container -->
            </nav>
        </header>
        <!-- end full-header -->
        @yield('div-sec')

        <!-- end application -->
        <footer class="dark-footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <h4 class="title"><span>01</span>ABOUT US</h4>
                            <p>PT. Cahaya Bagus Anugrah adalah salah satu dari sedikit perusahaan kurir di indonesia
                                yang menawarkan harga transparan tanpa biaya tersembunyi atau tambahan! PT. Cahaya Bagus
                                Anugrah menyediakan pengiriman dari pintu ke pintu, dari milik Anda ke penerima Anda,
                                dengan SATU BIAYA TETAP. Lewatlah sudah hari-hari bagi Anda untuk secara pribadi
                                mengunjungi kantor pos atau bandara!</p>
                            <ul class="social-media">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                                <li><a href="#"><i class="ion-social-vimeo"></i></a></li>
                            </ul>
                        </div>
                        <!-- end col-5 -->
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <h4 class="title"><span>02</span>SERVICES</h4>
                            <ul class="footer-menu">
                                <li><a href="#">Aceon Freight</a></li>
                                <li><a href="#">Storeage</a></li>
                                <li><a href="#">Package Security</a></li>
                                <li><a href="#">Air Freight</a></li>
                                <li><a href="#">Warehousing</a></li>
                            </ul>
                        </div>
                        <!-- end col-2 -->
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <h4 class="title"><span>03</span>SHIPPER</h4>
                            <ul class="footer-menu">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Location</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Site Maps</a></li>
                                <li><a href="#">Get a Quote</a></li>
                            </ul>
                        </div>
                        <!-- end col-2 -->
                        <div class="col-md-4">
                            <div class="newsletter">
                                <h4 class="title"><span>04</span>NEWSLETTER</h4>
                                <p>If you would like more information about our services we are eager to help.</p>
                                <form>
                                    <input type="text" placeholder="Type your e-mail">
                                    <button type="submit">JOIN</button>
                                </form>
                                <small>I promise, we won’t spam you!</small>
                            </div>
                            <!-- end newsletter -->
                        </div>
                        <!-- end col-2 -->
                    </div>
                    <!-- end row -->
                    <div class="row middle-bar">
                        <div class="col-lg-4 col-md-3 hidden-sm hidden-xs"> <img
                                src="{{ asset ('assetsuser/images/logocba.png') }}" alt="Image" class="logo">
                            <h4>INTERNATIONAL LOGISTIC</h4>
                        </div>
                        <!-- end col-4 -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end footer-content -->
            <div class="sub-footer">
                <div class="container"> <span class="copyright">Copyright © , PT. Cahaya Bagus Anugrah | we've TRACK to grow yours UP</span></div>
                <!-- end container -->
            </div>
            <!-- end sub-footer -->
        </footer>
        <!-- end footer -->
    </main>

    <!-- JS FILES -->
    <script src="{{ asset ('assetsuser/js/jquery.min.js')}}"></script>
    <script src="{{ asset ('assetsuser/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset ('assetsuser/js/bootstrap-select.js')}}"></script>
    <script src="{{ asset ('assetsuser/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset ('assetsuser/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset ('assetsuser/js/jquery.stellar.js')}}"></script>
    <script src="{{ asset ('assetsuser/js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset ('assetsuser/js/jquery.form.js')}}"></script>
    <script src="{{ asset ('assetsuser/js/contact-form.js')}}"></script>
    <script src="{{ asset ('assetsuser/js/jquery.fancybox.js')}}"></script>
    <script src="{{ asset ('assetsuser/js/waypoints.min.js')}}"></script>
    <script src="{{ asset ('assetsuser/js/slick.js')}}"></script>
    <script src="{{ asset ('assetsuser/js/masonry.min.js')}}"></script>
    <script src="{{ asset ('assetsuser/js/scripts.js')}}"></script>
    <script src="{{ asset('assetsadmin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assetsadmin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('.data-pesanan').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                paging: false,
                info: false,
                ajax: {
                    url: "{{ route('pesanan.tracking') }}",
                    type: 'get',
                    data: function (d) {
                        d.no_pesanan = $('.no-resi').val() || 0;
                        return d;
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        className: 'text-center',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'tgl_lokasi',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                    },
                    {
                        data: 'lokasi_pesanan',
                        orderable: false,
                        searchable: false,
                        className: 'ga',
                        render: function (data, type, row, meta) {
                            return `<textarea class="lokasi">${row.lokasi_pesanan}</textarea>`;
                        }
                    },
                ],
                "rowCallback": function (row, data) {
                    $(row).find('.lokasi').summernote({
                        toolbar: [],
                        height: 50
                    });
                    $(row).find('.lokasi').summernote("disable");
                }

            });
            $(document).on('change', '.no-resi', function () {
                table.ajax.reload(null, true)
            })
        })

    </script>
</body>

<!-- Mirrored from themezinho.net/shipper/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Jul 2022 13:07:15 GMT -->

</html>
