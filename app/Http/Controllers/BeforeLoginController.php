<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use App\Models\AgendaModel;
use App\Models\ContentModel;
use Illuminate\Http\Request;
use App\Models\NewsCategoryModel;
use App\Models\AgendaCategoryModel;
use Illuminate\Support\Facades\Cache;

class BeforeLoginController extends Controller
{
    public function kontak()
    {
        return view('before-login.kontak');
    }

    public function beranda()
    {
        $newsCategories = NewsCategoryModel::whereHas('news')->get();

        $newsCategory = NewsCategoryModel::whereIn('name', [
            'UPT Museum', 'Museum', 'museum'
        ])->first();

        if(isset($newsCategory)) {
            $news = NewsModel::with('category')->where('category_id', '!=', $newsCategory->id)->get();

            $museumNews = NewsModel::where('category_id',optional($newsCategory)->id)->take(3)->get();

        } else {
            $news = NewsModel::with('category')->get();

            $museumNews = null;
        }

        $agendaCategory = AgendaCategoryModel::whereIn('name', [
            'UPT Museum', 'Museum', 'museum'
        ])->first();

        if(isset($agendaCategory)) {
            $agenda = AgendaModel::where('agenda_category_id', '!=', $agendaCategory->id)->get();
        } else {
            $agenda = null;
        }

        $content = new ContentModel();

        list($heroDescription, $heroMainImage, $heroSecondaryImage, $aboutMainImage, $aboutThumnailImage, $aboutYt, $sitari) = $this->berandaLayout();

        return view('before-login.beranda', compact(
            'newsCategories', 'news', 'agenda', 'museumNews', 'heroDescription', 'heroMainImage', 'heroSecondaryImage', 'aboutMainImage', 'aboutThumnailImage', 'aboutYt', 'sitari'
        ));
    }

    public function berandaLayout()
    {
        $content = new ContentModel();

        $heroDescription = Cache::rememberForever('hero-deskripsi', function () use ($content) {
            return $content->where('category', 'hero-deskripsi')->first()->content;
        });

        $heroMainImage = Cache::rememberForever('hero-main-image', function () use ($content) {
            return $content->where('category', 'hero-main-image')->first()->image_path;
        });

        $heroSecondaryImage = Cache::rememberForever('hero-secondary-image', function () use ($content) {
            return $content->where('category', 'hero-secondary-image')->first()->image_path;
        });

        $aboutMainImage = Cache::rememberForever('tentang-kami-gambar-utama', function () use ($content) {
            return $content->where('category', 'tentang-kami-gambar-utama')->first()->image_path;
        });

        $aboutThumnailImage = Cache::rememberForever('tentang-kami-gambar-thumnail', function () use ($content) {
            return $content->where('category', 'tentang-kami-gambar-thumnail')->first()->image_path;
        });

        $aboutYt = Cache::rememberForever('tentang-kami-channel-yt', function () use ($content) {
            return $content->where('category', 'tentang-kami-channel-yt')->first()->url_path;
        });

        $sitari = Cache::rememberForever('sitari', function () use ($content) {
            return $content->where('category', 'sitari')->first();
        });

        return [$heroDescription, $heroMainImage, $heroSecondaryImage, $aboutMainImage, $aboutThumnailImage, $aboutYt, $sitari];
    }

    public function museum()
    {
        $category = AgendaCategoryModel::whereIn('name', [
            'UPT Museum', 'Museum', 'museum'
        ])->first();

        $newsCategory = NewsCategoryModel::whereIn('name', [
            'UPT Museum', 'Museum', 'museum'
        ])->first();

        $museumNews = NewsModel::where('category_id',optional($newsCategory)->id)->take(3)->get();

        if(isset($category)) {
            $agenda = AgendaModel::where('agenda_category_id', $category->id)->get();
        } else {
            $agenda = AgendaModel::with('category')->get();
        }

        list($aboutMuseumMainImage, $aboutMuseumThumnailImage, $aboutMuseumYt, $aboutMuseumDescription, $aboutMuseumBackground, $klasifikasi) = $this->museumLayout();

        return view('before-login.museum.museum', compact('agenda', 'museumNews', 'aboutMuseumMainImage',     'aboutMuseumThumnailImage', 'aboutMuseumYt', 'aboutMuseumDescription', 'aboutMuseumBackground','klasifikasi'
        ));
    }

    public function museumLayout()
    {
        $content = new ContentModel();

        $aboutMuseumMainImage = Cache::rememberForever('upt-museum-gambar-utama', function () use ($content) {
            return $content->where('category', 'upt-museum-gambar-utama')->first()->image_path;
        });

        $aboutMuseumDescription = Cache::rememberForever('upt-museum-deskripsi', function () use ($content) {
            return $content->where('category', 'upt-museum-deskripsi')->first()->content;
        });

        $aboutMuseumBackground = Cache::rememberForever('upt-museum-background', function () use ($content) {
            return $content->where('category', 'upt-museum-background')->first()->image_path;
        });

        $aboutMuseumThumnailImage = Cache::rememberForever('upt-museum-gambar-thumnail', function () use ($content) {
            return $content->where('category', 'upt-museum-gambar-thumnail')->first()->image_path;
        });

        $aboutMuseumYt = Cache::rememberForever('upt-museum-channel-yt', function () use ($content) {
            return $content->where('category', 'upt-museum-channel-yt')->first()->url_path;
        });

        $klasifikasi = Cache::rememberForever('klasifikasi', function () use ($content) {
            return $content->where('category', 'upt-museum-klasifikasi')->first();
        });

        return [$aboutMuseumMainImage, $aboutMuseumThumnailImage, $aboutMuseumYt, $aboutMuseumDescription, $aboutMuseumBackground, $klasifikasi];
    }

    public function klasifikasi()
    {
        return view('before-login.museum.klasifikasi');
    }
}
