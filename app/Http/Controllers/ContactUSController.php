<?php

namespace App\Http\Controllers;

use App\Models\ContactUSModel;
use App\Models\FaqsModel;
use Exception;
use Illuminate\Http\Request;

class ContactUSController extends Controller
{
    public function index()
    {
        $ContactUS = ContactUSModel::all();

        return view('after-login.faqs.index', compact('ContactUS'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'content' => 'required'
            ], [
                'name.required' => 'Nama tidak boleh kosong.',
                'email.required' => 'Email tidak boleh kosong.',
                'content.required' => 'Pesan tidak boleh kosong.',
            ]);

            ContactUSModel::create($request->all());

            $this->alert(
                'Contact Us',
                'Contact Us berhasil ditambahkan.',
                'success'
            );
            return redirect()->back();
        } catch (Exception $e) {
            $this->alert(
                'Contact Us',
                $e->getMessage(),
                'error'
            );
            return redirect()->back();
        }
    }
}
