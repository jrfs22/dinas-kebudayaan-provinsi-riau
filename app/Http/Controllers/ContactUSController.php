<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\FaqsModel;
use Illuminate\Http\Request;
use App\Models\ContactUSModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactUsResponseEmail;

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

            $message = ContactUSModel::create($request->all());

            if ($message) {
                Mail::to($message->email)->send(new SendContactUsResponseEmail($message->name, $message->email, $message->messages));
            }

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
