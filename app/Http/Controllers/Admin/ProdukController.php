<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Produk;
use App\Kategori;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\ProdukRequest;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $query=Produk::with(['user','kategori']);

            return Datatables::of($query)
            ->addColumn('action',function($item){
                return '
                <div class="btn-group">
                    <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown">Aksi</button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="'.route('produk.edit',$item->id).'" > Ubah</a>
                    <form action="'.route('produk.destroy',$item->id).'" method="POST">
                    '.method_field('delete').csrf_field() .'
                    <button type="submit" class="dropdown-item text-danger">
                    Hapus
                    </button>
                    </form>
                        </div>
                    </div>
                </div>
                ';
            })
            ->rawColumns(['action'])
            ->make();
        }
       return view('pages.admin.produk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $categories=Kategori::all();
        return view('pages.admin.produk.tambah',[
            'users'=>$users,
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
    {
        $data=$request->all();

        $data['slug']=Str::slug($request->all);
        
        Produk::create($data);
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Produk::findOrFail($id);
        $users=User::all();
        $categories=Kategori::all();
        return view('pages.admin.produk.ubah',[
            'item'=>$item,
            'users'=>$users,
            'categories'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdukRequest $request, $id)
    {
        $data=$request->all();
        $item=Produk::findOrFail($id);
        $data['slug']=Str::slug($request->nama);
        
        $item->update($data);
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $item=Produk::findOrFail($id);
       $item->delete();
        return redirect()->route('produk.index');

    }
}
