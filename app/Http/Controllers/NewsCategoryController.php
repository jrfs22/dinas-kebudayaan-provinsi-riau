<?php

namespace App\Http\Controllers;

use App\Models\DepartementModel;
use Exception;
use Illuminate\Http\Request;
use App\Models\NewsCategoryModel;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Traits\ManageRolesAndPermissionTrait;

class NewsCategoryController extends Controller
{
    use ManageRolesAndPermissionTrait;

    public function index()
    {
        $categories = NewsCategoryModel::with('departement')->get();

        $departement = DepartementModel::whereNot('name', 'Disbud')->get();

        return view('after-login.news.category', compact('categories', 'departement'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:news_categories,name',
                'departement_id' => 'required|exists:departement,id'
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.unique' => 'Nama Kategori sudah ada',
                'departement_id.required' => 'Departement ID harus ada',
                'departement_id.exists' => 'Departement ID tidak sesuai',
            ]);

            $category = NewsCategoryModel::create($request->all());

            $this->alert(
                'Kategori Berita',
                'Kategori Berita berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori Berita',
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
                'Kategori Berita',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }
    public function destroy(string $id)
    {
        try {
            $category = NewsCategoryModel::findOrFail($id);

            if($category->news()->exists()) {
                $this->alert(
                    'Kategori Berita',
                    'Kategori ini memiliki berita, hapus terlebih dahulu berita yang berkategori ' . $category->name,
                    'error'
                );
            } else {
                $category->delete();

                $this->alert(
                    'Kategori Berita',
                    'Kategori Berita berhasil dihapus.',
                    'success'
                );
            }

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
