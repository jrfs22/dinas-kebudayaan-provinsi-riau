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
                'name' => 'required',
                'image_path' => 'required|mimes:jpeg,jpg,png|max:4098',
                'total' => 'required',
                'jenis' => 'required',
                'klasifikasi_category_id' => 'required|exists:klasifikasi_categories,id',
            ], [
                'name.required' => 'Nama Kegiatan tidak boleh kosong',
                'klasifikasi_category_id.required' => 'Kategori berita harus ada.',
                'klasifikasi_category_id.exists' => 'Kategori berita tidak sesuai.',
                'total.required' => 'Jumlah harus ada',
                'jenis.required' => 'Jenis harus ada',
                'image_path.required' => 'Gambar Cover berita harus ada',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
            ]);

            $klasifikasi = new KlasifikasiModel();

            $klasifikasi->fill($request->only([
                'name',
                'total',
                'jenis',
                'klasifikasi_category_id'
            ]));

            $klasifikasi->image_path = $this->storeFile(
                $request->image_path,
                'images/klasifikasi'
            );

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
                'name' => 'required',
                'image_path' => 'sometimes|mimes:jpeg,jpg,png|max:4098',
                'jenis' => 'required',
                'total' => 'required',
                'klasifikasi_category_id' => 'required|exists:klasifikasi_categories,id',
            ], [
                'name.required' => 'Nama Kegiatan tidak boleh kosong',
                'klasifikasi_category_id.required' => 'Kategori berita harus ada.',
                'klasifikasi_category_id.exists' => 'Kategori berita tidak sesuai.',
                'jenis.required' => 'Jenis harus ada',
                'total.required' => 'Total harus ada',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
            ]);

            $klasifikasi = KlasifikasiModel::findOrFail($id);

            $klasifikasi->fill($request->only([
                'name',
                'total',
                'jenis',
                'klasifikasi_category_id'
            ]));

            if ($request->has('image_path')) {
                $klasifikasi->image_path = $this->updateFile(
                    $request->image_path,
                    'images/klasifikasi',
                    $klasifikasi->image_path
                );
            }

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

            $this->deleteFile($klasifikasi->image_path);

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
