<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Barang;

class barangController extends Controller
{
    //
    public function index()
    {
    	# code...
    	$barangs = Barang::all();
        $supps = DB::table('supplier')->orderBy('nmsupp','asc')->get();
    	return view('isi.brg.viewBrg',compact('barangs','supps'));
    }

    public function insert(Request $request)
    {
    	# code...
        // dd($request);
    	Barang::create([
    		'nama_barang' => $request->input('nama'),
            'supplier_id' => $request->input('idsupp'),
    		'jumlah' => $request->input('jumlah'),
    		'harga' => $request->input('harga')
    	]);
    	return redirect('viewBrg');

    }
    public function edit(Barang $id){
        # code...
        return view('isi.brg.editBrg',['data' => $id]);

    }
    public function update(Request $request,Barang $id)
    {
        # code...
        $id->update($request->only('nama_barang','jumlah','harga'));
        // return redirect()->route('barang');
        return redirect('viewBrg');
    }
    public function delete(Barang $id)
    {
        # code...
        $id->delete();
        return redirect('viewBrg');
    }
}
