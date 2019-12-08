@extends('../template')

@section('title','View Barang')
@section('page')

<div ng-app="tesApp" ng-controller="tesCtrl" class="container">
	<br><br><br>
    <h3 class="text-center">Tabel Barang</h3><br>
    <a href="#inpbrg"><button class="btn btn-info" ng-click="showInp()" style="margin-right: 40px!important;">Input Barang</button></a><br><br>
    <table class="table table-striped">
        <tr class="bg-info">
            <th class="text-center">No</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Stok</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach($barangs as $key => $b)
        <tr>
        	<td class="text-center">{{$key+1}}</td>
        	<td class="text-center">{{$b->nama_barang}}</td>
        	<td class="text-center">{{$b->jumlah}}</td>
        	<td class="text-center">{{$b->harga}}</td>
            <td class="text-center"><a href="editBrg/{{$b->id}}" type="submit" class="btn btn-info">Edit</a> <a href="delBrg/{{$b->id}}" type="submit" class="btn btn-danger">Hapus</a></td>
        </tr>
        @endforeach
    </table>
    <br><br><br>
    <section ng-show=" btnClicked == true " ng-hide=" btnClicked == false " id="inpbrg">
    <h2>
        Input Barang
    </h2>
    <hr>
    <div class="col-md-1"></div>
    <div class="col-md-7">
    <form action="/inserBrg" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="">Nama Barang</label>
            <input type="text" class="form-control" id="" name="nama" required>
        </div>
        <div class="form-group">
            <label for="">Supplier</label>
            <select class="form-control" name="idsupp">
                @foreach($supps as $s)
                <option value="{{$s->id}}">{{$s->nmsupp}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Jumlah</label>
            <input type="text" class="form-control" id="" name="jumlah" required>
        </div>
        <div class="form-group">
            <label for="">Harga</label>
            <input type="text" class="form-control" id="" name="harga" required>
        </div>
        <button ng-disabled="btnInp" ng-change="disabledd()" type="submit" class="btn btn-success" >Save</button>
    </form>
    </div>
    <div class="col-md-4"></div><br><hr>
    </section>
    <br>
</div>
<!-- App ctrl angular -->
    <script type="text/javascript">
        var app = angular.module('tesApp',[]);
        app.controller('tesCtrl', function($scope) {
            $scope.btnClicked = false;
            $scope.btnInp = false;

            $scope.showInp = function() {
                // body...
                $scope.btnClicked = true;
                console.log($scope.btnClicked);
            }
            $scope.disabledd = function() {
                // body...
                $scope.btnInp = true;
            }

        });
    </script>

@endsection