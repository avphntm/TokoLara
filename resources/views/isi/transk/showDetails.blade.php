@extends('../template')

@section('title','Details Transaksi')
@section('page')
<div ng-app="tesApp" ng-controller="tesCtrl" class="container">
	<div id="AreaPrint" class="container">
	<br><br><br>
	<h3 class="text-center">Detail Transaksi</h3><hr><br><br>
	<div class="row">
		<div class="col-md-4">
			@foreach($mt as $t)
			<table class="table table-stripped">
				<tr>
					<td> Kode Transaksi</td>
					<td> :</td>
					<td> {{$t->kode}}</td>
				</tr>
				<tr>
					<td> Total Pembelian</td>
					<td> :</td>
					<td> {{$t->total}}</td>
				</tr>
				<tr>
					<td> Pembayaran</td>
					<td> :</td>
					<td> {{$t->bayar}}</td>
				</tr>
				<tr>
					<td> Kembalian</td>
					<td> :</td>
					<td> {{$t->kembali}}</td>
				</tr>
			</table>
			@endforeach
		</div>
		<div class="col-md-1">
			
		</div>
		<div class="col-md-7">
			<table class="table table-striped">
				<tr class="bg-success">
					<th style="color: white;">Nama Barang</th>
					<th style="color: white;">Jumlah Beli</th>
					<th style="color: white;">Harga</th>
					<th style="color: white;">Total</th>
				</tr>
				@foreach($dt as $dt)
				<tr>
					<td>{{$dt->nmbrg}}</td>
					<td>{{$dt->jmlbeli}}</td>
					<td>{{$dt->harga}}</td>
					<td>{{$dt->ttl}}</td>
				</tr>
				@endforeach
			</table>
		</div>		
	</div>
	<br><hr>
	<div class="row">
		<a href="{{ route('viewTrans')}}" style="margin-left: 900px!important;"><button class="btn btn-primary" style="margin-right: 20px!important;">Kembali</button></a>
		<!-- <button title="Print Nota" type="button" class="btn btn-info" ng-click="pdfinaja()">Nota</button> -->
	</div>
	<br><br>
	</div>
</div>
	<br><br><br>
	<!-- App ctrl angular -->
	<script type="text/javascript">
		var app = angular.module('tesApp',[]);
		app.controller('tesCtrl', function($scope, $http, $window) {
			// $interpolateProvider.startSymbol('<%');
   			//$interpolateProvider.endSymbol('%>');

   			$scope.pdfinaja = function(){
        		$('#AreaPrint').jqprint();
        		return false;
       
    		};


		});  //end ctrl
	</script>

@endsection