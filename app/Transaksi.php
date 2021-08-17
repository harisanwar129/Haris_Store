<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
   protected $table="transaksi";
   protected $fillable=[
      'users_id',
      'harga_asuransi',
      'ongkir',
      'harga_total',
      'status_transaksi',
      'kode'
       
  ];
  protected $hidden=[
    
  ];
}
