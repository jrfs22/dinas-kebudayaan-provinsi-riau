<?php

namespace App\Http\Controllers;

use Exception;
use App\Traits\ManageFiles;
use App\Models\ContentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    use ManageFiles;
    public function profiles(string $type)
    {
        try {
            $content = new ContentModel();

            if (Auth::check()) {
                switch ($type) {
                    case 'sejarah':
                        $content = $content->where('category', 'sejarah')->first();
                        $view = 'after-login.profiles.sejarah';
                        break;
                    case 'struktur-organisasi':
                        $content = $content->where('category', 'struktur organisasi')->first();
                        $view = 'after-login.profiles.struktur';
                        break;
                    case 'tugas-pokok':
                        $content = $content->where('category', 'tugas pokok & fungsi')->first();
                        $view = 'after-login.profiles.tugas-pokok';
                        break;
                    case 'visi':
                        $content = $content->where('category', 'visi')->first();
                        $view = 'after-login.profiles.visi';
                        break;
                    case 'misi':
                        $content = $content->where('category', 'misi')->first();
                        $view = 'after-login.profiles.misi';
                        break;
                    case 'kata-sambutan':
                        $content = $content->where('category', 'sambutan')->first();
                        $view = 'after-login.profiles.sambutan';
                        break;
                    case 'kontak':
                        $content = $content->whereIn('category', ['youtube', 'linkedin', 'facebook', 'instagram', 'twitter', 'tiktok', 'kontak', 'telepon', 'email'])->get();
                        $view = 'after-login.profiles.kontak';
                        break;
                    case 'sop':
                        $content = $content->where('category', 'sop')->get();
                        $view = 'after-login.profiles.sop';
                        break;
                    case 'banner':
                        $content = $content->whereIn('category', [
                            'banner-description',
                            'banner-main-image',
                            'banner-secondary-image',
                        ])->get();
                        $view = 'after-login.settings.banner';
                        break;
                    default:
                        $this->alert(
                            'Halaman tidak ditemukan',
                            '',
                            'error'
                        );
                        return redirect()->back();
                }

                return view($view, compact('content'));
            } else {
                switch ($type) {
                    case 'sejarah':
                        $content = $content->where('status', 'published')->where('category', 'sejarah')->first();

                        return view('before-login.profile.sejarah', compact('content'));
                    case 'about':
                        $about = $content->where('category', 'about')->first();

                        $sambutan = $content->where('category', 'sambutan')->first();

                        return view('before-login.profile.about-us', compact('content', 'sambutan'));
                    case 'struktur-organisasi':
                        $content = $content->where('category', 'struktur organisasi')->first();

                        return view('before-login.profile.struktur-organisasi', compact('content'));
                    case 'visi-misi':
                        $visi = $content->where('status', 'published')->where('category', 'visi')->first();

                        $misi = $content->where('status', 'published')->where('category', 'misi')->first();

                        return view('before-login.profile.visimisi', compact('visi', 'misi'));
                    case 'kontak':
                        $content = $content->whereIn('category', ['media sosial', 'kontak', 'telepon', 'email'])->get();
                        $view = 'after-login.profiles.kontak';

                        return view($view, compact('content'));
                    default:
                        $this->alert(
                            'Halaman tidak ditemukan',
                            '',
                            'error'
                        );
                        return redirect()->back();
                }
            }
        } catch (Exception $e) {
            $this->alert(
                'Halaman tidak ditemukan',
                '',
                'error'
            );
            return redirect()->back();
        }
    }

    public function settings(string $type)
    {
        try {
            $content = new ContentModel();

            switch ($type) {
                case 'breadcrumb':
                    $content = $content->where('category', 'breadcrumb')->first();

                    $view = 'after-login.settings.breadcrumb';
                    return view($view, compact('content'));
                case 'hero':
                    $content = $content->whereIn('category', [
                        'hero-deskripsi',
                        'hero-main-image',
                        'hero-secondary-image'
                    ])->get();

                    $pageTitle = 'Hero Section';

                    return view('after-login.settings.index', compact('content', 'pageTitle', 'type'));
                case 'tentang-kami':
                    $content = $content->whereIn('category', [
                        'tentang-kami-background',
                        'tentang-kami-gambar-utama',
                        'tentang-kami-gambar-thumnail',
                        'tentang-kami-channel-yt',
                        'tentang-kami-deskripsi'
                    ])->get();

                    $pageTitle = 'Tentang Kami';

                    return view('after-login.settings.index', compact('content', 'pageTitle', 'type'));
                case 'museum':
                    $content = $content->whereIn('category', [
                        'upt-museum-background',
                        'upt-museum-gambar-utama',
                        'upt-museum-gambar-thumnail',
                        'upt-museum-channel-yt',
                        'upt-museum-klasifikasi'
                    ])->get();

                    $pageTitle = 'UPT Museum';

                    return view('after-login.settings.index', compact('content', 'pageTitle', 'type'));
                case 'sitari':
                    $content = $content->whereIn('category', [
                        'sitari'
                    ])->get();

                    $pageTitle = 'Sitari';

                    return view('after-login.settings.index', compact('content', 'pageTitle', 'type'));
                case 'footer':
                    $content = $content->whereIn('category', [
                        'footer-background'
                    ])->first();

                    $pageTitle = 'Footer';

                    return view('after-login.settings.footer', compact('content', ));
                default:
                    $this->alert(
                        'Halaman tidak ditemukan',
                        '',
                        'error'
                    );
                    return redirect()->back();
            }
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
                'url_path'
            ]));

            $contents->category = $type;
            if ($request->has('category')) {
                $contents->category = $request->category;
            }

            if ($request->has('image_path')) {
                $contents->image_path = $this->storeFile(
                    $request->file('image_path'),
                    'images/content/' . $contents->category
                );
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

    public function editSettings(string $id, string $type)
    {
        try {
            $content = ContentModel::findOrFail($id);

            return view('after-login.settings.edit', compact('content', 'type'));
        } catch (Exception $e) {
            $this->alert(
                'Terjadi kesalahan',
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

    public function updateWithType(Request $request, string $id, string $type)
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
            return redirect()->route('settings', ['type' => $type]);
        } catch (Exception $e) {
            $this->alert(
                'Perubahan Gagal',
                $e->getMessage(),
                'error'
            );
            return redirect()->route('settings', ['type' => $type]);
        }
    }

    public function destroy(string $id)
    {
        try {
            $content = ContentModel::findOrFail($id);
            $content->delete();

            $this->alert(
                'Konten',
                'Berhasil menghapus',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Konten',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
