<!-- Navbar Start -->
<?php
use App\Models\Tb_menu;
use App\Models\Tb_submenu;
use App\Models\Tb_setting;
$setting = Tb_setting::find(1);
$menu = Tb_menu::orderBy('urutan', 'asc')->get();
?>

<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{ $setting->judul }}" alt="Icon" style="width: 30px; height: 30px;">
            </div>
            <h1 class="m-0 text-primary">{{ $setting->icon() }}</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="index.html" class="nav-item nav-link active">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="property-list.html" class="dropdown-item">Property List</a>
                        <a href="property-type.html" class="dropdown-item">Property Type</a>
                        <a href="property-agent.html" class="dropdown-item">Property Agent</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Error</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-primary px-3 d-none d-lg-flex">Add Property</a>
        </div>
    </nav>
</div>






{{-- <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="#" class="navbar-brand ms-3 d-lg-none">
        <p class="fw-bold text-white m-0 text-uppercase"><img src="{{ $setting->icon() }}" width="40px" alt="Logo Damkar">
        </p>
    </a>
    <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav me-auto p-3 p-lg-0">
            {{-- <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active text-warning' : '' }}">Beranda</a> --}}
@foreach ($menu as $item)
    @if ($item->id_konten === 0)
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ $item->nama }}</a>
            <div class="dropdown-menu border-0 shadow rounded-0 rounded-bottom m-0">
                @php
                    $submenu = Tb_submenu::orderBy('urutan', 'asc')
                        ->where('id_menu', $item->id)
                        ->get();
                @endphp
                @foreach ($submenu as $data)
                    @if ($data->konten->link || $data->konten->link != null)
                        <a href="{{ $data->konten->link->link }}"
                            class="dropdown-item {{ Request::is('') ? 'active text-warning' : '' }}">{{ $data->nama }}</a>
                    @else
                        <a href="/s=>{{ $data->slug }}"
                            class="dropdown-item {{ Request::is('') ? 'active text-warning' : '' }}">{{ $data->nama }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    @else
        {{ $item->konten->link }}
        @if ($item->konten->link || $item->konten->link != null)
            <a href="{{ $data->konten->link->link }}"
                class="nav-item nav-link {{ Request::is('') ? 'active text-warning' : '' }}">{{ $item->nama }}</a>
        @else
            <a href="/m=>{{ $item->slug }}"
                class="nav-item nav-link {{ Request::is('/m=>saha') ? 'active text-warning' : '' }}">{{ $item->nama }}</a>
        @endif
    @endif
@endforeach
</div>
{{-- <a href="#" class="btn btn-sm btn-light rounded-pill py-2 px-4 d-none d-lg-block">Get Started</a> --}}
</div>
</nav> --}}
<!-- Navbar End -->
