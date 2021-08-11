<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Produk extends Model
{
     use softDeletes;
     protected $table="produk";
     protected $fillable=[
        'nama','users_id','kategori_id','harga','deskripsi','slug'
    ];
    protected $hidden=[
       
    ];

    public function galleri(){
        return $this->hasMany(ProdukGalleri::class,'produk_id','id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id','id');
    }
}
