<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPemetaanController extends Controller
{
    public function index(){
        return view('pages.dashboard-pemetaan');
    }
    public function inputMaps(Request $request){
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        return redirect()->route('dashboard-pemetaan');
    }
}
