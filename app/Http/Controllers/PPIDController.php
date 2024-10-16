<?php

namespace App\Http\Controllers;

use App\Models\PPIDCategoryModel;
use App\Models\PpidFilesModel;
use App\Models\PPIDModel;
use App\Traits\ManageFiles;
use Exception;
use Illuminate\Http\Request;

class PPIDController extends Controller
{
    use ManageFiles;
    public function index(string $id)
    {
        try {
            $ppid_category = PPIDCategoryModel::findOrFail($id);

            if($ppid_category->type === 'dokumen') {
                $ppid = PPIDModel::with([
                    'category', 'files'
                ])->where('ppid_category_id', $id)->get();

                foreach ($ppid as $item) {
                    $item->file_summary = $item->files->count();
                }
            } else {
                $ppid = PPIDModel::with('category')->where('ppid_category_id', $id)->get();
            }

            return view('after-login.ppid.index', compact('ppid_category', 'ppid'));
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
                'name' => 'required',
                'content' => 'sometimes',
                'image_path' => 'sometimes|mimes:pdf,word,xlxs,png,jpg,jpeg',
                'ppid_category_id' => 'required|exists:ppid_category,id'
            ], [
                'name.required' => 'Nama PPID tidak boleh kosong.',
                'image_path.mimes' => 'Hanya menerima file berekstensi PDF, WORD, XLXS, PNG, JPG & JPEG'
            ]);

            $ppid = new PPIDModel();

            $ppid->fill($request->only([
                'name',
                'content',
                'ppid_category_id'
            ]));

            if ($request->has('image_path')) {
                $ppid->image_path = $this->storeFile(
                    $request->image_path,
                    'images/ppid'
                );
            }

            $ppid->save();

            $this->alert(
                'PPID',
                'PPID Berhasil dibuat.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'PPID',
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
                'content' => 'sometimes',
                'image_path' => 'sometimes|mimes:pdf,word,xlxs,png,jpg,jpeg',
            ], [
                'name.required' => 'Nama PPID tidak boleh kosong.',
                'image_path.mimes' => 'Hanya menerima file berekstensi PDF, WORD, XLXS, PNG, JPG & JPEG',
            ]);

            $ppid = PPIDModel::findOrFail($id);

            $ppid->fill($request->only([
                'name',
                'content',
                'ppid_category_id'
            ]));

            if($request->has('image_path')) {
                if($request->has('image_path')) {
                    $ppid->image_path = $this->updateFile(
                        $request->image_path,
                        'ppid',
                        $ppid->image_path
                    );
                }
            }

            $ppid->update();

            $this->alert(
                'PPID',
                'PPID Berhasil diubah.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'PPID',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }


    public function destroy(string $id)
    {
        try {
            $ppid = PPIDModel::findOrFail($id);

            $this->deleteFile($ppid->image_path);
            $ppid->delete();

            $this->alert(
                'PPID',
                'PPID berhasil dihapus.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'PPID tidak berhasil dihapus.',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
