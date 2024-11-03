<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\DepartementModel;
use App\Models\GalleryCategoryModel;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategoryModel::with('departement')->get();

        $departement = DepartementModel::whereNot('name', 'Disbud')->get();

        return view('after-login.gallery.category', compact('categories', 'departement'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:gallery_categories,name',
                'departement_id' => 'required|exists:departement,id'
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.unique' => 'Nama Kategori sudah ada',
                'departement_id.required' => 'Departement ID harus ada',
                'departement_id.exists' => 'Departement ID tidak sesuai',
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
                'name' => 'required|unique:news_categories,name,' . $id,
                'departement_id' => 'required|exists:departement,id'
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.unique' => 'Nama Kategori sudah ada',
                'departement_id.required' => 'Departement ID harus ada',
                'departement_id.exists' => 'Departement ID tidak sesuai',
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
