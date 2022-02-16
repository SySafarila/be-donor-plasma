@extends('layouts.main')

@section('content')
    <section class="container pt-5">
        <h5 class="fw-medium mb-0">Cari pendonor<br>dengan melengkapi data dibawah</h5>
        <form action="{{ route('cari.pendonor2') }}" method="GET" class="row pt-3">
            {{-- @csrf --}}
            <input type="hidden" name="search" value="{{ true }}">
            <div class="col-lg-2 col-md-3">
                <select id="select-blood-group" placeholder="Golongan Darah" name="bloodType" required>
                    <option value="">Pilih Golongan Darah</option>
                    <option value="blood-group-a">A</option>
                    <option value="blood-group-b">B</option>
                    <option value="blood-group-o">O</option>
                    <option value="blood-group-ab">AB</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-3 pt-2 pt-lg-0 pt-md-0">
                <select id="select-blood-rhesus" placeholder="Rhesus" name="rhesus" required>
                    <option value="">Pilih Rhesus Darah</option>
                    <option value="rhesus-plus">+</option>
                    <option value="rhesus-minus">-</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-3 pt-2 pt-lg-0 pt-md-0">
                <select id="select-city" placeholder="Kota" name="city" required>
                    <option value="">Pilih Kota</option>
                    <option value="jakarta pusat">Jakarta Pusat</option>
                    <option value="jakarta utara">Jakarta Utara</option>
                    <option value="jakarta barat">Jakarta Barat</option>
                    <option value="jakarta selatan">Jakarta Selatan</option>
                    <option value="jakarta timur">Jakarta Timur</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-3 pt-3 pt-lg-0 pt-md-0">
                <button type="submit" class="btn primary-btn fw-medium px-4 py-2">
                    <ion-icon name="search-outline" style="font-size: 20px; vertical-align: middle;"></ion-icon> Cari
                </button>
            </div>

        </form>
    </section>

    <div class="container">
        <hr>
    </div>

    <section id="donor-list" class="pt-3 pb-5">
        <div class="container">

            <h5 class="fw-medium">Daftar pendonor<br>dengan golongan darah <span class="color-1">A</span>
            </h5>

            <div class="row pt-3" id="row-donor-list">

                @forelse ($aArr as $donor)
                    <div class="col-lg-3 col-md-6">
                        <div class="card card-donor border-0 shadow-sm">
                            <div class="card-body">
                                <img src="https://dummyimage.com/34x34/000/fff&text=+" alt=""
                                    class="user-photo d-block mx-auto">
                                <p
                                    class="blood-group-badge fw-medium d-flex justify-content-center align-items-center mb-0 text-capitalize">
                                    {{ explode('-', $donor->bloodType)[2] }}</p>
                                <h6 class="fw-medium text-center pt-2 mb-2">{{ $donor->fullName }}</h6>
                                <p class="mb-1 text-secondary text-center">Wilayah : {{ $donor->city }}</p>
                                <p class="mb-0 text-secondary text-center">Tanggal Sembuh :
                                    {{ \Carbon\Carbon::parse($donor->negativeDate)->format('d-m-Y') }}</p>
                                <div class="text-center pt-3">
                                    <button type="button" class="btn secondary-btn-outline btn-contact" data-toggle="modal"
                                        data-target="#donor-{{ $donor->id }}">Detail</button>
                                    <a href="https://wa.me/62{{ explode(0, $donor->mobile)[1] }}"
                                        class="btn primary-btn btn-contact">Kontak</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container">
                        <p>Kosong</p>
                    </div>
                @endforelse

            </div>
        </div>
        <div class="container mt-5">

            <h5 class="fw-medium">Daftar pendonor<br>dengan golongan darah <span class="color-1">B</span>
            </h5>

            <div class="row pt-3" id="row-donor-list">

                @forelse ($bArr as $donor)
                    <div class="col-lg-3 col-md-6">
                        <div class="card card-donor border-0 shadow-sm">
                            <div class="card-body">
                                <img src="https://dummyimage.com/34x34/000/fff&text=+" alt=""
                                    class="user-photo d-block mx-auto">
                                <p
                                    class="blood-group-badge fw-medium d-flex justify-content-center align-items-center mb-0 text-capitalize">
                                    {{ explode('-', $donor->bloodType)[2] }}</p>
                                <h6 class="fw-medium text-center pt-2 mb-2">{{ $donor->fullName }}</h6>
                                <p class="mb-1 text-secondary text-center">Wilayah : {{ $donor->city }}</p>
                                <p class="mb-0 text-secondary text-center">Tanggal Sembuh :
                                    {{ \Carbon\Carbon::parse($donor->negativeDate)->format('d-m-Y') }}</p>
                                <div class="text-center pt-3">
                                    <button type="button" class="btn secondary-btn-outline btn-contact" data-toggle="modal"
                                        data-target="#donor-{{ $donor->id }}">Detail</button>
                                    <a href="https://wa.me/62{{ explode(0, $donor->mobile)[1] }}"
                                        class="btn primary-btn btn-contact">Kontak</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container">
                        <p>Kosong</p>
                    </div>
                @endforelse

            </div>
        </div>
        <div class="container mt-5">

            <h5 class="fw-medium">Daftar pendonor<br>dengan golongan darah <span class="color-1">AB</span>
            </h5>

            <div class="row pt-3" id="row-donor-list">

                @forelse ($abArr as $donor)
                    <div class="col-lg-3 col-md-6">
                        <div class="card card-donor border-0 shadow-sm">
                            <div class="card-body">
                                <img src="https://dummyimage.com/34x34/000/fff&text=+" alt=""
                                    class="user-photo d-block mx-auto">
                                <p
                                    class="blood-group-badge fw-medium d-flex justify-content-center align-items-center mb-0 text-capitalize">
                                    {{ explode('-', $donor->bloodType)[2] }}</p>
                                <h6 class="fw-medium text-center pt-2 mb-2">{{ $donor->fullName }}</h6>
                                <p class="mb-1 text-secondary text-center">Wilayah : {{ $donor->city }}</p>
                                <p class="mb-0 text-secondary text-center">Tanggal Sembuh :
                                    {{ \Carbon\Carbon::parse($donor->negativeDate)->format('d-m-Y') }}</p>
                                <div class="text-center pt-3">
                                    <button type="button" class="btn secondary-btn-outline btn-contact" data-toggle="modal"
                                        data-target="#donor-{{ $donor->id }}">Detail</button>
                                    <a href="https://wa.me/62{{ explode(0, $donor->mobile)[1] }}"
                                        class="btn primary-btn btn-contact">Kontak</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container">
                        <p>Kosong</p>
                    </div>
                @endforelse

            </div>
        </div>
        <div class="container mt-5">

            <h5 class="fw-medium">Daftar pendonor<br>dengan golongan darah <span class="color-1">O</span>
            </h5>

            <div class="row pt-3" id="row-donor-list">

                @forelse ($oArr as $donor)
                    <div class="col-lg-3 col-md-6">
                        <div class="card card-donor border-0 shadow-sm">
                            <div class="card-body">
                                <img src="https://dummyimage.com/34x34/000/fff&text=+" alt=""
                                    class="user-photo d-block mx-auto">
                                <p
                                    class="blood-group-badge fw-medium d-flex justify-content-center align-items-center mb-0 text-capitalize">
                                    {{ explode('-', $donor->bloodType)[2] }}</p>
                                <h6 class="fw-medium text-center pt-2 mb-2">{{ $donor->fullName }}</h6>
                                <p class="mb-1 text-secondary text-center">Wilayah : {{ $donor->city }}</p>
                                <p class="mb-0 text-secondary text-center">Tanggal Sembuh :
                                    {{ \Carbon\Carbon::parse($donor->negativeDate)->format('d-m-Y') }}</p>
                                <div class="text-center pt-3">
                                    <button type="button" class="btn secondary-btn-outline btn-contact" data-toggle="modal"
                                        data-target="#donor-{{ $donor->id }}">Detail</button>
                                    <a href="https://wa.me/62{{ explode(0, $donor->mobile)[1] }}"
                                        class="btn primary-btn btn-contact">Kontak</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container">
                        <p>Kosong</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>

    <!-- == MODAL == -->
    <!-- Modal 01 -->
    @forelse ($aArr as $donor)
        <div class="modal fade modal-donor-details" id="donor-{{ $donor->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <img src="https://dummyimage.com/34x34/000/fff&text=+" alt=""
                                    class="donor-photo d-block mx-auto">
                            </div>
                            <div class="col pt-3 pt-lg-0">
                                <table class="table table-sm table-borderless" style="font-size: 15px;">
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium">Nama Lengkap</td>
                                            <td class="text-secondary">{{ $donor->fullName }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Jenis Kelamin</td>
                                            <td class="text-secondary">
                                                {{ $donor->gender == 'rhesus-plus' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tempat & Tanggal Lahir</td>
                                            <td class="text-secondary">{{ $donor->placeBirth }},
                                                {{ \Carbon\Carbon::parse($donor->dateBirth)->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Golongan Darah</td>
                                            <td class="text-secondary text-capitalize">
                                                {{ explode('-', $donor->bloodType)[2] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Rhesus</td>
                                            <td class="text-secondary">{{ $donor->rhesus == 'rhesus-plus' ? '+' : '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tanggal terinfeksi COVID-19</td>
                                            <td class="text-secondary">
                                                {{ \Carbon\Carbon::parse($donor->positiveDate)->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tanggal sembuh dari COVID-19</td>
                                            <td class="text-secondary">
                                                {{ \Carbon\Carbon::parse($donor->negativeDate)->format('d-m-Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pb-0">
                            <button type="button" class="btn secondary-btn-outline" data-dismiss="modal">Tutup</button>
                            <a href="https://wa.me/62{{ explode(0, $donor->mobile)[1] }}"
                                class="btn primary-btn btn-contact">Kontak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        {{--  --}}
    @endforelse
    @forelse ($bArr as $donor)
        <div class="modal fade modal-donor-details" id="donor-{{ $donor->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <img src="https://dummyimage.com/34x34/000/fff&text=+" alt=""
                                    class="donor-photo d-block mx-auto">
                            </div>
                            <div class="col pt-3 pt-lg-0">
                                <table class="table table-sm table-borderless" style="font-size: 15px;">
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium">Nama Lengkap</td>
                                            <td class="text-secondary">{{ $donor->fullName }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Jenis Kelamin</td>
                                            <td class="text-secondary">
                                                {{ $donor->gender == 'rhesus-plus' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tempat & Tanggal Lahir</td>
                                            <td class="text-secondary">{{ $donor->placeBirth }},
                                                {{ \Carbon\Carbon::parse($donor->dateBirth)->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Golongan Darah</td>
                                            <td class="text-secondary text-capitalize">
                                                {{ explode('-', $donor->bloodType)[2] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Rhesus</td>
                                            <td class="text-secondary">{{ $donor->rhesus == 'rhesus-plus' ? '+' : '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tanggal terinfeksi COVID-19</td>
                                            <td class="text-secondary">
                                                {{ \Carbon\Carbon::parse($donor->positiveDate)->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tanggal sembuh dari COVID-19</td>
                                            <td class="text-secondary">
                                                {{ \Carbon\Carbon::parse($donor->negativeDate)->format('d-m-Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pb-0">
                            <button type="button" class="btn secondary-btn-outline" data-dismiss="modal">Tutup</button>
                            <a href="https://wa.me/62{{ explode(0, $donor->mobile)[1] }}"
                                class="btn primary-btn btn-contact">Kontak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        {{--  --}}
    @endforelse
    @forelse ($abArr as $donor)
        <div class="modal fade modal-donor-details" id="donor-{{ $donor->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <img src="https://dummyimage.com/34x34/000/fff&text=+" alt=""
                                    class="donor-photo d-block mx-auto">
                            </div>
                            <div class="col pt-3 pt-lg-0">
                                <table class="table table-sm table-borderless" style="font-size: 15px;">
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium">Nama Lengkap</td>
                                            <td class="text-secondary">{{ $donor->fullName }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Jenis Kelamin</td>
                                            <td class="text-secondary">
                                                {{ $donor->gender == 'rhesus-plus' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tempat & Tanggal Lahir</td>
                                            <td class="text-secondary">{{ $donor->placeBirth }},
                                                {{ \Carbon\Carbon::parse($donor->dateBirth)->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Golongan Darah</td>
                                            <td class="text-secondary text-capitalize">
                                                {{ explode('-', $donor->bloodType)[2] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Rhesus</td>
                                            <td class="text-secondary">{{ $donor->rhesus == 'rhesus-plus' ? '+' : '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tanggal terinfeksi COVID-19</td>
                                            <td class="text-secondary">
                                                {{ \Carbon\Carbon::parse($donor->positiveDate)->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tanggal sembuh dari COVID-19</td>
                                            <td class="text-secondary">
                                                {{ \Carbon\Carbon::parse($donor->negativeDate)->format('d-m-Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pb-0">
                            <button type="button" class="btn secondary-btn-outline" data-dismiss="modal">Tutup</button>
                            <a href="https://wa.me/62{{ explode(0, $donor->mobile)[1] }}"
                                class="btn primary-btn btn-contact">Kontak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        {{--  --}}
    @endforelse
    @forelse ($oArr as $donor)
        <div class="modal fade modal-donor-details" id="donor-{{ $donor->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <img src="https://dummyimage.com/34x34/000/fff&text=+" alt=""
                                    class="donor-photo d-block mx-auto">
                            </div>
                            <div class="col pt-3 pt-lg-0">
                                <table class="table table-sm table-borderless" style="font-size: 15px;">
                                    <tbody>
                                        <tr>
                                            <td class="fw-medium">Nama Lengkap</td>
                                            <td class="text-secondary">{{ $donor->fullName }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Jenis Kelamin</td>
                                            <td class="text-secondary">
                                                {{ $donor->gender == 'rhesus-plus' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tempat & Tanggal Lahir</td>
                                            <td class="text-secondary">{{ $donor->placeBirth }},
                                                {{ \Carbon\Carbon::parse($donor->dateBirth)->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Golongan Darah</td>
                                            <td class="text-secondary text-capitalize">
                                                {{ explode('-', $donor->bloodType)[2] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Rhesus</td>
                                            <td class="text-secondary">{{ $donor->rhesus == 'rhesus-plus' ? '+' : '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tanggal terinfeksi COVID-19</td>
                                            <td class="text-secondary">
                                                {{ \Carbon\Carbon::parse($donor->positiveDate)->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-medium">Tanggal sembuh dari COVID-19</td>
                                            <td class="text-secondary">
                                                {{ \Carbon\Carbon::parse($donor->negativeDate)->format('d-m-Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pb-0">
                            <button type="button" class="btn secondary-btn-outline" data-dismiss="modal">Tutup</button>
                            <a href="https://wa.me/62{{ explode(0, $donor->mobile)[1] }}"
                                class="btn primary-btn btn-contact">Kontak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        {{--  --}}
    @endforelse
    <!-- End Of Modal 01 -->
    <!-- == END OF MODAL == -->
@endsection
