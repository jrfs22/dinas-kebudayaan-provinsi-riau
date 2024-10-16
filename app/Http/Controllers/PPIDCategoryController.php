<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\PPIDCategoryModel;

class PPIDCategoryController extends Controller
{
    public function index()
    {
        $categories = PPIDCategoryModel::all();
        return view('after-login.ppid.category', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:ppid_category,name',
                'type' => 'required'
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.unique' => 'Nama Kategori sudah ada',
                'type.required' => 'Tipe tidak boleh kosong',
            ]);

            PPIDCategoryModel::create($request->all());

            $this->alert(
                'Kategori PPID',
                'Kategori PPID berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori PPID',
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
                'name' => 'required|unique:ppid_category,name,' . $id
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
            ]);

            $updateNewsCategory = PPIDCategoryModel::findOrFail($id);
            $updateNewsCategory->update($request->all());

            $this->alert(
                'Kategori PPID',
                'Kategori PPID berhasil diubah.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori PPID',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }
    public function destroy(string $id)
    {
        try {
            $category = PPIDCategoryModel::findOrFail($id);

            $category->delete();

            $this->alert(
                'Kategori PPID',
                'Kategori PPID berhasil dihapus.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori PPID tidak berhasil dihapus.',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
