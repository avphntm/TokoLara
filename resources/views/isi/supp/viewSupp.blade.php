@extends('../template')

@section('title','View Supplier')
@section('page')

<div ng-app="tesApp" ng-controller="tesCtrl" class="container">
	<br><br><br>
    <h3 class="text-center">Tabel Supplier</h3><br>
    <a href="#inpbrg"><button class="btn btn-info" ng-click="showInp()" style="margin-right: 40px!important;">Input Supplier</button></a><br><br>
    <table class="table table-striped">
        <tr class="bg-info">
            <th class="text-center">No</th>
            <th class="text-center">Nama Supplier</th>
            <th class="text-center">No. Telp</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">Barang Supplier</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach($suppliers as $key => $s)
        <tr>
        	<td class="text-center">{{$key+1}}</td>
        	<td>{{$s->nmsupp}}</td>
        	<td>{{$s->notelp}}</td>
        	<td>{{$s->alamat}}</td>
            <td>@foreach($s->barang as $b)<p>{{$b->nama_barang}}</p>@endforeach</td>
            <td><center><a href="editSupp/{{$s->id}}" type="submit" class="btn btn-info">Edit</a> <a href="delSupp/{{$s->id}}" type="submit" class="btn btn-danger">Hapus</a></center></td>
        </tr>
        @endforeach
    </table>
    <br><br><br>
    <section ng-show=" btnClicked == true " ng-hide=" btnClicked == false " id="inpbrg">
        <br>
        <h2>
        Input Supplier
        </h2>
        <hr>
        <div class="col-md-1"></div>
        <div class="col-md-7">
        <form action="/inserSupp" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="">Nama Supplier</label>
                <input type="text" class="form-control" id="" name="nama" required>
            </div>
            <div class="form-group">
                <label for="">No. Telepon</label>
                <input type="number" class="form-control" id="" name="notelp" required>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" class="form-control" id="" name="alamat" required>
            </div>
            <button type="submit" class="btn btn-success" >Save</button>
        </form>
        </div>
        <div class="col-md-4"></div><br><br><br><br>
    </section>
</div>

<!-- App ctrl angular -->
    <script type="text/javascript">
        var app = angular.module('tesApp',[]);
        app.controller('tesCtrl', function($scope) {
            $scope.btnClicked = false;

            $scope.showInp = function() {
                // body...
                $scope.btnClicked = true;
                console.log($scope.btnClicked);
            }

        });
    </script>
@endsection