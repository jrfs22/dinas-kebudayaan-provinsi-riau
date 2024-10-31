<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\DepartementModel;
use App\Models\AgendaCategoryModel;

class AgendaCategoryController extends Controller
{
    public function index()
    {
        $categories = AgendaCategoryModel::all();

        $departement = DepartementModel::whereNot('name', 'Disbud')->get();

        return view('after-login.agenda.category', compact('categories', 'departement'));
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

            AgendaCategoryModel::create($request->all());

            $this->alert(
                'Kategori agenda',
                'Kategori agenda berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori agenda',
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

            $updateAgendaCategory = AgendaCategoryModel::findOrFail($id);
            $updateAgendaCategory->update($request->all());

            $this->alert(
                'Kategori agenda',
                'Kategori agenda berhasil diubah.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori agenda',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }
    public function destroy(string $id)
    {
        try {
            $category = AgendaCategoryModel::findOrFail($id);

            if($category->agenda()->exists()) {
                $this->alert(
                    'Kategori agenda',
                    'Kategori ini memiliki agenda, hapus terlebih dahulu agenda yang berkategori ' . $category->name,
                    'error'
                );
            } else {
                $category->delete();

                $this->alert(
                    'Kategori agenda',
                    'Kategori agenda berhasil dihapus.',
                    'success'
                );
            }

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kategori agenda tidak berhasil dihapus.',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
