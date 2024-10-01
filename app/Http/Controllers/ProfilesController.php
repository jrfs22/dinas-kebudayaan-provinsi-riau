<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function visiMisi()
    {
        return view('after-login.profiles.visimisi');
    }
}
