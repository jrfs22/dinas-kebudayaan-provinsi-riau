<?php

namespace App\Http\Controllers;

use Exception;
use App\Traits\ManageFiles;
use App\Models\GalleryModel;
use Illuminate\Http\Request;
use App\Models\GalleryCategoryModel;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    use ManageFiles;
    public function index()
    {
        if (Auth::check()) {
            if (isSuperAdmin()) {
                $galleries = GalleryModel::with('category')->get();

                $categories = GalleryCategoryModel::all();
            } else {
                $galleries = GalleryModel::whereHas('category', function ($query) {
                    $query->where('departement_id', auth()->user()->departement_id);
                })->with('category')->get();

                $categories = GalleryCategoryModel::where('departement_id', auth()->user()->departement_id)->get();
            }
            return view('after-login.gallery.index', compact('galleries', 'categories'));
        } else {
            $galleries = GalleryModel::with('category')->paginate(6);

            $categories = GalleryCategoryModel::whereHas('gallery')->get();
            return view('before-login.galleries', compact('galleries', 'categories'));
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'image_path' => 'required|mimes:jpeg,jpg,png|max:512',
                'date' => 'required',
                'gallery_category_id' => 'required|exists:gallery_categories,id',
            ], [
                'name.required' => 'Nama Kegiatan tidak boleh kosong',
                'gallery_category_id.required' => 'Kategori berita harus ada.',
                'gallery_category_id.exists' => 'Kategori berita tidak sesuai.',
                'date.required' => 'Tanggal harus ada',
                'image_path.required' => 'Gambar Cover berita harus ada',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
            ]);

            $gallery = new GalleryModel();

            $gallery->fill($request->only([
                'name',
                'date',
                'gallery_category_id'
            ]));

            $gallery->image_path = $this->storeFile(
                $request->image_path,
                'images/gallery'
            );

            $gallery->save();

            $this->alert(
                'Gallery',
                'Gallery berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Gallery',
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
                'image_path' => 'sometimes|mimes:jpeg,jpg,png|max:512',
                'date' => 'required',
                'gallery_category_id' => 'required|exists:gallery_categories,id',
            ], [
                'name.required' => 'Nama Kegiatan tidak boleh kosong',
                'gallery_category_id.required' => 'Kategori berita harus ada.',
                'gallery_category_id.exists' => 'Kategori berita tidak sesuai.',
                'date.required' => 'Tanggal harus ada',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
            ]);

            $gallery = GalleryModel::findOrFail($id);

            $gallery->fill($request->only([
                'name',
                'date',
                'gallery_category_id'
            ]));

            if ($request->has('image_path')) {
                $gallery->image_path = $this->updateFile(
                    $request->image_path,
                    'images/gallery',
                    $gallery->image_path
                );
            }

            $gallery->save();

            $this->alert(
                'Gallery',
                'Gallery berhasil diubah.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Gallery',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $gallery = GalleryModel::findOrFail($id);
            $gallery->delete();

            $this->deleteFile($gallery->image_path);

            $this->alert(
                'Gallery',
                'Berhasil menghapus gallery.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Gallery',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
