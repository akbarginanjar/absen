  @php
      use App\Models\Tb_setting;
      use App\Models\Tb_menu;
      use App\Models\Tb_submenu;
      $setting = Tb_setting::find(1);
      $menu = Tb_menu::orderBy('urutan', 'asc')->get();
  @endphp
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

          <a href="/" class="logo d-flex align-items-center">
              <img src="{{ asset('assets/frontend/assets/img/logo-icommits.png') }}" alt="">&nbsp;
              <span class="">{{ $setting->judul }}</span>
          </a>

          <nav id="navbar" class="navbar">
              <ul>
                  @foreach ($menu as $item)
                      @if ($item->id_konten === 0)
                          {{-- <li class="dropdown"><a style="color: #45C818;"
                                  href="#"><span>{{ $item->nama }}</span> <i class="bi bi-chevron-down"></i></a>
                              <ul>
                                  <li>
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
                                              <a href="/s=>{{ $data->slug }}">{{ $data->nama }}</a>
                                          @endif
                                      @endforeach
                                  </li>
                              </ul>
                          </li> --}}
                      @else
                          @if ($item->konten->link || $item->konten->link != null)
                              {{-- <li>
                                  <a href="{{ $item->konten->link->link }}"
                                      class="dropdown-item {{ Request::is('') ? 'active text-warning' : '' }}">{{ $item->nama }}</a>
                              </li> --}}
                          @else
                              {{-- <li><a style="color: #45C818;" class="nav-link scrollto"
                                      href="/m=>{{ $item->slug }} ">{{ $item->nama }}</a>
                              </li> --}}
                          @endif
                      @endif
                  @endforeach
                  {{-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> --}}
              </ul>
              <i class="bi bi-list mobile-nav-toggle text-white"></i>
          </nav><!-- .navbar -->

      </div>
  </header><!-- End Header -->
