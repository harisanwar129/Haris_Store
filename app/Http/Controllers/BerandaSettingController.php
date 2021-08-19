<?php

namespace App\Http\Controllers;
use App\User;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaSettingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store()
    {
        $user=Auth::user();
        $categories=Kategori::all();
        return view('pages.atur-beranda',[
            'user'=>$user,
            'categories'=>$categories
        ]);
    }
     public function account()
    {
        $user=Auth::user();
        return view('pages.atur-pengguna',[
            'user'=>$user
        ]);
    }

    public function update(Request $request, $redirect){
        $data=$request->all();
        $item=Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }
}
