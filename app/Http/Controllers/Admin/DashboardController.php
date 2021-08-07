<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
Use App\Transaksi;
class DashboardController extends Controller
{
     public function index()
    {   
        $pelanggan=User::count();
        $pendapatan=Transaksi::sum('harga_total');
        $transaksi=Transaksi::count();
        return view('pages.admin.dashboard',[
            'pelanggan'=>$pelanggan,
            'pendapatan'=>$pendapatan,
            'transaksi'=>$transaksi,
        ]);
    }
}
