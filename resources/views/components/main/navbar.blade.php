{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-white" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landingpage') }}"><img
                src="{{ asset('assets/images/logo/navbar-brand.jpg') }}" alt="" style="width: 40px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link active nav-menu" href="{{ route('landingpage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link nav-menu">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="btn primary-btn btn-donate-now text-white nav-link" href="{{ route('formulir.pendaftaran') }}">Donor
                        Sekarang</a>
                </li>
                <li class="nav-item">
                    <a class="btn primary-btn-outline btn-looking-for-donors nav-link" href="{{ route('cari.pendonor') }}">Cari
                        Pendonor</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{-- End Of Navbar --}}
