<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\KlasifikasiCategoryModel;

class KlasifikasiCategoryController extends Controller
{
    public function index()
    {
        $categories = KlasifikasiCategoryModel::all();

        return view('after-login.klasifikasi.category', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:klasifikasi_categories,name'
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.unique' => 'Nama Kategori sudah ada',
            ]);

            KlasifikasiCategoryModel::create($request->all());

            $this->alert(
                'Kategori Klasifikasi',
                'Kategori Klasifikasi berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori Klasifikasi',
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
                'name' => 'required|unique:klasifikasi_categories,name,' . $id
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
            ]);

            $updateKlasifikasiCategory = KlasifikasiCategoryModel::findOrFail($id);
            $updateKlasifikasiCategory->update($request->all());

            $this->alert(
                'Kategori Klasifikasi',
                'Kategori Klasifikasi berhasil diubah.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori Klasifikasi',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }
    public function destroy(string $id)
    {
        try {
            $category = KlasifikasiCategoryModel::findOrFail($id);

            $category->delete();

            $this->alert(
                'Kategori Klasifikasi',
                'Kategori Klasifikasi berhasil dihapus.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori Klasifikasi tidak berhasil dihapus.',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
