<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Pembelian;
use App\Transaksi;
use App\TransaksiDetail;

use Exception;

use Midtrans\Snap;
use Midtrans\Config;

class CheckoutController extends Controller
{
    
    public function process(Request $request){
        // SAve USer Data
        $user=Auth::user();
        $user->update($request->except('harga_total'));

        // Process checkout
        $code='STORE-'.mt_rand(000000,999999);
        $carts= Pembelian::with(['produk','user'])
                ->where('users_id',Auth::user()->id)
                ->get();

        // Transaction create
        $transaction=Transaksi::create([
            'users_id'=> Auth::user()->id,
            'harga_asuransi'=>0,
            'ongkir'=>0,
            'harga_total'=> $request->harga_total,
            'status_transaksi'=>'PENDING',
            'kode'=>$code
        ]);
        foreach ($carts as $cart){
            $trx='TRS'.mt_rand(000000,999999);
            TransaksiDetail::create([
                'transaksi_id'=>$transaction->id,
                'produk_id'=>$cart->produk->id,
                'harga'=>$cart->produk->harga,
                'status_pengiriman'=> 'PENDING',
                'resi'=>'',
                'kode'=>$trx
            ]);
        }
        
        //Delete cart data
        Pembelian::where('users_id',Auth::user()->id)->delete();

    // konfigurasi midtrans
            Config::$serverKey = config('services.midtrans.serverKey');
            Config::$isProduction =config('services.midtrans.isProduction');
            Config::$isSanitized = config('services.midtrans.isSanitized');
            Config::$is3ds = config('services.midtrans.is3ds');

            // buat array untuk di kirim ke midtrans
            $midtrans=[
            'transaction_details'=>[
                'order_id'=>$code,
                'gross_amount'=> (int) $request->harga_total,
            ],
            'customer_details'=>[
                'first_name'=>Auth::user()->name,
                'email'=> Auth::user()->email,
            ],
            'enabled_payments'=>[
                'gopay','permata_va','bank_transfer'
            ],
            
            'vtweb'=>[]
                
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            
            // Redirect to Snap Payment Page
           return redirect($paymentUrl);
          }
          catch (Exception $e) {
            echo $e->getMessage();
          }

      
    }

}
