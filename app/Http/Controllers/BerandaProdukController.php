<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Kategori;
use App\ProdukGalleri;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ProdukRequest;

class BerandaProdukController extends Controller
{
   /**
     * Show the application beranda.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products=Produk::with('galleri','kategori')
                 ->where('users_id',Auth::user()->id)
                 ->get();
        return view('pages.beranda-produk',[
            'products'=>$products
        ]);
    }
 
     public function create()
    {
        $categories=Kategori::all();
        return view('pages.beranda-produk-create',[
            'categories'=>$categories
        ]);
    }
    
    public function store(ProdukRequest $request)
    {
        $data=$request->all();
        // dd($request->all());
        $data['slug']=Str::slug($request->all);
        $products=Produk::create($data);
      
        $gallery=[
            'produk_id'=>$products->id,
            'photo'=>$request->file('photo')->store('assets/produk','public')
        ];
        ProdukGalleri::create($gallery);
        return redirect()->route('beranda-produk');
    }



    public function detail(Request $request,$id)
    {
        $products=Produk::with((['galleri','user','kategori']))->findOrFail($id);
        $categories=Kategori::all();
        return view('pages.beranda-produk-detail',[
            'products'=>$products,
            'categories'=>$categories
        ]);
    }

    public function uploadGalleri(Request $request){
        $data=$request->all();

        $data['photo']= $request->file('photo')->store('assets/produk','public');
         
         ProdukGalleri::create($data);
         return redirect()->route('beranda-produk-detail',$request->produk_id);
    }

    public function deleteGalleri(Request $request,$id){
        $item=ProdukGalleri::findOrFail($id);
        $item->delete();
         return redirect()->route('beranda-produk-detail',$item->produk_id);
 
    }

    public function update(ProdukRequest $request, $id)
    {
        $data=$request->all();
        $item=Produk::findOrFail($id);
        $data['slug']=Str::slug($request->nama);
        
        $item->update($data);
        return redirect()->route('beranda-produk');
    }
}
 