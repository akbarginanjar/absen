@extends('layouts.member')
@section('content')
    @php
        use Illuminate\Support\Carbon;
    @endphp
    <div>
        <div class="container py-5 mb-5">
            <section id="recent-blog-posts" class="recent-blog-posts">

                <div class="container" data-aos="fade-up">
                    <header class="section-header">
                        <p>Artikel</p>
                    </header>
                    <div class="row">
                        @foreach ($artikel as $item)
                            <div class="col-lg-4 mt-3">
                                <div class="post-box">
                                    <div class="post-img"><img src="{{ $item->gambar() }}" class=""
                                            style="width: 100%; height:200px; object-fit:cover;" alt="">
                                    </div>
                                    <h3 class="post-title">{{ $item->judul }}</h3>
                                    <a href="/artikel/{{ $kategoriArtikel->slug }}/{{ $item->slug }}"
                                        class="readmore stretched-link"></a>
                                    <span class="mt-auto" style="font-size: 13px; float:bottom;"><i
                                            class="bi bi-person me-1"></i>
                                        {{ $item->user->name }}
                                        <span class="" style="float: right">
                                            <i class="bi bi-clock me-1"></i><time
                                                datetime="2020-01-01">{{ Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</time></span>
                                    </span>
                                    </span>
                                </div>
                                {{-- <div class="post-box">
                                <div class="post-img"><img src="{{ $item->cover() }}" style="width: 100%"
                                        alt="">
                                </div>
                                <h3 class="post-title">{{ $item->nama }}</h3>
                                <a href="artikel/{{ $item->slug }}"
                                    class="readmore stretched-link mt-auto float-right"
                                    style="float: right"><span>Lihat</span><i class="bi bi-arrow-right"></i></a>
                            </div> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
                <center>
                    {!! $artikel->links() !!}
                </center>
            </section>
        </div>
    </div>
@endsection
