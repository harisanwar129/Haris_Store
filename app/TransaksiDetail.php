<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produk;
use App\Transaksi;

class TransaksiDetail extends Model
{
    protected $table="transaksi_detail";
    protected $fillable=[
       'transaksi_id',
       'produk_id',
       'harga',
       'status_pengiriman',
       'resi',
       'kode'
        
   ];
   protected $hidden=[
     
   ];

   public function produk(){
       return $this->hasOne(Produk::class,'id','produk_id');
   }

   public function transaksi(){
       return $this->hasOne(Transaksi::class,'id','transaksi_id');
   }
}
