<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class ProdukGalleri extends Model
{
     use softDeletes;
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
