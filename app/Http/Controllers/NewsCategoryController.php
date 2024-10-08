<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\NewsCategoryModel;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategoryModel::all();

        return view('after-login.news.category', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:news_categories,name'
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.unique' => 'Nama Kategori sudah ada',
            ]);

            NewsCategoryModel::create($request->all());

            $this->alert(
                'Kategori Berita',
                'Kategori Berita berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori Berita tidak berhasil ditambahkan.',
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
                'name' => 'required|unique:news_categories,name'
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.unique' => 'Nama Kategori sudah ada',
            ]);

            $updateNewsCategory = NewsCategoryModel::findOrFail($id);
            $updateNewsCategory->update($request->all());

            $this->alert(
                'Kategori Berita',
                'Kategori Berita berhasil diubah.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori Berita tidak berhasil diubah.',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $news = NewsCategoryModel::findOrFail($id);
            $news->delete();

            $this->alert(
                'Kategori Berita',
                'Kategori Berita berhasil dihapus.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori Berita tidak berhasil dihapus.',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
