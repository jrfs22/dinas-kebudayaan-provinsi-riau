<?php

namespace App\Http\Controllers;

use App\Models\AgendaCategoryModel;
use Exception;
use App\Models\AgendaModel;
use App\Traits\ManageFiles;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    use ManageFiles;
    public function index()
    {
        $agenda = AgendaModel::with('category')->get();

        $categories = AgendaCategoryModel::all();
        return view('after-login.agenda.index', compact('agenda', 'categories'));
    }

    public function create()
    {
        $categories = AgendaCategoryModel::all();
        return view('after-login.agenda.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'content' => 'required',
                'location' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'cover_image_path' => 'sometimes|mimes:jpeg,jpg,png|max:512',
                'image_path' => 'sometimes|mimes:jpeg,jpg,png|max:512',
                'date' => 'required',
                'agenda_category_id' => 'required|exists:agenda_categories,id',
            ], [
                'name.required' => 'Nama Kegiatan tidak boleh kosong',
                'slug.required' => 'Ringkasan Kegiatan tidak boleh kosong',
                'content.required' => 'Detail Kegiatan tidak boleh kosong',
                'start_time.required' => 'Waktu Mulai Kegiatan tidak boleh kosong',
                'date_time.required' => 'Waktu Berakhir Kegiatan tidak boleh kosong',
                'location.required' => 'Lokasi Kegiatan tidak boleh kosong',
                'agenda_category_id.required' => 'Kategori berita harus ada.',
                'agenda_category_id.exists' => 'Kategori berita tidak sesuai.',
                'date.required' => 'Tanggal harus ada',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'cover_image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
            ]);

            $agenda = new AgendaModel();

            $agenda->fill(array_merge(
                $request->only([
                    'name',
                    'slug',
                    'content',
                    'location',
                    'contact_person',
                    'email',
                    'start_time',
                    'end_time',
                    'date',
                    'agenda_category_id'
                ]),
                [
                    'user_id' => auth()->user()->id,
                    'cover_image_path' => $agenda->cover_image_path = $this->storeFile(
                        $request->cover_image_path,
                        'images/agenda/cover'
                    ),
                    'image_path' => $agenda->image_path = $this->storeFile(
                        $request->image_path,
                        'images/agenda'
                    ),
                ]
            ));

            $agenda->save();

            $this->alert(
                'Agenda',
                'agenda berhasil ditambahkan.',
                'success'
            );
            return redirect()->route('agenda');
        } catch (Exception $e) {
            $this->alert(
                'Agenda',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function edit(string $id)
    {
        try {
            $categories = AgendaCategoryModel::all();
            $agenda = AgendaModel::findOrFail($id);
            return view('after-login.agenda.edit', compact('categories', 'agenda'));
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
            $request->validate([
                'name' => 'required',
                'location' => 'required',
                'cover_image_path' => 'sometimes|mimes:jpeg,jpg,png|max:512',
                'image_path' => 'sometimes|mimes:jpeg,jpg,png|max:512',
                'date' => 'required',
                'agenda_category_id' => 'required|exists:agenda_categories,id',
            ], [
                'name.required' => 'Nama Kegiatan tidak boleh kosong',
                'location.required' => 'Lokasi Kegiatan tidak boleh kosong',
                'agenda_category_id.required' => 'Kategori berita harus ada.',
                'agenda_category_id.exists' => 'Kategori berita tidak sesuai.',
                'date.required' => 'Tanggal harus ada',
                'cover_image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'cover_image_path.max' => 'Maksimal Ukuran file 512 kb',
                'image_path.max' => 'Maksimal Ukuran file 512 kb',
            ]);

            $agenda = AgendaModel::findOrFail($id);

            $agenda->fill($request->only([
                'name',
                'location',
                'contact_person',
                'email',
                'start_time',
                'end_time',
                'date',
                'agenda_category_id'
            ]));

            if ($request->hasFile('image_path')) {
                $agenda->image_path = $this->updateFile(
                    $request->image_path,
                    'images/agenda',
                    $agenda->image_path
                );
            }

            if ($request->hasFile('cover_image_path')) {
                $agenda->cover_image_path = $this->updateFile(
                    $request->cover_image_path,
                    'images/agenda/cover',
                    $agenda->cover_image_path
                );
            }

            $agenda->save();

            $this->alert(
                'Agenda',
                'agenda berhasil diubah.',
                'success'
            );
            return redirect()->route('agenda');
        } catch (Exception $e) {
            $this->alert(
                'Agenda',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $agenda = AgendaModel::findOrFail($id);
            $agenda->delete();

            $this->deleteFile($agenda->image_path);

            $this->alert(
                'Agenda',
                'Berhasil menghapus agenda.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Agenda',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
