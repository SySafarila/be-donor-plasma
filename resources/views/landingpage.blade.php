@extends('layouts.main')

@section('content')
    <!-- == Jumbotron == -->
    <section class="jumbotron jumbotron-fluid mb-0" id="jumbotron">
        <div class="container text-center">
            <h1 class="heading fw-semibold text-white">DONOR PLASMA KONVALESEN</h1>
            <p class="desc text-white">Donate To Save Live <span class="fw-semibold">#BersatuLawanCovid19</span></p>
            <div class="btn-jumbotron">
                <a href="{{ route('formulir.pendaftaran') }}" class="btn primary-btn btn-donate-now">Donor Sekarang</a>
                <a href="#about" class="btn secondary-btn-outline btn-learn-more">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </section>
    <!-- == End Of Jumbotron == -->

    <!-- == About == -->
    <section id="about">

        <div class="row no-gutters" id="row-about">

            <div class="col-lg-6 bg-img-1 order-lg-1 order-1">
                <img src="{{ asset('assets/images/background/nguy-n-hi-p-ufwC2cmbaaI-unsplash.jpg') }}" alt=""
                    class="about-bg-img-01 img-fluid">
            </div>

            <div class="col-about-01 col-lg-6 bg-color-1 order-lg-2 order-2">
                <div class="container pl-lg-5 pt-5 pb-5 pb-lg-0 pt-md-5">
                    <h3 class="fw-semibold text-white pt-2">Apa itu Donor Plasma Konvalesen?</h3>
                    <div class="col-lg-10 p-0">
                        <p class="pt-2 text-white text-justify">Merupakan salah satu metode imunisasi pasif, yang
                            dilakukan dengan
                            memberikan plasma orang yang
                            telah sembuh dari COVID-19, kepada pasien COVID-19 yang sedang dirawat. Bertujuan sebagai
                            terapi
                            tambahan COVID-19 dengan mengajak orang yang telah sembuh dari COVID-19 untuk menjadi
                            pendonor
                            plasma.</p>
                    </div>

                </div>
            </div>

            <div class="col-about-02 col-lg-6 bg-light order-lg-3 order-4">
                <div class="container pl-lg-5 pt-5 pb-5 pb-lg-0 pt-md-5">
                    <h3 class="fw-semibold color-3">Apa Saja Syarat Untuk Menjadi Pendonor Plasma Konvalesen?</h3>
                    <div class="pt-2">
                        <p class="mb-2">
                            <ion-icon name="checkmark-done-outline" class="checkmark-icon"></ion-icon><span
                                class="">
                                Usia 18-60 tahun</span>
                        </p>
                        <p class="mb-2">
                            <ion-icon name="checkmark-done-outline" class="checkmark-icon"></ion-icon><span
                                class="">
                                Berat badan ≥ 55kg</span>
                        </p>
                        <p class="mb-2">
                            <ion-icon name="checkmark-done-outline" class="checkmark-icon"></ion-icon><span
                                class="">
                                Diutamakan pria, apabila perempuan belum pernah hamil</span>
                        </p>
                        <p class="mb-2">
                            <ion-icon name="checkmark-done-outline" class="checkmark-icon"></ion-icon><span
                                class="">
                                Pernah terkonfirmasi COVID-19 dengan Surat keterangan<br><span
                                    class="pl-4 d-none d-lg-block">sembuh dari
                                    dokter yang merawat</span>
                        </p>
                        <p class="mb-2">
                            <ion-icon name="checkmark-done-outline" class="checkmark-icon"></ion-icon><span
                                class="">
                                Bebas keluhan minimal 14 hari</span>
                        </p>
                        <p class="mb-2">
                            <ion-icon name="checkmark-done-outline" class="checkmark-icon"></ion-icon><span
                                class="">
                                Tidak menerima transfusi darah selama 6 bulan terakhir</span>
                        </p>
                        <p class="mb-2">
                            <ion-icon name="checkmark-done-outline" class="checkmark-icon"></ion-icon><span
                                class="">
                                Lebih diutamakan yang pernah mendonorkan darah</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 order-lg-4 order-3">
                <img src="{{ asset('assets/images/background/nguy-n-hi-p-sTTeaN4wwrU-unsplash.jpg') }}" alt=""
                    class="about-bg-img-02 img-fluid">
            </div>

            <div class="col-lg-6 order-lg-5 order-5">
                <img src="{{ asset('assets/images/background/nguy-n-hi-p-maYeMl3xCrY-unsplash.jpg') }}" alt=""
                    class="about-bg-img-03 img-fluid">
            </div>

            <div class="col-about-03 col-lg-6 bg-color-1 order-lg-6 order-6">
                <div class="container pl-lg-5 pt-5 pb-5 pt-lg-4 pb-lg-0 pt-md-5">
                    <h3 class="text-white fw-semibold pt-3">Alur Donasi Plasma Konvalesen</h3>
                    <div class="col-10 text-white pl-0 pt-2">
                        <h6 class="fw-medium mb-1">1. Persiapan Donor</h6>
                        <p class="desc">Mengisi formulir Donor Darah dan Informed Consent, Seleksi Donor melalui
                            Anamesis dan Pemeriksaan Fisik</p>

                        <h6 class="fw-medium mb-1">2. Pemeriksaan Lab Donor</h6>
                        <p class="desc">Mengisi formulir Donor Darah dan Informed Consent, Seleksi Donor melalui
                            Anamesis dan Pemeriksaan Fisik</p>

                        <h6 class="fw-medium mb-1">3. Pengambilan Darah Donor</h6>
                        <p class="desc">Mengisi formulir Donor Darah dan Informed Consent, Seleksi Donor melalui
                            Anamesis dan Pemeriksaan Fisik</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- == End Of About == -->
@endsection
