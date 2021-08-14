<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = "pembelian";
    protected $fillable = [
        'produk_id', 'users_id'
    ];
    protected $hidden = [];

    public function produk()
    {
        return $this->hasOne(Produk::class, 'id', 'produk_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
