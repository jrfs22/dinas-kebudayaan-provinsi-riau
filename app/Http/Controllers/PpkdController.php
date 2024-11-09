<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\PpkdModel;
use App\Traits\ManageFiles;
use Illuminate\Http\Request;
use App\Traits\ApiWilayahTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PpkdController extends Controller
{
    use ApiWilayahTrait, ManageFiles;
    public function index(Request $request)
    {
        if (Auth::check()) {
            $ppkd = PpkdModel::all();
            return view('after-login.ppkd.index', compact('ppkd'));
        } else {
            $regency = PpkdModel::select('regency_id', 'regency_name')->distinct()->get();

            $years = PpkdModel::select(DB::raw('YEAR(date) as year'))
                ->distinct()
                ->orderBy('year', 'desc')
                ->pluck('year')
                ->toArray();

            $defaultRegency = 'all';
            $defaultStatus = 'all';
            $defaultYear = 'all';

            $regencyParam = $request->input('regency', $defaultRegency);

            if ($regencyParam !== $defaultRegency && !$regency->contains('regency_id', $regencyParam)) {
                $regencyParam = $defaultRegency;
            }

            $statusParam = $request->input('status', $defaultStatus);
            if (!in_array($statusParam, ['disusun', 'disahkan'])) {
                $statusParam = $defaultStatus;
            }

            $yearParam = $request->input('year', $defaultYear);


            if ($yearParam !== $defaultYear && !in_array($yearParam, haystack: $years)) {
                dd($yearParam);
                $yearParam = $defaultYear;
            }

            $ppkd = PpkdModel::query();

            if ($yearParam !== 'all') {
                $ppkd->whereYear('date', $yearParam);
            }

            if ($statusParam !== 'all') {
                $ppkd->where('status', $statusParam);
            }

            if ($regencyParam !== 'all') {
                $ppkd->where('regency_id', $regencyParam);
            }

            $ppkd = $ppkd->get();
            return view('before-login.ppkd.index', compact('regency', 'ppkd', 'years', 'regencyParam', 'statusParam', 'yearParam'));
        }
    }

    public function create()
    {
        $regencies = $this->getRegencies();

        return view('after-login.ppkd.create', compact('regencies'));
    }

    public function edit(string $id)
    {
        $regencies = $this->getRegencies();

        $ppkd = PpkdModel::findOrFail($id);

        return view('after-login.ppkd.edit', compact('regencies', 'ppkd'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'regency_id' => 'required',
                'title' => 'required',
                'file_path' => 'required|mimes:pdf|max:4096',
                'status' => 'required',
                'date' => 'required'
            ], [
                'regency_id' => 'Kabupaten / Kota tidak boleh kosong.',
                'title' => 'Judul PPKD tidak boleh kosong',
                'status' => 'Status PPKD tidak boleh kosong.',
                'date' => 'Tanggal PPKD tidak boleh kosong.',
                'file_path.required' => 'File PPKD tidak boleh kosong.',
                'file_path.mimes' => 'Hanya menerima file ekstensions PDF'
            ]);

            $ppkd = new PpkdModel();

            $ppkd->fill($request->only([
                'regency_id',
                'regency_name',
                'title',
                'file_path',
                'status',
                'date'
            ]));

            $ppkd->province_id = "14";
            $ppkd->province_name = "Riau";
            $ppkd->regency_name = $this->getRegencies($request->regency_id)["name"];

            $ppkd->file_path = $this->storeFile(
                $request->file_path,
                'file/ppkd'
            );

            $ppkd->save();

            $this->alert(
                'PPKD',
                'PPKD Berhasil di tambahkan.',
                'success'
            );
            return redirect()->route('ppkd');
        } catch (Exception $e) {
            $this->alert(
                'PPKD tidak berhasil ditambahkan.',
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
                'regency_id' => 'required',
                'title' => 'required',
                'file_path' => 'sometimes|mimes:pdf|max:4096',
                'status' => 'required',
                'date' => 'required'
            ], [
                'regency_id' => 'Kabupaten / Kota tidak boleh kosong.',
                'title' => 'Judul PPKD tidak boleh kosong',
                'status' => 'Status PPKD tidak boleh kosong.',
                'date' => 'Tanggal PPKD tidak boleh kosong.',
                'file_path.mimes' => 'Hanya menerima file ekstensions PDF'
            ]);

            $ppkd = PpkdModel::findOrFail($id);

            $ppkd->fill($request->only([
                'regency_id',
                'regency_name',
                'title',
                'file_path',
                'status',
                'date'
            ]));

            $ppkd->province_id = "14";
            $ppkd->province_name = "Riau";
            $ppkd->regency_name = $this->getRegencies($request->regency_id)["name"];

            if ($request->has('file_path')) {
                $ppkd->file_path = $this->updateFile(
                    $request->file_path,
                    'file/ppkd',
                    $ppkd->file_path
                );
            }

            $ppkd->update();

            $this->alert(
                'PPKD',
                'PPKD Berhasil di ubah.',
                'success'
            );
            return redirect()->route('ppkd');
        } catch (Exception $e) {
            $this->alert(
                'PPKD tidak berhasil diubah.',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try {
            $ppkd = PpkdModel::findOrFail($id);

            if ($ppkd->delete()) {
                $this->deleteFile($ppkd->file_path);
            }

            $this->alert(
                'PPKD',
                'Berhasil menghapus PPKD.',
                'success'
            );

            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'PPKD',
                $e->getMessage(),
                'error'
            );

            return redirect()->back();
        }
    }
}
