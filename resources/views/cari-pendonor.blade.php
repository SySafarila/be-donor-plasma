@extends('layouts.main')

@section('content')
    <section class="container pt-5">
        <h5 class="fw-medium mb-0">Cari pendonor<br>dengan melengkapi data dibawah</h5>
        <div class="row pt-3">

            <div class="col-lg-2 col-md-3">
                <select id="select-blood-group" placeholder="Golongan Darah">
                    <option value="">Pilih Golongan Darah</option>
                    <option value="blood-group-a">A</option>
                    <option value="blood-group-b">B</option>
                    <option value="blood-group-o">O</option>
                    <option value="blood-group-ab">AB</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-3 pt-2 pt-lg-0 pt-md-0">
                <select id="select-blood-rhesus" placeholder="Rhesus">
                    <option value="">Pilih Rhesus Darah</option>
                    <option value="rhesus-plus">+</option>
                    <option value="rhesus-minus">-</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-3 pt-2 pt-lg-0 pt-md-0">
                <select id="select-city" placeholder="Kota">
                    <option value="">Pilih Kota</option>
                    <option value="JKT">Jakarta</option>
                    <option value="BDG">Bandung</option>
                    <option value="MDC">Manado</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-3 pt-3 pt-lg-0 pt-md-0">
                <button type="submit" class="btn primary-btn fw-medium px-4 py-2">
                    <ion-icon name="search-outline" style="font-size: 20px; vertical-align: middle;"></ion-icon> Cari
                </button>
            </div>

        </div>
    </section>

    <div class="container">
        <hr>
    </div>

    <section id="donor-list" class="pt-3 pb-5">
        <div class="container">

            <h5 class="fw-medium">Daftar pendonor<br>dengan golongan darah <span class="color-1">O+</span>
                diwilayah
                <span class="color-1">Bandung</span>
            </h5>

            <div class="row pt-3" id="row-donor-list">

                <div class="col-lg-3 col-md-6">
                    <div class="card card-donor border-0 shadow-sm">
                        <div class="card-body">
                            <img src="assets/images/onic-kayes.jpg" alt="" class="user-photo d-block mx-auto">
                            <p class="blood-group-badge fw-medium d-flex justify-content-center align-items-center mb-0">
                                O+</p>
                            <h6 class="fw-medium text-center pt-2 mb-2">Onic Kayes</h6>
                            <p class="mb-1 text-secondary text-center">Wilayah : Bandung</p>
                            <p class="mb-0 text-secondary text-center">Tanggal Sembuh : 12 Juni 2021</p>
                            <div class="text-center pt-3">
                                <button type="button" class="btn secondary-btn-outline btn-contact" data-toggle="modal"
                                    data-target="#modalDonor01">Detail</button>
                                <a href="" class="btn primary-btn btn-contact">Kontak</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card card-donor border-0 shadow-sm">
                        <div class="card-body">
                            <img src="assets/images/onic-kayes.jpg" alt="" class="user-photo d-block mx-auto">
                            <p class="blood-group-badge fw-medium d-flex justify-content-center align-items-center mb-0">
                                O+</p>
                            <h6 class="fw-medium text-center pt-2 mb-2">Onic Kayes</h6>
                            <p class="mb-1 text-secondary text-center">Wilayah : Bandung</p>
                            <p class="mb-0 text-secondary text-center">Tanggal Sembuh : 12 Juni 2021</p>
                            <div class="text-center pt-3">
                                <a href="" class="btn secondary-btn-outline btn-contact">Detail</a>
                                <a href="" class="btn primary-btn btn-contact">Kontak</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card card-donor border-0 shadow-sm">
                        <div class="card-body">
                            <img src="assets/images/onic-kayes.jpg" alt="" class="user-photo d-block mx-auto">
                            <p class="blood-group-badge fw-medium d-flex justify-content-center align-items-center mb-0">
                                O+</p>
                            <h6 class="fw-medium text-center pt-2 mb-2">Onic Kayes</h6>
                            <p class="mb-1 text-secondary text-center">Wilayah : Bandung</p>
                            <p class="mb-0 text-secondary text-center">Tanggal Sembuh : 12 Juni 2021</p>
                            <div class="text-center pt-3">
                                <a href="" class="btn secondary-btn-outline btn-contact">Detail</a>
                                <a href="" class="btn primary-btn btn-contact">Kontak</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card card-donor border-0 shadow-sm">
                        <div class="card-body">
                            <img src="assets/images/onic-kayes.jpg" alt="" class="user-photo d-block mx-auto">
                            <p class="blood-group-badge fw-medium d-flex justify-content-center align-items-center mb-0">
                                O+</p>
                            <h6 class="fw-medium text-center pt-2 mb-2">Onic Kayes</h6>
                            <p class="mb-1 text-secondary text-center">Wilayah : Bandung</p>
                            <p class="mb-0 text-secondary text-center">Tanggal Sembuh : 12 Juni 2021</p>
                            <div class="text-center pt-3">
                                <a href="" class="btn secondary-btn-outline btn-contact">Detail</a>
                                <a href="" class="btn primary-btn btn-contact">Kontak</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- == MODAL == -->
    <!-- Modal 01 -->
    <div class="modal fade modal-donor-details" id="modalDonor01" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content px-2 py-2">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pendonor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <ion-icon name="close-circle-outline" class="close-icon"></ion-icon>
                    </button>
                </div>
                <div class="modal-body px-3 py-3">
                    <div class="row no-gutters">
                        <div class="col-lg-3 d-flex align-items-center">
                            <img src="assets/images/onic-kayes.jpg" alt="" class="donor-photo d-block mx-auto">
                        </div>
                        <div class="col pt-3 pt-lg-0">
                            <table class="table table-sm table-borderless" style="font-size: 15px;">
                                <tbody>
                                    <tr>
                                        <td class="fw-medium">Nama Lengkap</td>
                                        <td class="text-secondary">Onic Kayes</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Jenis Kelamin</td>
                                        <td class="text-secondary">Perempuan</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Tempat & Tanggal Lahir</td>
                                        <td class="text-secondary">Bandung, 01 Februari 2000</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Golongan Darah</td>
                                        <td class="text-secondary">O</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Rhesus</td>
                                        <td class="text-secondary">+</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Tanggal terinfeksi COVID-19</td>
                                        <td class="text-secondary">12 Januari 2021</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Tanggal sembuh dari COVID-19</td>
                                        <td class="text-secondary">25 Januari 2021</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pb-0">
                        <button type="button" class="btn secondary-btn-outline" data-dismiss="modal">Tutup</button>
                        <a href="" class="btn primary-btn btn-contact">Kontak</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Of Modal 01 -->
    <!-- == END OF MODAL == -->
@endsection
