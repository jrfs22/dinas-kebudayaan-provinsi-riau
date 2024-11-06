<?php

namespace App\Http\Controllers;

use Exception;
use App\Traits\ManageFiles;
use Illuminate\Http\Request;
use App\Models\KlasifikasiModel;
use App\Models\KlasifikasiImageModel;

class KlasifikasiImageController extends Controller
{
    use ManageFiles;

    public function index(string $id)
    {
        $klasifikasi = KlasifikasiModel::findOrFail($id);

        return view('after-login.klasifikasi.klasifikasiImage', compact('klasifikasi'));
    }

    public function store(Request $request, string $id)
    {
        try {
            $klasifikasi = KlasifikasiModel::findOrFail($id);

            $request->validate([
                'image_path' => 'required|mimes:jpeg,jpg,png|max:4098',
            ], [
                'image_path.required' => 'Gambar harus diisi.',
                'image_path.mimes' => 'Hanya menerima gambar dengan ekstension (jpg, png, jpeg)',
                'image_path.max' => 'Maksimal Gambar berukuran 4Mb',
            ]);

            $klasifikasiImage = new KlasifikasiImageModel();

            $klasifikasiImage->klasifikasi_id = $klasifikasi->id;

            $klasifikasiImage->image_path = $this->storeFile(
                $request->image_path,
                'images/klasifikasi/documentation'
            );

            $klasifikasiImage->save();

            $this->alert(
                'Gambar Klasifikasi',
                'Gambar Klasifikasi berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Gambar Klasifikasi',
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
                'image_path' => 'required|mimes:jpeg,jpg,png|max:4098',
            ], [
                'image_path.required' => 'Gambar harus diisi.',
                'image_path.mimes' => 'Hanya menerima gambar dengan ekstension (jpg, png, jpeg)',
                'image_path.max' => 'Maksimal Gambar berukuran 4Mb',
            ]);

            $klasifikasiImage = KlasifikasiImageModel::findOrFail($id);

            if ($request->has('image_path')) {
                $klasifikasiImage->image_path = $this->updateFile(
                    $request->image_path,
                    'images/klasifikasi/documentation',
                    $klasifikasiImage->image_path
                );
            }

            $klasifikasiImage->save();

            $this->alert(
                'Gambar Klasifikasi',
                'Gambar Klasifikasi berhasil diubah.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Gambar Klasifikasi',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $klasifikasi = KlasifikasiImageModel::findOrFail($id);
            $klasifikasi->delete();

            $this->deleteFile($klasifikasi->image_path);

            $this->alert(
                'Gambar Klasifikasi',
                'Berhasil menghapus Gambar Klasifikasi.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Gambar Klasifikasi',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
