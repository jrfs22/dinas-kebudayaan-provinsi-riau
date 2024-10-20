<?php

namespace App\Http\Controllers;

use App\Models\AgendaCategoryModel;
use App\Models\NewsModel;
use App\Models\AgendaModel;
use Illuminate\Http\Request;
use App\Models\NewsCategoryModel;

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

        } else {
            $news = NewsModel::with('category')->get();
        }

        $museumNews = NewsModel::where('category_id',optional($newsCategory)->id)->take(3)->get();

        $agendaCategory = AgendaCategoryModel::whereIn('name', [
            'UPT Museum', 'Museum', 'museum'
        ])->first();

        $agenda = AgendaModel::where('agenda_category_id', '!=', $agendaCategory->id)->get();

        return view('before-login.beranda', compact(
            'newsCategories', 'news', 'agenda', 'museumNews'
        ));
    }

    public function museum()
    {
        $category = AgendaCategoryModel::whereIn('name', [
            'UPT Museum', 'Museum', 'museum'
        ])->first();

        $agenda = AgendaModel::where('agenda_category_id', $category->id)->get();
        return view('before-login.museum', compact('agenda'
        ));
    }
}
