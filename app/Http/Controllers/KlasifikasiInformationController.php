<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\KlasifikasiModel;
use App\Models\KlasifikasiInformationModel;

class KlasifikasiInformationController extends Controller
{
    public function index(string $id)
    {
        $klasifikasi = KlasifikasiModel::findOrFail($id);

        return view('after-login.klasifikasi.klasifikasiInfo', compact('klasifikasi'));
    }

    public function store(Request $request, string $id)
    {
        try {
            $klasifikasi = KlasifikasiModel::findOrFail($id);

            $request->validate([
                'type' => 'required',
                'description' => 'required',
            ], [
                'type.required' => 'Tipe Informasi harus diisi.',
                'description.required' => 'Keterangan Informasi harus diisi.',
            ]);

            $klasifikasiInfo = new KlasifikasiInformationModel();

            $klasifikasiInfo->type = $request->type;
            $klasifikasiInfo->description = $request->description;
            $klasifikasiInfo->klasifikasi_id = $klasifikasi->id;

            $klasifikasiInfo->save();

            $this->alert(
                'Informasi Klasifikasi',
                'Informasi Klasifikasi berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Informasi Klasifikasi',
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
                'type' => 'required',
                'description' => 'required',
            ], [
                'type.required' => 'Tipe Informasi harus diisi.',
                'description.required' => 'Keterangan Informasi harus diisi.',
            ]);

            $klasifikasiInfo = KlasifikasiInformationModel::findOrFail($id);

            $klasifikasiInfo->type = $request->type;
            $klasifikasiInfo->description = $request->description;

            $klasifikasiInfo->save();

            $this->alert(
                'Informasi Klasifikasi',
                'Informasi Klasifikasi berhasil diubah.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Informasi Klasifikasi',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $klasifikasi = KlasifikasiInformationModel::findOrFail($id);
            $klasifikasi->delete();

            $this->alert(
                'Informasi Klasifikasi',
                'Berhasil menghapus Informasi Klasifikasi.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Informasi Klasifikasi',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
