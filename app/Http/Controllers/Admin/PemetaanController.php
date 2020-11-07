<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class PemetaanController extends Controller
{
    public function index(){
        // $peta = User::where('roles', 'USER')->get();
        $peta = User::where('roles','USER')->get();
        return view('pages.admin.pemetaan.index',[
            'peta'  => $peta,
        ]);
    }
}
