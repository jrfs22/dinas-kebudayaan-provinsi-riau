<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use App\Traits\ManageFiles;
use Exception;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use ManageFiles;
    public function index()
    {
        $news = NewsModel::all();
        return view('after-login.news.index', compact('news'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|max:50',
                'slug' => 'required|max:75',
                'date' => 'required',
                'image_path' => 'required|mimes:jpeg,jpg,png|max:512',
                'content' => 'required'
            ], [
                'title.required' => 'Judul berita harus ada',
                'title.max' => 'Judul berita maksimal 50 kata',
                'slug.required' => 'Ringakasan Berita harus ada',
                'slug.max' => 'Ringkasan maksimal 75 kata',
                'date.required' => 'Tanggal harus ada',
                'image_path.required' => 'Gambar berita harus ada',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'content.required' => 'Isi berita harus ada'
            ]);

            $news = NewsModel::create($request->all());
            $news->image_path = $this->storeFile(
                $request->image_path,
                'images/news'
            );
            $news->save();

            $this->alert(
                'Berita berhasil ditambahkan.',
                '',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Berita tidak berhasil ditambahkan.',
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
                'slug' => 'required|max:75',
                'date' => 'required',
                'image_path' => 'sometimes|mimes:jpeg,jpg,png|max:512',
                'content' => 'required'
            ], [
                'title.required' => 'Judul berita harus ada',
                'title.max' => 'Judul berita maksimal 50 kata',
                'slug.required' => 'Ringakasan Berita harus ada',
                'slug.max' => 'Ringkasan maksimal 75 kata',
                'date.required' => 'Tanggal harus ada',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'image_path.max' => 'Maksimal file berukuran 512kb',
                'content.required' => 'Isi berita harus ada'
            ]);

            $news = NewsModel::findOrFail($id);

            $news->fill($request->only([
                'title',
                'slug',
                'date',
                'content'
            ]));

            $news->image_path = $this->updateFile(
                $request->image_path,
                'news',
                $news->image_path
            );
            
            $news->update();

            $this->alert(
                'Perubahan berhasil dilakukan.',
                '',
                'success'
            );
            return redirect()->back();
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
}
