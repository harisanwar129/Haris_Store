<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TransaksiDetail;
use App\User;
class BerandaController extends Controller
{
   /** 
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transactions=TransaksiDetail::with(['transaksi.user','produk.galleri'])
                     ->whereHas('produk',function($product){
                        $product->where('users_id',Auth::user()->id);
                     });
        
        $revenue=$transactions->get()->reduce(function($carry,$item){
            return $carry+$item->harga;
        });
        
        $customer=User::count();
        return view('pages.beranda',[
            'transaction_count'=>$transactions->count(),
            'transaction_data'=>$transactions->get(),
            'revenue'=>$revenue,
            'customer'=>$customer
        ]);
    }
}
