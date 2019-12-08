<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_barang','supplier_id','jumlah','harga'];

    public function supplier()
    {
    	# code...
    	return $this->belongsTo('App\Supplier');
    }
    public function transaksi()
    {
    	# code...
    	return $this->belongsToMany('App\Transaksi');
    }
}
