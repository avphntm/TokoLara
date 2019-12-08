<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Transaksi;

class transaksiController extends Controller
{
    //
    public function index()
    {
    	# code...
        $transaksiz = Transaksi::all();
    	return view('isi.transk.viewTrans',['transaksiz' => $transaksiz]);
    }
    public function fieldo()
    {
        # code...
        $barangs = DB::table('barang')->get();
        $last = DB::table('transaksi')->orderBy('id','desc')->get();

        return view('isi.transk.addTrans',compact('barangs','last'));
    }
    public function details($id)
    {
        # code...
        $mt = DB::table('transaksi')->where('id',$id)->get();
        $dt = DB::table('barang_transaksi')->where('transaksi_id',$id)->get();

        return view('isi.transk.showDetails',compact('mt','dt'));
    }
    public function insert()
    {
        # code...
        $param =  json_decode(request()->getContent(), true);

        $uwu = "nothing to do";
        $list = [];
        $list = $param['arr'];
        $input = array(
                'kode' => $param['kode'],
                'total' => $param['total'],
                'bayar' => $param['byr'],
                'kembali' => $param['kmbl']
            );
        $result = DB::table('transaksi')->insertGetId($input);
        if ($result) {
            # code...
            $sukses = 1;
            for ($i=0; $i <count($list); $i++) { 
                # code...
                $inputDetail[$i]['transaksi_id'] = $result;
                $inputDetail[$i]['barang_id'] = $list[$i]['idbrg'];
                $inputDetail[$i]['nmbrg'] = $list[$i]['nmbrg'];
                $inputDetail[$i]['jmlbeli'] = $list[$i]['jml'];
                $inputDetail[$i]['harga'] = $list[$i]['hrg'];
                $inputDetail[$i]['ttl'] = $list[$i]['total'];
                $result2 = DB::table('barang_transaksi')->insert($inputDetail[$i]);
            }

            // return $sukses;
            //return redirect()->route('ViewTrans');

        } else {
            return $uwu;
            //return redirect()->route('ViewTrans');
        }

        return redirect('viewTrans');
    }
}
