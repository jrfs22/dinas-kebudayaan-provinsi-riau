<?php

namespace App\Http\Controllers;

use App\Models\ContentModel;
use App\Traits\ManageFiles;
use Exception;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    use ManageFiles;
    public function profiles(string $type)
    {
        try {
            $content = new ContentModel();
            switch ($type) {
                case 'profil':
                    $content = $content->where('category', 'profil')->first();
                    $view = 'after-login.profiles.profil';
                    break;
                case 'struktur-organisasi':
                    $content = $content->where('category', 'struktur organisasi')->first();
                    $view = 'after-login.profiles.struktur';
                    break;
                case 'tugas-pokok':
                    $content = $content->where('category', 'tugas pokok & fungsi')->first();
                    $view = 'after-login.profiles.tugas-pokok';
                    break;
                case 'visi-misi':
                    $content = $content->where('category', 'visi & misi')->first();
                    $view = 'after-login.profiles.visimisi';
                    break;
                case 'kata-sambutan':
                    $content = $content->where('category', 'sambutan')->first();
                    $view = 'after-login.profiles.sambutan';
                    break;
                case 'kontak':
                    $content = $content->whereIn('category', ['media sosial', 'kontak', 'telepon', 'email'])->get();
                    $view = 'after-login.profiles.kontak';
                    break;
                default:
                    break;
            }

            return view($view, compact('content'));
        } catch (Exception $e) {
            $this->alert(
                'Halaman tidak ditemukan',
                '',
                'error'
            );
            return redirect()->back();
        }
    }

    public function store(Request $request, string $type)
    {
        try {
            $contents = new ContentModel();

            $contents->fill($request->only([
                'title',
                'description',
                'content',
                'date',
                'status',
                'url_paths'
            ]));

            $contents->category = $type;
            if ($request->has('category')) {
                $contents->category = $request->category;
            }
            $contents->save();

            $this->alert(
                'Insert Successfully',
                '',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Insert Failed',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $contents = ContentModel::findOrFail($id);

            if ($request->hasFile('image_path')) {
                $request->validate([
                    'image_path' => 'mimes:jpeg,jpg,png|max:512'
                ], [
                    'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                    'image_path.max' => 'Maksimal file berukuran 512kb'
                ]);

                $contents->image_path = $this->updateFile(
                    $request->file('image_path'),
                    'images/content/' . $contents->category,
                    $contents->image_path
                );
            }

            $contents->fill($request->only([
                'title',
                'description',
                'content',
                'date',
                'status',
                'category',
                'url_path'
            ]));

            $contents->save();

            $this->alert(
                'Perubahan berhasil',
                '',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Perubahan Gagal',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $content = ContentModel::findOrFail($id);
            $content->delete();

            $this->alert(
                'Kontak',
                'Berhasil menghapus Kontak.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Kontak',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
