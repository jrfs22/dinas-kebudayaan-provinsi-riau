<?php

namespace App\Http\Controllers;

use Exception;
use App\Traits\ManageFiles;
use App\Models\GalleryModel;
use Illuminate\Http\Request;
use App\Models\GalleryImageModel;

class GalleryImageController extends Controller
{
    use ManageFiles;

    public function index(string $id)
    {
        $gallery = GalleryModel::findOrFail($id);

        return view('after-login.gallery.galleryImage', compact('gallery'));
    }

    public function store(Request $request, string $id)
    {
        try {
            $gallery = GalleryModel::findOrFail($id);

            $request->validate([
                'title' => 'required',
                'image_path' => 'required|mimes:jpeg,jpg,png|max:4098',
                'description' => 'required',
            ], [
                'title.required' => 'Nama Kegiatan tidak boleh kosong',
                'description.required' => 'Deskripsi Kegiatan tidak boleh kosong',
                'image_path.required' => 'Dokumentasi Cover berita harus ada',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'image_path.max' => 'Maksimal Dokumentasi berukuran 4Mb',
            ]);

            $galleryImage = new GalleryImageModel();

            $galleryImage->fill($request->only([
                'title',
                'description',
            ]));

            $galleryImage->gallery_id = $gallery->id;

            $galleryImage->image_path = $this->storeFile(
                $request->image_path,
                'images/gallery/documentation'
            );

            $galleryImage->save();

            $this->alert(
                'Dokumentasi',
                'Dokumentasi berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Dokumentasi',
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
                'image_path' => 'sometimes|mimes:jpeg,jpg,png|max:4098',
                'description' => 'required',
            ], [
                'title.required' => 'Nama Kegiatan tidak boleh kosong',
                'description.required' => 'Deskripsi Kegiatan tidak boleh kosong',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'image_path.max' => 'Maksimal Dokumentasi berukuran 4Mb',
            ]);

            $galleryImage = GalleryImageModel::findOrFail($id);

            $galleryImage->fill($request->only([
                'title',
                'description',
            ]));

            if ($request->has('image_path')) {
                $galleryImage->image_path = $this->updateFile(
                    $request->image_path,
                    'images/gallery/documentation',
                    $galleryImage->image_path
                );
            }

            $galleryImage->save();

            $this->alert(
                'Dokumentasi',
                'Dokumentasi berhasil diubah.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Dokumentasi',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $gallery = GalleryImageModel::findOrFail($id);
            $gallery->delete();

            $this->deleteFile($gallery->image_path);

            $this->alert(
                'Dokumentasi',
                'Berhasil menghapus Dokumentasi.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Dokumentasi',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
