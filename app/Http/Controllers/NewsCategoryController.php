<?php

namespace App\Http\Controllers;

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
        $categories = NewsCategoryModel::all();

        $roles = Role::where('name', '!=', 'super-admin')->get();

        return view('after-login.news.category', compact('categories', 'roles'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:news_categories,name',
                'roles' => 'sometimes|exists:roles,id'
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.unique' => 'Nama Kategori sudah ada',
                'roles.exists' => 'Hak Akses tidak ditemukan',
            ]);

            $category = NewsCategoryModel::create($request->all());

            // if ($category) {
            //     if ($request->has('roles')) {
            //         $permission = Permission::create(['name' => "view news " . $request->name]);

            //         foreach ($request->roles as $item) {
            //             $role = Role::findById($item);
            //             $role->givePermissionTo($permission);
            //         }
            //     }
            // }

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
                'name' => 'required|unique:news_categories,name',
                'roles' => 'required'
            ], [
                'name.required' => 'Nama Kategori tidak boleh kosong',
                'name.unique' => 'Nama Kategori sudah ada',
                'roles.required' => 'Hak Akses harus di pilih',
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
