<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Produk;

class HomeController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $categories=Kategori::take(6)->get();
        $products=Produk::with(['galleri'])->take(8)->get();
        return view('pages.home',[
            'categories'=>$categories,
            'products'=>$products
        ]);
    }
}
