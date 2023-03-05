@php
    use App\Models\Tb_kategori_artikel;
    $kategoriArtikel = Tb_kategori_artikel::paginate(9);
@endphp
<div>
    <div class="container py-5 mb-2">
        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">
                <div class="row">
                    @foreach ($kategoriArtikel as $item)
                        <div class="col-lg-4">
                            <div class="post-box">
                                <div class="post-img"><img src="{{ $item->cover() }}" style="width: 100%" alt="">
                                </div>
                                <h3 class="post-title">{{ $item->nama }}</h3>
                                <a href="artikel/{{ $item->slug }}"
                                    class="readmore stretched-link mt-auto float-right"
                                    style="float: right"><span>Lihat</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <center>
                {!! $kategoriArtikel->links() !!}
            </center>
        </section>
    </div>
</div>
