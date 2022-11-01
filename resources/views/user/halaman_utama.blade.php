@extends('user.layout_user')
@section('div-sec')
<section class="slider">
    <div class="fixed-form">
        <div class="container">
            <h3>LOGISTICS</h3>
            <h5>Lacak Kiriman</h5>
            <form>
                <input type="text" class="no-resi" placeholder="No Resi">
                &nbsp;
                &nbsp;
                <button type="button" data-toggle="modal" data-target="#exampleModalLong">Tracking</button>
            </form>
        </div>
        <!-- end container -->
    </div>
    <!-- end fixed-form -->
    <div class="main-slider">
        <div class="slide1"> </div>
        <!-- end slider1 -->
        <div class="slide2"> </div>
        <!-- end slider2 -->
        <div class="slide3"> </div>
        <!-- end slider3 -->
    </div>
</section>
<!-- end slider -->
<section class="featured-services">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="left-side">
                    <h3 class="section-title"><span>01</span>PACKING & STORAGE</h3>
                    <p>apa pun yang Anda kirim, ke mana pun Anda mengirimnya.</p>
                    <ul>
                        <li>Pengirim memberikan layanan yang profesional dan efisien </li>
                        <li>Disesuaikan dengan kebutuhan spesifik bisnis Anda.</li>
                        <li>Layanan kami terbaik untuk Anda.</li>
                    </ul>
                </div>
                <!-- end left-side -->
            </div>
            <!-- end col-5 -->
            <div class="col-md-7">
                <div class="right-side">
                    <div class="service-box">
                        <figure><img src="{{ asset ('assetsuser/images/icon01.png') }}" alt="Image">
                            <figcaption>Pengiriman Jalur Laut</figcaption>
                        </figure>
                        <div class="desc"> We want to ensure that it’s as easy as possible to use the site to
                            get.</div>
                        <!-- end desc -->
                    </div>
                    <!-- end service-box -->
                    <div class="service-box spacing">
                        <figure><img src="{{ asset ('assetsuser/images/icon02.png') }}" alt="Image">
                            <figcaption>pengiriman Jalur Udara</figcaption>
                        </figure>
                        <div class="desc"> Shipments moving, whether you’ve worked with us for years completely
                            new.</div>
                        <!-- end desc -->
                    </div>
                    <!-- end service-box -->
                    <div class="service-box">
                        <figure><img src="{{ asset ('assetsuser/images/icon03.png') }}" alt="Image">
                            <figcaption>Pengiriman jalur Darat</figcaption>
                        </figure>
                        <div class="desc">International shipping. For further assistance, please get in touch.
                        </div>
                        <!-- end desc -->
                    </div>
                    <!-- end service-box -->
                </div>
                <!-- end right-side -->
            </div>
            <!-- end col-7 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end featured-services -->
<section class="calculate-shipping">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <h3 class="section-title"><span></span>Tarif Pengiriman </h3>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <!-- end form-group -->
                            <div class="form-group size-field">
                                <label>Berat</label>
                                <span>P</span>
                                <input type="text" placeholder="cm">
                                <span>L</span>
                                <input type="text" placeholder="cm">
                                <span>T </span>
                                <input type="text" placeholder="cm">
                            </div>
                            <div class="form-group">
                                <label>Total berat</label>
                                <input type="text">
                            </div>
                            <!-- end form-group -->


                            <!-- end form-group -->
                        </div>
                        <!-- col-6 -->
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Jalur Pengiriman</label>
                                <span class="full-block">
                                    <input name="type-pengiriman" type="radio" checked>
                                    Udara</span> <span class="full-block">
                                    <input name="type-pengiriman" type="radio">
                                    Air</span> <span class="full-block">
                                    <input name="type-pengiriman" type="radio">
                                    Darat</span> </div>
                            <!-- end form-group -->
                            <div class="form-group"> <small>The Field below will show the double of the number
                                    about $</small> </div>
                            <!-- end form-group -->
                            <div class="form-group">
                                <input type="text" value="$200" disabled>
                            </div>
                            <!-- end form-group -->
                            <div class="form-group">
                                <button type="submit">CALCULATE</button>
                            </div>
                            <!-- end form-group -->
                        </div>
                        <!-- col-6 -->
                    </div>
                    <!-- end row -->
                </form>
            </div>
            <!-- end col-8 -->
            <div class="col-md-4 hidden-sm hidden-xs">
                <figure> <img src="{{ asset ('assetsuser/images/calculate-man.jpg') }}" alt="Image"> </figure>
            </div>
            <!-- end col-4 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- end calculate-shipping -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered data-pesanan" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Tanggal</th>
                                    <th class="text-center" scope="col">Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
