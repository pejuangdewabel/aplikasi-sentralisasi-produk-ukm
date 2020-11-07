<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\User;
use Illuminate\Http\Request;

class DashboardSettingController extends Controller
{
    // 

    public function store()
    {
        $user = Auth::user();
        $categories = Category::all();        
        return view('pages.dashboard-settings',[
            'user'          => $user,
            'categories'    => $categories
        ]);
    }
    public function account()
    {
        $user = Auth::user();    
        // $provinsi = RelasiProvinsi::where('id', Auth::user()->provinces_id)->get();
        
        return view('pages.dashboard-account',[
            'user'          => $user,
        ]);
    }
    public function update(Request $request, $redirect){
        $data = $request->all();
        $item = Auth::user();

        if($request->profile){
            $data['profile']  = $request->file('profile')->store('assets/profile','public');
        }                                

        $item->update($data);

        return redirect()->route($redirect);
    }
    
}
