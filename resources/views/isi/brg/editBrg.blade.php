@extends('../template')

@section('title','Edit Barang')
@section('page')

<div class="container">
	<br><br><br>
    <h2>
        Edit Barang
    </h2>
    <hr>
    <form action="{{route('updBrg',$data->id)}}" method="post">
    	@csrf
        <div class="form-group">
            <label for="">Nama Barang</label>
            <input type="text" class="form-control" id="" name="nama_barang" value="{{$data->nama_barang}}" required>
        </div>
        <div class="form-group">
            <label for="">Jumlah</label>
            <input type="text" class="form-control" id="" name="jumlah" value="{{$data->jumlah}}" required>
        </div>
        <div class="form-group">
            <label for="">Harga</label>
            <input type="text" class="form-control" id="" name="harga" value="{{$data->harga}}" required>
        </div>
        <button type="submit" class="btn btn-success" >Save</button>
    </form><br><br>
    <br><br><br>
</div>

@endsection