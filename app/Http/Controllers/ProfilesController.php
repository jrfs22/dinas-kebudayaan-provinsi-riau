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
        switch ($type) {
            case 'visi-misi':
                $content = $this->getContent('visi & misi')->first();
                $view = 'after-login.profiles.visimisi';
                break;
            case 'kata-sambutan':
                $content = $this->getContent('sambutan')->first();
                $view = 'after-login.profiles.sambutan';
                break;
            case 'kontak':
                $content = $this->getContent('kontak')->get();
                $view = 'after-login.profiles.kontak';
                break;
            default:
                break;
        }

        return view($view, compact('content'));
    }

    public function getContent($category)
    {
        return ContentModel::where('category', $category);
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
                'Update Successfully',
                '',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Update Failed',
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
