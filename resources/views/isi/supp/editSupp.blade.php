@extends('../template')

@section('title','Edit Supplier')
@section('page')

<div class="container">
	<br><br><br>
    <h2>
        Edit Supplier
    </h2>
    <hr>
    <form action="{{route('updSupp',$data->id)}}" method="post">
    	@csrf
        <div class="form-group">
            <label for="">Nama Supp</label>
            <input type="text" class="form-control" id="" name="nmsupp" value="{{$data->nmsupp}}" required>
        </div>
        <div class="form-group">
            <label for="">No. Telp</label>
            <input type="text" class="form-control" id="" name="notelp" value="{{$data->notelp}}" required>
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" id="" name="alamat" value="{{$data->alamat}}" required>
        </div>
        <button type="submit" class="btn btn-success" >Save</button>
    </form><br><br>
    <br><br><br>
</div>

@endsection