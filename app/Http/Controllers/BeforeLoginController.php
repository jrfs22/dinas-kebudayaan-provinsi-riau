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
        $museumName = ['UPT Museum', 'Museum', 'museum'];

        $newsCategories = NewsCategoryModel::whereHas('news')->whereNotIn('name', $museumName)->get();

        $newsCategory = NewsCategoryModel::whereIn('name', $museumName)->first();

        if(isset($newsCategory)) {
            $news = NewsModel::with('category')->where('category_id', '!=', $newsCategory->id)->get();
        } else {
            $news = NewsModel::with(['category.departement'])->get();
        }

        $agendaCategory = AgendaCategoryModel::whereIn('name', $museumName)->first();

        if(isset($agendaCategory)) {
            $agenda = AgendaModel::where('agenda_category_id', '!=', $agendaCategory->id)->get();
        } else {
            $agenda = null;
        }

        $content = new ContentModel();

        list($heroDescription, $heroMainImage, $heroSecondaryImage, $aboutMainImage, $aboutYt, $sitari, $categoryInformasi) = $this->berandaLayout();

        return view('before-login.beranda', compact(
            'newsCategories', 'news', 'agenda', 'heroDescription', 'heroMainImage', 'heroSecondaryImage', 'aboutMainImage', 'aboutYt', 'sitari', 'categoryInformasi'
        ));
    }

    public function berandaLayout()
    {
        $content = new ContentModel();

        $heroDescription = Cache::rememberForever('hero-deskripsi', function () use ($content) {
            return $content->publish()->where('category', 'hero-deskripsi')->first()?->content;
        });

        $heroMainImage = Cache::rememberForever('hero-main-image', function () use ($content) {
            return $content->publish()->where('category', 'hero-main-image')->first()?->image_path;
        });

        $heroSecondaryImage = Cache::rememberForever('hero-secondary-image', function () use ($content) {
            return $content->publish()->where('category', 'hero-secondary-image')->first()?->image_path;
        });

        $aboutMainImage = Cache::rememberForever('tentang-kami-gambar-utama', function () use ($content) {
            return $content->publish()->where('category', 'tentang-kami-gambar-utama')->first()?->image_path;
        });

        $aboutYt = Cache::rememberForever('tentang-kami-channel-yt', function () use ($content) {
            return $content->publish()->where('category', 'tentang-kami-channel-yt')->first()?->url_path;
        });

        $sitari = Cache::rememberForever('sitari', function () use ($content) {
            return $content->publish()->where('category', 'sitari')->first();
        });

        $categoryInformasi = Cache::rememberForever('informasi-category', function () use ($content) {
            return $content->publish()->where('category', 'informasi-category')->get();
        });

        return [$heroDescription, $heroMainImage, $heroSecondaryImage, $aboutMainImage, $aboutYt, $sitari, $categoryInformasi];
    }

    public function museum()
    {
        $museumName = ['UPT Museum', 'Museum', 'museum'];

        $category = AgendaCategoryModel::whereIn('name', $museumName)->first();

        $newsCategory = NewsCategoryModel::whereIn('name', $museumName)->first();

        $museumNews = NewsModel::where('category_id',optional($newsCategory)->id)->take(3)->get();

        if(isset($category)) {
            $agenda = AgendaModel::where('agenda_category_id', $category->id)->get();
        } else {
            $agenda = AgendaModel::with(['category'])->get();
        }

        list($aboutMuseumMainImage, $aboutMuseumYt, $aboutMuseumDescription, $aboutMuseumBackground, $klasifikasi) = $this->museumLayout();

        return view('before-login.museum.museum', compact('agenda', 'museumNews', 'aboutMuseumMainImage', 'aboutMuseumYt', 'aboutMuseumDescription', 'aboutMuseumBackground','klasifikasi'
        ));
    }

    public function museumLayout()
    {
        $content = new ContentModel();

        $aboutMuseumMainImage = Cache::rememberForever('upt-museum-gambar-utama', function () use ($content) {
            return $content->where('category', 'upt-museum-gambar-utama')->first()?->image_path;
        });

        $aboutMuseumDescription = Cache::rememberForever('upt-museum-deskripsi', function () use ($content) {
            return $content->where('category', 'upt-museum-deskripsi')->first()?->content;
        });

        $aboutMuseumBackground = Cache::rememberForever('upt-museum-background', function () use ($content) {
            return $content->where('category', 'upt-museum-background')->first()?->image_path;
        });

        $aboutMuseumYt = Cache::rememberForever('upt-museum-channel-yt', function () use ($content) {
            return $content->where('category', 'upt-museum-channel-yt')->first()?->url_path;
        });

        $klasifikasi = Cache::rememberForever('klasifikasi', function () use ($content) {
            return $content->where('category', 'upt-museum-klasifikasi')->first();
        });

        return [$aboutMuseumMainImage, $aboutMuseumYt, $aboutMuseumDescription, $aboutMuseumBackground, $klasifikasi];
    }
}
