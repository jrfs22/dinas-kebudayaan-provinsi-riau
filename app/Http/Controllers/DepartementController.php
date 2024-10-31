<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\DepartementModel;

class DepartementController extends Controller
{
    public function index()
    {
        $departement = DepartementModel::whereNot('name', 'Disbud')->get();

        return view('after-login.pengguna.departement', compact('departement'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:departement,name',
            ], [
                'name.required' => 'Nama Departement tidak boleh kosong',
                'name.unique' => 'Nama Departement sudah ada',
            ]);

            DepartementModel::create($request->all());

            $this->alert(
                'Departement agenda',
                'Departement agenda berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Departement agenda',
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
                'name' => 'required|unique:departement,name,' . $id,
            ], [
                'name.required' => 'Nama Departement tidak boleh kosong',
                'name.unique' => 'Nama Departement sudah ada',
            ]);

            $updateAgendaCategory = DepartementModel::findOrFail($id);
            $updateAgendaCategory->update($request->all());

            $this->alert(
                'Departement agenda',
                'Departement agenda berhasil diubah.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Departement agenda',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }
    public function destroy(string $id)
    {
        try {
            $category = DepartementModel::findOrFail($id);

            $category->delete();

            $this->alert(
                'Departement agenda',
                'Departement agenda berhasil dihapus.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Departement agenda tidak berhasil dihapus.',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
