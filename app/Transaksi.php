<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

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

  public function user(){
   return $this->belongsTo(User::class,'users_id','id');
}

}
