<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukGalleri extends Model
{ 

     protected $table="produk_galeri";
     protected $fillable=[
        'photo','produk_id'
    ];  
    protected $hidden=[
      
    ];
   public function produk(){
        return $this->belongsTo(Produk::class,'produk_id','id');
    }


}
