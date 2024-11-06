<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\DepartementModel;
use App\Models\ArticleCategoryModel;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $categories = ArticleCategoryModel::with('departement')->get();

        $departement = DepartementModel::whereNot('name', 'Disbud')->get();

        return view('after-login.article.category', compact('categories', 'departement'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:article_categories,name',
                'departement_id' => 'required|exists:departement,id'
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.unique' => 'Nama Kategori sudah ada',
                'departement_id.required' => 'Departement ID harus ada',
                'departement_id.exists' => 'Departement ID tidak sesuai',
            ]);

            $category = ArticleCategoryModel::create($request->all());

            $this->alert(
                'Kategori Artikel',
                'Kategori Artikel berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori Artikel',
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
                'name' => 'required|unique:article_categories,name,' . $id,
                'departement_id' => 'required|exists:departement,id'
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.unique' => 'Nama Kategori sudah ada',
                'departement_id.required' => 'Departement ID harus ada',
                'departement_id.exists' => 'Departement ID tidak sesuai',
            ]);

            $updatearticleCategory = ArticleCategoryModel::findOrFail($id);
            $updatearticleCategory->update($request->all());

            $this->alert(
                'Kategori Artikel',
                'Kategori Artikel berhasil diubah.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori Artikel',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }
    public function destroy(string $id)
    {
        try {
            $category = ArticleCategoryModel::findOrFail($id);

            if($category->article()->exists()) {
                $this->alert(
                    'Kategori Artikel',
                    'Kategori ini memiliki Artikel, hapus terlebih dahulu Artikel yang berkategori ' . $category->name,
                    'error'
                );
            } else {
                $category->delete();

                $this->alert(
                    'Kategori Artikel',
                    'Kategori Artikel berhasil dihapus.',
                    'success'
                );
            }

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori Artikel tidak berhasil dihapus.',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
