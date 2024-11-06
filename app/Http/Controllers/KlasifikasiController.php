<?php

namespace App\Http\Controllers;

use App\Traits\ManageFiles;
use Exception;
use Illuminate\Http\Request;
use App\Models\KlasifikasiModel;
use Illuminate\Support\Facades\Auth;
use App\Models\KlasifikasiCategoryModel;

class KlasifikasiController extends Controller
{
    use ManageFiles;
    public function index()
    {

        if (Auth::check()) {
            $galleries = KlasifikasiModel::with('category')->get();

            $categories = KlasifikasiCategoryModel::all();
            return view('after-login.klasifikasi.index', compact('galleries', 'categories'));

        } else {
            $klasifikasiByCategory = KlasifikasiCategoryModel::with('klasifikasi')->get();


            return view('before-login.museum.klasifikasi', compact('klasifikasiByCategory'));
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'klasifikasi_category_id' => 'required|exists:klasifikasi_categories,id',
            ], [
                'name.required' => 'Nama Benda tidak boleh kosong',
                'description.required' => 'Deskripsi Benda tidak boleh kosong',
                'klasifikasi_category_id.required' => 'Kategori berita harus ada.',
                'klasifikasi_category_id.exists' => 'Kategori berita tidak sesuai.',
            ]);

            $klasifikasi = new KlasifikasiModel();

            $klasifikasi->fill($request->only([
                'title',
                'description',
                'klasifikasi_category_id'
            ]));

            $klasifikasi->save();

            $this->alert(
                'klasifikasi',
                'klasifikasi berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'klasifikasi',
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
                'title' => 'required',
                'description' => 'required',
                'klasifikasi_category_id' => 'required|exists:klasifikasi_categories,id',
            ], [
                'title.required' => 'Nama Benda tidak boleh kosong',
                'description.required' => 'Deskripsi Benda tidak boleh kosong',
                'klasifikasi_category_id.required' => 'Kategori berita harus ada.',
                'klasifikasi_category_id.exists' => 'Kategori berita tidak sesuai.',
            ]);

            $klasifikasi = KlasifikasiModel::findOrFail($id);

            $klasifikasi->fill($request->only([
                'title',
                'description',
                'klasifikasi_category_id'
            ]));

            $klasifikasi->save();

            $this->alert(
                'klasifikasi',
                'klasifikasi berhasil diubah.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'klasifikasi',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $klasifikasi = KlasifikasiModel::findOrFail($id);
            $klasifikasi->delete();

            $this->alert(
                'klasifikasi',
                'Berhasil menghapus klasifikasi.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'klasifikasi',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
