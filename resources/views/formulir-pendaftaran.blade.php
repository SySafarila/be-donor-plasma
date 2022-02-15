@extends('layouts.main')

@section('content')
    <div class="container pb-5 mb-5">

        <div class="jumbotron donor-jumbotron mt-4">
            <h4 class="fw-bold text-white mb-0">Formulir Pendaftaran</h4>
            <p class="text-white mb-0">Lengkapi formulir dibawah untuk menjadi pendonor</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card border-0 shadow-lg mt-3">
            <div class="card-body px-lg-5 py-5">
                <form id="donor-registration-form" action="{{ route('donors.store') }}" method="POST"
                    class="pb-3" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-6 pr-lg-3">
                            <label for="input-fullname">Nama Lengkap</label>
                            <input type="text" class="form-control" id="input-fullname" name="fullName" required>
                            @error('fullName')
                                <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6 pl-lg-3">
                            <label for="select-gender">Jenis Kelamin</label>
                            <select id="select-gender" placeholder="Pilih" name="gender" required>
                                <option value="">Pilih Rhesus Darah</option>
                                <option value="rhesus-plus">Laki-laki</option>
                                <option value="rhesus-minus">Perempuan</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-6 pr-lg-3">
                            <label for="input-place-of-birth">Tempat Lahir</label>
                            <input type="text" class="form-control" id="input-place-of-birth" name="placeBirth" required>
                            @error('placeBirth')
                                <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6 pl-lg-3">
                            <label for="input-date-of-birth">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="input-date-of-birth"
                                data-date-format="DD/MMM/YYYY" name="dateBirth" required>
                            @error('dateBirth')
                                <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-6 pr-lg-3">
                            <label for="input-mobile-phone-number">Nomor Hp</label>
                            <input type="number" class="form-control" id="input-mobile-phone-number" name="mobile"
                                required>
                            @error('mobile')
                                <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                            @enderror
                            <small class="form-text text-muted font-italic">Masukan nomor hp yang dapat dihubungi
                                (contoh: 0823xxxx).</small>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 pl-lg-3">
                            <label for="input-email">Email</label>
                            <input type="email" class="form-control" id="input-email" name="email" required>
                            @error('email')
                                <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                            @enderror
                        </div>
                    </div>
                    <hr class="mt-0">
                    <div class="form-row">
                        <div class="form-group col-lg-3 col-md-3 pr-lg-3">
                            <label for="select-blood-group">Golongan Darah</label>
                            <select id="select-blood-group" placeholder="Pilih" name="bloodType" required>
                                <option value="">Pilih</option>
                                <option value="blood-group-a">A</option>
                                <option value="blood-group-b">B</option>
                                <option value="blood-group-o">O</option>
                                <option value="blood-group-ab">AB</option>
                            </select>
                            @error('bloodType')
                                <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3 col-md-3 pr-lg-3">
                            <label for="select-blood-rhesus">Rhesus</label>
                            <select id="select-blood-rhesus" placeholder="Pilih" name="rhesus" required>
                                <option value="">Pilih Rhesus Darah</option>
                                <option value="rhesus-plus">+</option>
                                <option value="rhesus-minus">-</option>
                            </select>
                            @error('rhesus')
                                <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                            @enderror
                            <small class="form-text text-muted font-italic m-0">+/-</small>
                        </div>
                        <div class="form-group col-lg-3 col-md-3 pl-lg-3">
                            <label for="input-height">Tinggi Badan (cm)</label>
                            <input type="number" class="form-control" id="input-height" name="height" required>
                            @error('height')
                                <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                            @enderror
                            <small class="form-text text-muted font-italic">Isi kolom tinggi badan dengan angka.</small>
                        </div>
                        <div class="form-group col-lg-3 col-md-3 pl-lg-3">
                            <label for="input-weight">Berat Badan (kg)</label>
                            <input type="number" class="form-control" id="input-weight" name="weight" required>
                            @error('weight')
                                <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                            @enderror
                            <small class="form-text text-muted font-italic">Isi kolom berat badan dengan angka.</small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-6 pr-lg-3">
                            <label for="input-covid-positive-date">Tanggal Positif Covid</label>
                            <input type="date" class="form-control" id="input-covid-positive-date" name="positiveDate"
                                required>
                            @error('positiveDate')
                                <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6 pl-lg-3">
                            <label for="input-covid-negative-date">Tanggal Negatif Covid</label>
                            <input type="date" class="form-control" id="input-covid-negative-date" name="negativeDate"
                                required>
                            @error('negativeDate')
                                <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6 pr-lg-3">
                            <label for="inputPassword4">Upload File Positif</label>
                            <div class="custom-file">
                                <img src="" alt="" class="covid-positive-file-preview">
                                <input type="file" class="custom-file-input" id="covid-positive-file"
                                    onchange="covidPositiveFilePreview(this);" name="positiveImage" required>
                                <label class="custom-file-label covid-positive-filename shadow-none"
                                    for="covid-positive-file"></label>
                                @error('positiveImage')
                                    <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 pl-lg-3">
                            <label for="inputPassword4">Upload File Negatif</label>
                            <div class="custom-file">
                                <img src="" alt="" class="covid-negative-file-preview">
                                <input type="file" class="custom-file-input" id="covid-negative-file"
                                    onchange="covidNegativeFilePreview(this);" name="negativeImage" required>
                                <label class="custom-file-label covid-negative-filename shadow-none"
                                    for="covid-negative-file"></label>
                                @error('negativeImage')
                                    <small class="text-danger">{{ $message ?? 'xxx' }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr class="mt-0">
                    <div class="form-group px-4 py-4 mt-3" style="background-color: #ff3d4723; border-radius: 3px;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" name="agreement" required>
                            <label class="form-check-label" for="gridCheck">
                                Dengan ini saya menyatakan bersedia untuk menjadi pendonor plasma konvalesen
                            </label>
                            @error('agreement')
                                <small class="text-danger d-block">{{ $message ?? 'xxx' }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn primary-btn px-5 py-2 mt-2">Kirim</button>
                </form>
            </div>
        </div>

    </div>
@endsection
