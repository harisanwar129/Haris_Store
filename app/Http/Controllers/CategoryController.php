<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Produk;
class CategoryController extends Controller
{
  /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories=Kategori::all();
        $products=Produk::with(['galleri'])->paginate(32);
        return view('pages.category',[
            'categories'=>$categories,
            'products'=>$products
        ]);
    }
/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
      public function detail(Request $request,$slug)
    {

        $categories=Kategori::all();
        $category=Kategori::where('slug',$slug)->firstOrFail();
        $products=Produk::with(['galleri'])->where('kategori_id',$category->id)->paginate(32);
    
        return view('pages.category',[
            'categories'=>$categories,
            'products'=>$products
        ]);
    }
}
