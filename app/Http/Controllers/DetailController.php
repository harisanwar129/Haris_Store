<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Pembelian;
use App\User;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        $product = Produk::with(['galleri', 'user'])->where('slug', $id)->firstOrFail();
        return view('pages.detail', [
            'product' => $product
        ]);
    }
    public function add(Request $request, $id)
    {
        $data = [
            'produk_id' => $id,
            'users_id' => Auth::user()->id,
        ];
        Pembelian::create($data);
        return redirect()->route('pembelian');
    }
}
