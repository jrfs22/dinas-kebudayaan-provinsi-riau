<?php

namespace App\Http\Controllers;

use Exception;
use App\Traits\ManageFiles;
use App\Models\ArticleModel;
use Illuminate\Http\Request;
use App\Models\ArticleCategoryModel;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    use ManageFiles;
    public function index()
    {
        if (Auth::check()) {
            if (isSuperAdmin()) {
                $article = ArticleModel::with('category')->get();

                $categories = ArticleCategoryModel::all();
            } else {
                $article = ArticleModel::whereHas('category', function ($query) {
                    $query->where('departement_id', auth()->user()->departement_id);
                })->with('category')->get();

                $categories = ArticleCategoryModel::where('departement_id', auth()->user()->departement_id)->get();
            }

            return view('after-login.article.index', compact('article', 'categories'));
        } else {
            $article = ArticleModel::with('category')->paginate(3);

            return view('before-login.article.list', compact('article'));
        }
    }

    public function create()
    {
        if(isSuperAdmin()) {
            $categories = ArticleCategoryModel::all();
        } else {
            $categories = ArticleCategoryModel::where('departement_id', auth()->user()->departement_id)->get();
        }

        return view('after-login.article.create', compact('categories'));
    }

    public function show(string $slug, string $time)
    {
        try {
            $slug = $slug . '/' . $time;

            $article = ArticleModel::with('category.departement')->where('slug' ,$slug)->first();

            $articleCategories = ArticleCategoryModel::whereHas('article')->get();

            $recent = ArticleModel::where('slug', '!=', $slug)->orderBy('date', 'desc')->take(3)->get();

            return view('before-login.detail.article', compact(
                'article', 'articleCategories', 'recent'
            ));
        } catch (Exception $e) {
            return redirect()->route('beranda');
        }
    }

    public function search(Request $request)
    {
        try {
            $query = $request->input('search');

            $request->validate([
                'search' => 'required|string|min:1',
            ]);

            $article = ArticleModel::where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('summary', 'LIKE', "%{$query}%")
                    ->orWhere('content', 'LIKE', "%{$query}%");
            })->first();

            return redirect()->route('article.detail', ['slug' => $article->slug]);
        } catch (Exception $e) {
            $this->alert(
                'Artikel',
                'Tidak ada data yang ditemukan',
                'error'
            );
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'summary' => 'required',
                'date' => 'required',
                'category_id' => 'required|exists:article_categories,id',
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

            $article = new ArticleModel();

            $article->fill($request->only([
                'title',
                'summary',
                'date',
                'category_id',
                'content'
            ]));

            $article->user_id = auth()->user()->id;

            $article->image_path = $this->storeFile(
                $request->image_path,
                'images/article'
            );

            $article->cover_image_path = $this->storeFile(
                $request->cover_image_path,
                'images/article/cover'
            );

            $article->hashtags = $this->parseToJson($request->hashtags);

            $article->save();

            $this->alert(
                'Berita berhasil ditambahkan.',
                '',
                'success'
            );
            return redirect()->route('article');
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
                $categories = ArticleCategoryModel::all();
            } else {
                $categories = ArticleCategoryModel::where('departement_id', auth()->user()->departement_id)->get();
            }
            $article = ArticleModel::findOrFail($id);
            return view('after-login.article.edit', compact('categories', 'article'));
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
                'category_id' => 'required|exists:article_categories,id',
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

            $article = ArticleModel::findOrFail($id);

            $article->fill($request->only([
                'title',
                'summary',
                'date',
                'category_id',
                'content'
            ]));

            if($request->has('cover_image_path')) {
                $article->cover_image_path = $this->updateFile(
                    $request->cover_image_path,
                    'images/article/cover',
                    $article->cover_image_path
                );
            }

            if($request->has('image_path')) {
                $article->image_path = $this->updateFile(
                    $request->image_path,
                    'images/article',
                    $article->image_path
                );
            }

            $article->hashtags = $this->parseToJson($request->hashtags);

            $article->update();

            $this->alert(
                'Perubahan berhasil dilakukan.',
                '',
                'success'
            );
            return redirect()->route('article');
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
            $article = ArticleModel::findOrFail($id);
            $article->delete();

            $this->deleteFile($article->image_path);

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
