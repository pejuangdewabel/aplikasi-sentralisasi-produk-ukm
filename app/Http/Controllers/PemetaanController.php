<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PemetaanController extends Controller
{
    public function index(){
        $peta = User::where('roles', 'USER')->get();
        return view('pages.pemetaan', [
            'peta'  => $peta,
        ]);
    }
}
