<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Supplier;

use Illuminate\Http\Request;

class supplierController extends Controller
{
    //
    public function index()
    {
    	# code...
    	$suppliers = Supplier::all();
    	return view('isi.supp.viewSupp',['suppliers' => $suppliers]);
    }

    public function insert(Request $request)
    {
    	# code...
    	Supplier::create([
    		'nmsupp' => $request->input('nama'),
    		'notelp' => $request->input('notelp'),
    		'alamat' => $request->input('alamat')
    	]);
    	return redirect('viewSupp');

    }
    public function edit(Supplier $id){
        # code...
        return view('isi.supp.editSupp',['data' => $id]);

    }
    public function update(Request $request,Supplier $id)
    {
        # code...
        $id->update($request->only('nmsupp','notelp','alamat'));
        // return redirect()->route('supplier');
        return redirect('viewSupp');
    }
    public function delete(Supplier $id)
    {
        # code...
        $id->delete();
        return redirect('viewSupp');
    }
}
