<?php

namespace App\Http\Controllers;

use App\Models\Tb_artikel;
use App\Models\Tb_galeri;
use App\Models\Tb_kategori_artikel;
use App\Models\Tb_kategori_galeri;
use App\Models\Tb_konten;
use App\Models\Tb_menu;
use App\Models\Tb_slide;
use App\Models\Tb_submenu;
use App\Models\Produk;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome()
    {
        $slide = Tb_slide::all();
        return view('welcome', compact('slide'));
    }

    public function menu(Tb_menu $tb_menu)
    {
        $menu = Tb_menu::find($tb_menu->id);
        $slide = Tb_slide::all();
        $kategoriGaleri = Tb_kategori_galeri::all();
        return view('member.menu', compact('menu', 'slide', 'kategoriGaleri'));
    }

    public function submenu(Tb_submenu $tb_submenu)
    {
        $submenu = Tb_submenu::find($tb_submenu->id);
        $slide = Tb_slide::all();
        $kategoriGaleri = Tb_kategori_galeri::all();
        return view(
            'member.submenu',
            compact('submenu', 'slide', 'kategoriGaleri')
        );
    }

    public function galeri(Tb_kategori_galeri $tb_kategori_galeri)
    {
        $kategoriGaleri = Tb_kategori_galeri::find($tb_kategori_galeri->id);
        $galeri = Tb_galeri::where(
            'id_kategori_galeri',
            $tb_kategori_galeri->id
        )->get();
        return view('member.galeri', compact('kategoriGaleri', 'galeri'));
    }

    public function artikel(Tb_kategori_artikel $tb_kategori_artikel)
    {
        $kategoriArtikel = Tb_kategori_artikel::find($tb_kategori_artikel->id);
        $artikel = Tb_artikel::where(
            'id_kategori_artikel',
            $tb_kategori_artikel->id
        )->paginate(9);
        return view('member.artikel', compact('kategoriArtikel', 'artikel'));
    }

    public function artikelDetail($tb_kategori_artikel, Tb_artikel $tb_artikel)
    {
        $artikel = Tb_artikel::find($tb_artikel->id);
        $artikels = Tb_artikel::inRandomOrder()
            ->limit(8)
            ->get();
        $kategoriArtikel = Tb_kategori_artikel::all();
        return view(
            'member.artikel-detail',
            compact('artikel', 'artikels', 'kategoriArtikel')
        );
    }
    public function produkDetail(Produk $produk)
    {
        $produk = Produk::find($produk->id);
        $produks = Produk::inRandomOrder()
            ->limit(8)
            ->get();
        return view('member.produk-detail', compact('produk', 'produks'));
    }
}