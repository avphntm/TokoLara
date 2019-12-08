<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table = 'supplier';
    protected $primaryKey = 'id';
    protected $fillable = ['nmsupp','notelp','alamat'];

    public function barang()
    {
    	# code...
    	return $this->hasMany('App\Barang');
    }
}
