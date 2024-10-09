<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\GalleryCategoryModel;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategoryModel::all();

        return view('after-login.gallery.category', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:gallery_categories,name'
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.unique' => 'Nama Kategori sudah ada',
            ]);

            GalleryCategoryModel::create($request->all());

            $this->alert(
                'Kategori Gallery',
                'Kategori Gallery berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori Gallery',
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
                'name' => 'required|unique:news_categories,name,' . $id
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
            ]);

            $updateNewsCategory = GalleryCategoryModel::findOrFail($id);
            $updateNewsCategory->update($request->all());

            $this->alert(
                'Kategori Gallery',
                'Kategori Gallery berhasil diubah.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori Gallery',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }
    public function destroy(string $id)
    {
        try {
            $category = GalleryCategoryModel::findOrFail($id);

            $category->delete();

            $this->alert(
                'Kategori Gallery',
                'Kategori Gallery berhasil dihapus.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori Gallery tidak berhasil dihapus.',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
