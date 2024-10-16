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

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'location' => 'required',
                'image_path' => 'sometimes|mimes:jpeg,jpg,png|max:512',
                'date' => 'required',
                'agenda_category_id' => 'required|exists:agenda_categories,id',
            ], [
                'name.required' => 'Nama Kegiatan tidak boleh kosong',
                'location.required' => 'Lokasi Kegiatan tidak boleh kosong',
                'agenda_category_id.required' => 'Kategori berita harus ada.',
                'agenda_category_id.exists' => 'Kategori berita tidak sesuai.',
                'date.required' => 'Tanggal harus ada',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
            ]);

            $agenda = new AgendaModel();

            $agenda->fill($request->only([
                'name',
                'location',
                'date',
                'agenda_category_id'
            ]));

            $agenda->image_path = $this->storeFile(
                $request->image_path,
                'images/agenda'
            );

            $agenda->save();

            $this->alert(
                'Agenda',
                'agenda berhasil ditambahkan.',
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

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'location' => 'required',
                'image_path' => 'sometimes|mimes:jpeg,jpg,png|max:512',
                'date' => 'required',
                'agenda_category_id' => 'required|exists:agenda_categories,id',
            ], [
                'name.required' => 'Nama Kegiatan tidak boleh kosong',
                'location.required' => 'Lokasi Kegiatan tidak boleh kosong',
                'agenda_category_id.required' => 'Kategori berita harus ada.',
                'agenda_category_id.exists' => 'Kategori berita tidak sesuai.',
                'date.required' => 'Tanggal harus ada',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
            ]);

            $agenda = AgendaModel::findOrFail($id);

            $agenda->fill($request->only([
                'name',
                'location',
                'date',
                'agenda_category_id'
            ]));

            if($request->has('image_path')) {
                $agenda->image_path = $this->updateFile(
                    $request->image_path,
                    'agenda',
                    $agenda->image_path
                );
            }

            $agenda->save();

            $this->alert(
                'Agenda',
                'agenda berhasil diubah.',
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
