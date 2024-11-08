<?php

namespace App\Http\Controllers;

use App\Models\PpkdModel;
use App\Traits\ApiWilayahTrait;
use App\Traits\ManageFiles;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PpkdController extends Controller
{
    use ApiWilayahTrait, ManageFiles;
    public function index()
    {
        if (Auth::check()) {
            $ppkd = PpkdModel::all();
            return view('after-login.ppkd.index', compact('ppkd'));
        } else {
            return view('before-login.ppkd.index');
        }
    }

    public function create()
    {
        $regencies = $this->getRegencies();

        return view('after-login.ppkd.create', compact('regencies'));
    }

    public function edit(string $id)
    {
        $regencies = $this->getRegencies();

        $ppkd = PpkdModel::findOrFail($id);

        return view('after-login.ppkd.edit', compact('regencies', 'ppkd'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'regency_id' => 'required',
                'title' => 'required',
                'file_path' => 'required|mimes:pdf|max:4096',
                'status' => 'required',
                'date' => 'required'
            ], [
                'regency_id' => 'Kabupaten / Kota tidak boleh kosong.',
                'title' => 'Judul PPKD tidak boleh kosong',
                'status' => 'Status PPKD tidak boleh kosong.',
                'date' => 'Tanggal PPKD tidak boleh kosong.',
                'file_path.required' => 'File PPKD tidak boleh kosong.',
                'file_path.mimes' => 'Hanya menerima file ekstensions PDF'
            ]);

            $ppkd = new PpkdModel();

            $ppkd->fill($request->only([
                'regency_id',
                'regency_name',
                'title',
                'file_path',
                'status',
                'date'
            ]));

            $ppkd->province_id = "14";
            $ppkd->province_name = "Riau";
            $ppkd->regency_name = $this->getRegencies($request->regency_id)["name"];

            $ppkd->file_path = $this->storeFile(
                $request->file_path,
                'file/ppkd'
            );

            $ppkd->save();

            $this->alert(
                'PPKD',
                'PPKD Berhasil di tambahkan.',
                'success'
            );
            return redirect()->route('ppkd');
        } catch (Exception $e) {
            $this->alert(
                'PPKD tidak berhasil ditambahkan.',
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
                'regency_id' => 'required',
                'title' => 'required',
                'file_path' => 'sometimes|mimes:pdf|max:4096',
                'status' => 'required',
                'date' => 'required'
            ], [
                'regency_id' => 'Kabupaten / Kota tidak boleh kosong.',
                'title' => 'Judul PPKD tidak boleh kosong',
                'status' => 'Status PPKD tidak boleh kosong.',
                'date' => 'Tanggal PPKD tidak boleh kosong.',
                'file_path.mimes' => 'Hanya menerima file ekstensions PDF'
            ]);

            $ppkd = PpkdModel::findOrFail($id);

            $ppkd->fill($request->only([
                'regency_id',
                'regency_name',
                'title',
                'file_path',
                'status',
                'date'
            ]));

            $ppkd->province_id = "14";
            $ppkd->province_name = "Riau";
            $ppkd->regency_name = $this->getRegencies($request->regency_id)["name"];

            if ($request->has('file_path')) {
                $ppkd->file_path = $this->updateFile(
                    $request->file_path,
                    'file/ppkd',
                    $ppkd->file_path
                );
            }

            $ppkd->update();

            $this->alert(
                'PPKD',
                'PPKD Berhasil di ubah.',
                'success'
            );
            return redirect()->route('ppkd');
        } catch (Exception $e) {
            $this->alert(
                'PPKD tidak berhasil diubah.',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $ppkd = PpkdModel::findOrFail($id);

            if ($ppkd->delete()) {
                $this->deleteFile($ppkd->file_path);
            }

            $this->alert(
                'PPKD',
                'Berhasil menghapus PPKD.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'PPKD',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
