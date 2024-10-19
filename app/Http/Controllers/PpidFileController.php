<?php

namespace App\Http\Controllers;

use App\Models\PPIDModel;
use App\Traits\ManageFiles;
use Exception;
use Illuminate\Http\Request;
use App\Models\PpidFilesModel;

class PpidFileController extends Controller
{
    use ManageFiles;
    public function index(string $id)
    {
        try {
            $files = PpidFilesModel::where('ppid_id', $id)->get();

            $ppid = PPIDModel::findOrFail($id);

            return view('after-login.ppid.files', compact('files', 'id', 'ppid'));
        } catch (Exception $e) {
            $this->alert(
                'Kategori Berita',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'file_name' => 'required',
                'file_number' => 'sometimes',
                'release_date' => 'required',
                'ppid_id' => 'required|exists:ppid,id',
                'file_path' => 'required|mimes:pdf,word,xlxs,png,jpg,jpeg,docx|max:5120',
            ], [
                'file_name.required' => 'Nama File tidak boleh kosong.',
                'release_date.required' => 'Tanggal Rilis tidak boleh kosong.',
                'ppid_id.required' => 'PPID tidak boleh kosong.',
                'ppid_id.exists' => 'PPID tidak sesuai.',
                'file_path.required' => 'File tidak boleh kosong.',
                'file_path.mimes' => 'Hanya menerima file berekstensi PDF, WORD, XLXS, DOCX, PNG, JPG & JPEG',
                'file_path.max' => 'Maksimal File berukuran 5mb'
            ]);

            $files = new PpidFilesModel();

            $files->fill($request->only([
                'file_name',
                'file_number',
                'release_date',
                'ppid_id'
            ]));

            $files->file_path = $this->storeFile(
                $request->file_path,
                'images/files'
            );

            $files->save();

            $this->alert(
                'File berhasil ditambahkan.',
                '',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'File tidak berhasil ditambahkan.',
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
                'file_name' => 'required',
                'file_number' => 'sometimes',
                'release_date' => 'required',
                'ppid_id' => 'required|exists:ppid,id',
                'file_path' => 'sometimes|mimes:pdf,word,xlxs,png,jpg,jpeg,docx|max:5120',
            ], [
                'file_name.required' => 'Nama File tidak boleh kosong.',
                'release_date.required' => 'Tanggal Rilis tidak boleh kosong.',
                'ppid_id.required' => 'PPID tidak boleh kosong.',
                'ppid_id.exists' => 'PPID tidak sesuai.',
                'file_path.mimes' => 'Hanya menerima file berekstensi PDF, WORD, XLXS, DOCX, PNG, JPG & JPEG',
                'file_path.max' => 'Maksimal File berukuran 5mb'
            ]);

            $files = PpidFilesModel::findOrFail($id);

            $files->fill($request->only([
                'file_name',
                'file_number',
                'release_date',
                'ppid_id'
            ]));

            if($request->has('file_path')) {
                $files->file_path = $this->updateFile(
                    $request->file_path,
                    'files',
                    $files->file_path
                );
            }

            $files->update();

            $this->alert(
                'Perubahan berhasil dilakukan.',
                '',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Perubahan tidak berhasil dilakukan.',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $file = PpidFilesModel::findOrFail($id);
            $file->delete();

            $this->deleteFile($file->file_path);

            $this->alert(
                'Files',
                'Berhasil menghapus Files.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Files',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }

    public function parseToJson($data)
    {
        return json_encode(collect(json_decode($data))->pluck('value')->toArray());
    }
}
