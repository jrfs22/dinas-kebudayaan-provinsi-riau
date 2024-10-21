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
                'messages' => 'required'
            ], [
                'name.required' => 'Nama tidak boleh kosong.',
                'email.required' => 'Email tidak boleh kosong.',
                'messages.required' => 'Pesan tidak boleh kosong.',
            ]);

            ContactUSModel::create($request->all());

            $this->alert(
                'Pesan',
                'Terimakasih telah mengirimkan pesan.',
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
