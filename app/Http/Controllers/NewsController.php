<?php

namespace App\Http\Controllers;

use App\Models\NewsCategoryModel;
use App\Models\NewsModel;
use App\Traits\ManageFiles;
use Exception;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use ManageFiles;
    public function index()
    {
        if (isSuperAdmin()) {
            $news = NewsModel::with('category')->get();

            $categories = NewsCategoryModel::all();
        } else {
            $news = NewsModel::whereHas('category', function ($query) {
                $query->where('departement_id', auth()->user()->departement_id);
            })->with('category')->get();

            $categories = NewsCategoryModel::where('departement_id', auth()->user()->departement_id)->get();
        }

        return view('after-login.news.index', compact('news', 'categories'));
    }

    public function create()
    {
        if(isSuperAdmin()) {
            $categories = NewsCategoryModel::all();
        } else {
            $categories = NewsCategoryModel::where('departement_id', auth()->user()->departement_id)->get();
        }

        return view('after-login.news.create', compact('categories'));
    }

    public function show($time, $slug)
    {
        try {
            $slug = $time . '/' . $slug;

            $news = NewsModel::with('category.departement')->where('slug' ,$slug)->first();

            $newsCategories = NewsCategoryModel::all();

            return view('before-login.detail.news', compact(
                'news', 'newsCategories'
            ));
        } catch (Exception $e) {
            return redirect()->route('beranda');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'summary' => 'required',
                'date' => 'required',
                'category_id' => 'required|exists:news_categories,id',
                'image_path' => 'required|mimes:jpeg,jpg,png|max:4096',
                'cover_image_path' => 'required|mimes:jpeg,jpg,png|max:4096',
                'content' => 'required',
                'hashtags' => 'required'
            ], [
                'title.required' => 'Judul berita harus ada',
                'summary.required' => 'Ringakasan Berita harus ada',
                'category_id.required' => 'Kategori berita harus ada.',
                'category_id.exists' => 'Kategori berita tidak sesuai.',
                'date.required' => 'Tanggal harus ada',
                'cover_image_path.required' => 'Gambar Cover berita harus ada',
                'cover_image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'image_path.required' => 'Gambar berita harus ada',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'cover_image_path.max' => 'Maksimal ukuran cover gambar adalah 4MB',
                'image_path.max' => 'Maksimal ukuran gambar berita 4MB',
                'content.required' => 'Isi berita harus ada',
                'hashtags.required' => 'Hastag harus di isi.'
            ]);

            $news = new NewsModel();

            $news->fill($request->only([
                'title',
                'summary',
                'date',
                'category_id',
                'content'
            ]));

            $news->user_id = auth()->user()->id;

            $news->image_path = $this->storeFile(
                $request->image_path,
                'images/main/news'
            );

            $news->cover_image_path = $this->storeFile(
                $request->cover_image_path,
                'images/cover/news/cover'
            );

            $news->hashtags = $this->parseToJson($request->hashtags);

            $news->save();

            $this->alert(
                'Berita berhasil ditambahkan.',
                '',
                'success'
            );
            return redirect()->route('news');
        } catch (Exception $e) {
            $this->alert(
                'Berita tidak berhasil ditambahkan.',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function edit(string $id)
    {
        try {
            if(isSuperAdmin()) {
                $categories = NewsCategoryModel::all();
            } else {
                $categories = NewsCategoryModel::where('departement_id', auth()->user()->departement_id)->get();
            }
            $news = NewsModel::findOrFail($id);
            return view('after-login.news.edit', compact('categories', 'news'));
        } catch (Exception $e) {
            $this->alert(
                'Terjadi kesalahan',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'title' => 'required|max:50',
                'summary' => 'required|max:75',
                'date' => 'required',
                'category_id' => 'required|exists:news_categories,id',
                'image_path' => 'sometimes|mimes:jpeg,jpg,png|max:4096',
                'cover_image_path' => 'sometimes|mimes:jpeg,jpg,png|max:4096',
                'content' => 'required',
                'hashtags' => 'required'
            ], [
                'title.required' => 'Judul berita harus ada',
                'title.max' => 'Judul berita maksimal 50 kata',
                'summary.required' => 'Ringakasan Berita harus ada',
                'summary.max' => 'Ringkasan maksimal 75 kata',
                'category_id.required' => 'Kategori berita harus ada.',
                'category_id.exists' => 'Kategori berita tidak sesuai.',
                'date.required' => 'Tanggal harus ada',
                'cover_image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'cover_image_path.max' => 'Maksimal ukuran cover gambar adalah 4MB',
                'image_path.max' => 'Maksimal ukuran gambar berita 4MB',
                'content.required' => 'Isi berita harus ada',
                'hashtags.required' => 'Hastag harus di isi.'
            ]);

            $news = NewsModel::findOrFail($id);

            $news->fill($request->only([
                'title',
                'summary',
                'date',
                'category_id',
                'content'
            ]));

            if($request->has('cover_image_path')) {
                $news->cover_image_path = $this->updateFile(
                    $request->cover_image_path,
                    'images/cover/news',
                    $news->cover_image_path
                );
            }

            if($request->has('image_path')) {
                $news->image_path = $this->updateFile(
                    $request->image_path,
                    'images/cover/news/cover',
                    $news->image_path
                );
            }

            $news->hashtags = $this->parseToJson($request->hashtags);

            $news->update();

            $this->alert(
                'Perubahan berhasil dilakukan.',
                '',
                'success'
            );
            return redirect()->route('news');
        } catch (Exception $e) {
            $this->alert(
                'Perubahan tidak berhasil dilakukan.',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $news = NewsModel::findOrFail($id);
            $news->delete();

            $this->deleteFile($news->image_path);

            $this->alert(
                'Berita',
                'Berhasil menghapus berita.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Berita',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }

    public function parseToJson($data)
    {
        return json_encode(collect(json_decode($data))->pluck('value')->toArray());
    }
}
