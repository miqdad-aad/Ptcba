@extends('user.layout_user')
@section('div-sec')
<section class="sub-header">
    <h5 class="page-title">ABOUT US</h5>
    <ul class="breadcrumb">
        <li><a href="index-2.html">Home</a></li>
        <li><span class="active">About Us</span></li>
    </ul>
</section>
<section class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h4 class="section-title"><span>01</span>TENTANG KAMI</h4>
            </div>
            <!-- end col-12 -->
            <div class="col-md-8 col-sm-12">
                <h5 class="lead"><b>Salah satu bisnis ekspedisi pengangkutan barang berat dan muatan abnormal</b></h5>
                <p style="text-indent: 45px;">Pelayaran internasional memang menyebalkan, terutama ke Indonesia. Anda tidak akan pernah tahu berapa
                    banyak bea cukai dan bea masuk, biaya tersembunyi yang selangit dan sulit untuk menemukan kurir
                    terpercaya yang dapat melacak paket Anda setelah meninggalkan negara Anda.</p>
                <p style="text-indent: 45px;">PT. Cahaya Bagus Anugrah adalah salah satu dari sedikit perusahaan kurir di indonesia yang
                    menawarkan harga
                    transparan tanpa biaya tersembunyi atau tambahan! PT. Cahaya Bagus Anugrah menyediakan pengiriman
                    dari pintu ke pintu,
                    dari milik Anda ke penerima Anda, dengan SATU BIAYA TETAP. Lewatlah sudah hari-hari bagi Anda untuk
                    secara pribadi mengunjungi kantor pos atau bandara!</p>
                <p style="text-indent: 45px;">Dengan harga yang kompetitif dan layanan bebas repot, kami memastikan Anda mendapatkan apa yang Anda
                    bayar dan banyak lagi. Di sini, di PT. Cahaya Bagus Anugrah, kami memahami bahwa tidak ada dua
                    pengiriman yang identik.
                    Oleh karena itu, setiap pesanan yang kami terima akan disesuaikan dengan kebutuhan Anda secara unik
                    untuk memastikan bahwa barang Anda terkirim dengan aman dan selamat. Tim dukungan pelanggan kami
                    yang hangat dan berdedikasi siap siaga sepanjang waktu jika Anda memerlukan bantuan.</p>
                <div class="about-features">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="section-title"><span>02</span> Kami Menjanjikan Anda Ini</h4>
                        </div>
                        <!-- end col-12 -->
                        <div class="col-md-6 col-sm-6"> <img src="{{ asset ('assetsuser/images/box.png') }}"
                                alt="Image">
                            <h5>LAYANAN YANG DIPERSONALISASI</h5>
                            <p>Di sini, kami memahami bahwa tidak ada dua pengiriman yang
                                identik, itulah sebabnya setiap pengiriman secara unik melayani kebutuhan dan preferensi
                                Anda!</p>
                        </div>
                        <!-- end col-6 -->
                        <div class="col-md-6 col-sm-6"> <img src="{{ asset ('assetsuser/images/hand.png') }}"
                                alt="Image">
                            <h5>TARIF TERBAIK</h5>
                            <p>Dengan ulasan harga reguler, kami bangga harga kami menjadi yang paling kompetitif jika
                                tidak lebih terjangkau di pasar.</p>
                        </div>
                        <!-- end col-6 -->
                        <div class="col-md-6 col-sm-6"> <img src="{{ asset ('assetsuser/images/love.png') }}"
                                alt="Image">
                            <h5>PENGIRIMAN TERJAMIN</h5>
                            <p>Tim kami yang berdedikasi dengan pengalaman lebih dari 15 tahun menjamin semua paket
                                mencapai tujuan dengan aman dan sehat.</p>
                        </div>
                        <!-- end col-6 -->
                        <div class="col-md-6 col-sm-6"> <img src="{{ asset ('assetsuser/images/money.png') }}"
                                alt="Image">
                            <h5>TIDAK ADA BIAYA TERSEMBUNYI</h5>
                            <p>Apa yang Anda lihat adalah apa yang Anda bayar! Tenang, kami jamin tidak akan ada biaya
                                lain setelah Anda melakukan pembayaran.</p>
                        </div>
                        <!-- end col-6 -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end about-features -->
            </div>
            <!-- end col-8 -->
            <div class="col-md-4">
                <figure class="thumb-image"><img src="{{ asset ('assetsuser/images/image1.jpg') }}" alt="Image">
                    <figcaption>Member of the Road Haulage Association</figcaption>
                </figure>
                <div class="pdf-catalog"> <i class="icon-document"></i> <a href="#">DOWNLOAD PDF</a> </div>
                <!-- end pdf-catalog -->
                <img src="{{ asset ('assetsuser/images/delivery-trucks.jpg') }}" alt="Image">
            </div>
            <!-- end col-4 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
@endsection
