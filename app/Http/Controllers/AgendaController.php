<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\AgendaModel;
use App\Traits\ManageFiles;
use Illuminate\Http\Request;
use App\Models\AgendaCategoryModel;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    use ManageFiles;
    public function index()
    {
        if (Auth::check()) {
            if (isSuperAdmin()) {
                $agenda = AgendaModel::with('category')->get();

                $categories = AgendaCategoryModel::all();
            } else {
                $agenda = AgendaModel::whereHas('category', function ($query) {
                    $query->where('departement_id', auth()->user()->departement_id);
                })->with('category')->get();

                $categories = AgendaCategoryModel::where('departement_id', auth()->user()->departement_id)->get();
            }
            return view('after-login.agenda.index', compact('agenda', 'categories'));
        } else {
            $agenda = AgendaModel::with('category')->paginate(3);

            $categories = AgendaCategoryModel::whereHas('agenda')->paginate(3);

            return view('before-login.agenda.list', compact('agenda', 'categories'));
        }
    }

    public function create()
    {
        if (isSuperAdmin()) {
            $categories = AgendaCategoryModel::all();
        } else {
            $categories = AgendaCategoryModel::where('departement_id', auth()->user()->departement_id)->get();
        }
        return view('after-login.agenda.create', compact('categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $request->validate([
            'search' => 'required|string|min:1',
        ]);

        $agenda = AgendaModel::where(function ($q) use ($query) {
            $q->where('title', 'LIKE', "%{$query}%")
                ->orWhere('summary', 'LIKE', "%{$query}%")
                ->orWhere('content', 'LIKE', "%{$query}%");
        })->paginate(3);

        $categories = AgendaCategoryModel::whereHas('agenda')->paginate(3);

        return view('before-login.agenda.list', compact('agenda', 'categories'));
    }

    public function show($time, $slug)
    {
        try {
            $slug = $time . '/' . $slug;

            $agenda = AgendaModel::where('slug' ,$slug)->first();

            $agendaCategories = AgendaCategoryModel::all();

            $recent = AgendaModel::where('slug', '!=', $slug)->orderBy('date', 'desc')->take(3)->get();

            return view('before-login.detail.agenda', compact(
                'agenda',
                'agendaCategories',
                'recent'
            ));
        } catch (Exception $e) {
            return redirect()->route('beranda');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'summary' => 'required',
                'content' => 'required',
                'location' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'cover_image_path' => 'sometimes|mimes:jpeg,jpg,png|max:4096',
                'image_path' => 'sometimes|mimes:jpeg,jpg,png|max:4096',
                'date' => 'required',
                'agenda_category_id' => 'required|exists:agenda_categories,id',
            ], [
                'title.required' => 'Nama Kegiatan tidak boleh kosong',
                'summary.required' => 'Ringkasan Kegiatan tidak boleh kosong',
                'content.required' => 'Detail Kegiatan tidak boleh kosong',
                'start_time.required' => 'Waktu Mulai Kegiatan tidak boleh kosong',
                'date_time.required' => 'Waktu Berakhir Kegiatan tidak boleh kosong',
                'location.required' => 'Lokasi Kegiatan tidak boleh kosong',
                'agenda_category_id.required' => 'Kategori berita harus ada.',
                'agenda_category_id.exists' => 'Kategori berita tidak sesuai.',
                'date.required' => 'Tanggal harus ada',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'cover_image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'cover_image_path.max' => 'Maksimal Ukuran file 4096 kb',
                'image_path.max' => 'Maksimal Ukuran file 4096 kb',
            ]);

            $agenda = new AgendaModel();

            $agenda->fill(array_merge(
                $request->only([
                    'title',
                    'summary',
                    'content',
                    'location',
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
            if (isSuperAdmin()) {
                $categories = AgendaCategoryModel::all();
            } else {
                $categories = AgendaCategoryModel::where('departement_id', auth()->user()->departement_id)->get();
            }

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
                'title' => 'required',
                'location' => 'required',
                'cover_image_path' => 'sometimes|mimes:jpeg,jpg,png|max:4096',
                'image_path' => 'sometimes|mimes:jpeg,jpg,png|max:4096',
                'date' => 'required',
                'agenda_category_id' => 'required|exists:agenda_categories,id',
            ], [
                'title.required' => 'Nama Kegiatan tidak boleh kosong',
                'location.required' => 'Lokasi Kegiatan tidak boleh kosong',
                'agenda_category_id.required' => 'Kategori berita harus ada.',
                'agenda_category_id.exists' => 'Kategori berita tidak sesuai.',
                'date.required' => 'Tanggal harus ada',
                'cover_image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'image_path.mimes' => 'Hanya menerima file ekstension (jpg, png, jpeg)',
                'cover_image_path.max' => 'Maksimal Ukuran file 4096 kb',
                'image_path.max' => 'Maksimal Ukuran file 4096 kb',
            ]);

            $agenda = AgendaModel::findOrFail($id);

            $agenda->fill($request->only([
                'title',
                'location',
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
