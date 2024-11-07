<?php

namespace App\Http\Controllers;

use App\Models\PpkdModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PpkdController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            $ppkd = PpkdModel::all();
            return view('after-login.ppkd.index', compact('ppkd'));
        } else {
            return view('before-login.ppkd.index');
        }
    }

    public function create()
    {
        return view('after-login.ppkd.create');
    }
}
