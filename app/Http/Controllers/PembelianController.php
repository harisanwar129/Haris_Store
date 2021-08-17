<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembelian;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carts = Pembelian::with(['produk.galleri', 'user'])->where('users_id', Auth::user()->id)->get();
        return view('pages.pembelian', [
            'carts' => $carts
        ]);
    }

    public function hapus(Request $request, $id)
    {
        $cart = Pembelian::findOrFail($id);
        $cart->delete();
        return redirect()->route('pembelian');
    }
    public function success()
    {
        return view('pages.success');
    }
}
