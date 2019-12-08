@extends('../template')

@section('title','Input Transaksi')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container">
	<br><br><br>
	<h2>Tambah Transaksi</h2><hr><br>
	<div ng-init="idtr='{{$last[0]->id}}'" class="row">
	<div class="col-md-1"></div>
	<div class="col-md-4" style="background-color: #EAF2F8!important;">	
	<br>
	<form>
		{{csrf_field()}}
		<div class="form-group">

			<label for="">Nama Barang</label>
			<select class="form-control" name="idbrg" id="brgList" onchange="brgs()" ng-model="idbrg" required>
				<!-- <option selected="selected">PILIH BARANG</option> -->
				@foreach($barangs as $b)
	            <option value="{{$b->id}}" harga="{{$b->harga}}" nmbrg="{{$b->nama_barang}}" jmlh="{{$b->jumlah}}">{{$b->nama_barang}} ({{$b->jumlah}})</option>
	        	@endforeach
	        </select>
		</div>
		<div class="form-group">
			<label for="">Harga Barang</label>
			<input type="text" class="form-control" id="harga" name="harga" ng-model="hrg" disabled>
		</div>
		<div class="form-group">
			<label for="">Jumlah Beli</label>
			<input type="text" class="form-control" id="jumlah" name="jumlah" ng-model="jml" required>
		</div>
		<!-- <div class="form-group">
			<label for="">Total Harga</label>
			<input type="text" class="form-control" id="total" name="total" disabled>
		</div> -->
		<button type="submit" class="btn btn-success" ng-click="addbrg()">Add to list</button><!-- onclick="addbrg()" -->
	</form>
	<br>
	</div>
	<div class="col-md-2">
		
	</div>
	<div class="col-md-4">
		<center>
			<div class="alert alert-danger" id="alert" ng-show=" lebih == true " ng-hide=" lebih == false ">
				<span>
					<p>Jumlah beli melebihi stok yang ada</p>
				</span>	
			</div>
		</center>
	</div>
	</div>
	<br><br><br><br>
	<div class="row" ng-show=" btnClicked == true " ng-hide=" btnClicked == false ">
		<div class="container">
			<table class="table table-bordered table-striped" id="myTable">
                <thead>
                    <tr>
                    	<th class="center-vertical">No. </th>
                        <th class="center-vertical">Nama Barang </th>
                        <th class="center-vertical">Harga Barang</th>
                        <th class="center-vertical">Jumlah Beli</th>
                        <th class="center-vertical">Total</th>
                        <th class="center-vertical">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="li in list">
                    	<td>@{{currentPage > 1 ? (maxSize * (currentPage - 1)) + $index + 1 : $index + 1}}</td>
                        <td>@{{li.nmbrg}}</td>
                        <td>@{{li.hrg}}</td>
                        <td>@{{li.jml}}</td>
                        <td>@{{li.total}}</td>
                        <td class="center-vertical">
                            <button class="btn btn-danger" ng-disabled="btnfinal" ng-click="delbrg($index)">Batal</button>
                        </td>
                    </tr>
                </tbody>
            </table><br>
            <div class="container" style="background-color: #EAF2F8!important;">
            	<br>
            	<div class="col-md-4">
            		<table>
            			<tr>
            				<td>Total&nbsp;</td>
            				<td>&nbsp;:&nbsp;</td>
            				<td>&nbsp;<input type="text" id="ttl" ng-model="ttl" disabled></td>
            			</tr>
            			<tr>
            				<td>Bayar&nbsp;</td>
            				<td>&nbsp;:&nbsp;</td>
            				<td>&nbsp;<input type="text" id="byr" ng-model="byr"></td>
            			</tr>
            			<tr>
            				<td>Kembali&nbsp;</td>
            				<td>&nbsp;:&nbsp;</td>
            				<td>&nbsp;<input type="text" id="kmbl" disabled></td>
            			</tr>
            		</table><br>
            	</div>
            	<div class="col-md-4">
            		<button class="btn btn-info text-center" ng-click="min()">Bayar</button>&nbsp;&nbsp;<button ng-show=" btnByr == true " ng-hide=" btnByr == false " class="btn btn-primary text-center" ng-click="makeTrans(list)">Rekap Transaksi</button>
            	</div>
            	<div class="col-md-4">
            		
            	</div>
            	<br>
            </div>
		</div>
		<br><br>
	</div>
	<br><br><br>
<!-- js -->
<script type="text/javascript">
	// var list = [];

	function brgs() {
	 	// body...
	 	var hargany = document.getElementById("brgList");
  		document.getElementById("harga").value = hargany.options[hargany.selectedIndex].getAttribute("harga");
	}

</script>
<!-- App ctrl angular -->
	<script type="text/javascript">
		var app = angular.module('tesApp',[]);
		app.controller('tesCtrl', function($scope, $http, $window) {
			// $interpolateProvider.startSymbol('<%');
   			//$interpolateProvider.endSymbol('%>');

   			//btn and other
   			$scope.maxSize = 5;
    		$scope.currentPage = 1;
    		$scope.btnClicked = false;
    		$scope.btnfinal = false;
    		$scope.btnByr = false;
    		$scope.lebih = false;
    		$scope.data; 

    		//get var
			var allbrg = document.getElementById("brgList");
			var date = new Date();

			$scope.idbrg;
			$scope.stok;
			$scope.nmbrg;
			$scope.hrg;
			$scope.jml;
			$scope.total;
			$scope.totalny;
			//kembalian
			$scope.ttl;
			$scope.byr;
			$scope.kmbl;

			$scope.list = [];

			// $scope.init = function() {
   //  			$http.get('{{url('getId')}}/{{$last[0]->id}}').then(function (reply){

   //              	$scope.data = $last;
   //              	console.log($scope.data);
     
			// 	});
   //  		}

			$scope.addbrg = function() {
				// body...
				
				$scope.stok = allbrg.options[allbrg.selectedIndex].getAttribute("jmlh");
				$scope.nmbrg = allbrg.options[allbrg.selectedIndex].getAttribute("nmbrg");
				$scope.hrg = allbrg.options[allbrg.selectedIndex].getAttribute("harga");
				console.log($scope.jml);

				if ($scope.stok < $scope.jml) {

					$scope.lebih = true;
					return;	

				}
					$scope.lebih = false;
					$scope.form = {
						idbrg: $scope.idbrg,
						nmbrg: $scope.nmbrg,
						hrg: $scope.hrg,
						jml: $scope.jml,
						total: $scope.jml * $scope.hrg
					};
				
					$scope.list.push($scope.form);
					total();

					$scope.btnClicked = true;
					return;

			}

			$scope.delbrg = function(idx){
				var del = $scope.list[idx];
     			$scope.list.splice(idx, 1);

     			total();

			}

			$scope.min = function(){
				$scope.btnfinal = true;

				var coba = JSON.parse($scope.idtr);
				console.log(coba);
				$scope.idtrs = coba+1;
				$scope.kode = ('0' + date.getDate()).slice(-2) + ('0' + (date.getMonth() + 1)).slice(-2) + date.getFullYear() + "-" + $scope.idtrs;

				$scope.kmbl = $scope.byr-$scope.totalny;
				document.getElementById("kmbl").value=$scope.kmbl;
				$scope.btnByr = true;
			}


			$scope.makeTrans = function(list){

				$http.post('{{route('inserTrans')}}',{
					arr : $scope.list,
					total: $scope.totalny,
					kode: $scope.kode,
					byr: $scope.byr,
					kmbl: $scope.kmbl,
                    _token:'{{csrf_token()}}'

				}).then(function (reply){
					$window.location.replace("viewTrans");

				});

             	console.log($scope.list);

			}
			
			function total(){
    			$scope.totalny = Number();
        
    			for(var i = 0; i < $scope.list.length; i++){
        			$scope.totalny += Number($scope.list[i].total);
    			}
    			document.getElementById("ttl").value=$scope.totalny;


			}

		});
	</script>
</div>
@endsection