<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\KategoriRequest;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $query=Kategori::query();

            return Datatables::of($query)
            ->addColumn('action',function($item){
                return '
                <div class="btn-group">
                    <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown">Aksi</button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="'.route('kategori.edit',$item->id).'" > Ubah</a>
                    <form action="'.route('kategori.destroy',$item->id).'" method="POST">
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
            ->editColumn('photo',function($item){
                return $item->photo ? '<img src="'.Storage::url($item->photo).'" style="max-height:48px;" alt="">' :'';
            })
            ->rawColumns(['action','photo'])
            ->make();
        }
       return view('pages.admin.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriRequest $request)
    {
        $data=$request->all();

        $data['slug']= Str::slug($request->nama);
        $data['photo']= $request->file('photo')->store('assets/kategori','public');
        
        Kategori::create($data);
        return redirect()->route('kategori.index');
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
        $item=Kategori::findOrFail($id);
        return view('pages.admin.kategori.ubah',[
            'item'=>$item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriRequest $request, $id)
    {
        $data=$request->all();

        $data['slug']= Str::slug($request->nama);
        $data['photo']= $request->file('photo')->store('assets/kategori','public');
        
        $item=Kategori::findOrFail($id);
        $item->update($data);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $item=Kategori::findOrFail($id);
       $item->delete();
        return redirect()->route('kategori.index');

    }
}
