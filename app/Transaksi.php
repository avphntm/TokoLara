<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $fillable = ['kode','total','bayar','kembali'];

    public function barang()
    {
    	# code...
    	return $this->belongsToMany('App\Barang');
    }
}
