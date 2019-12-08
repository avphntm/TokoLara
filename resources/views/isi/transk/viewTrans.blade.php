@extends('../template')

@section('title','View Transaksi')
@section('page')
	<div ng-app="tesApp" ng-controller="tesCtrl">
		<div ng-init="init()" class="row">
			<div class="col-md-1">
			
			</div>
			<div class="col-md-10">
				<br><br><br>
				<h3 class="text-center">Rekap Transaksi</h3><br>
    			<a href="{{ route('addTrans')}}"><button class="btn btn-info" style="margin-right: 40px!important;">Tambah Transaksi</button></a><br><br>
				<table class="table table-striped">
			        <tr class="bg-info">
			            <th>Kode</th>
			            <th>Total Harga</th>
			            <th class="text-center">Action</th>
			        </tr>
			        @foreach($transaksiz as $transaksi)
			        <tr>
			        	<td>{{$transaksi->kode}}</td>
			        	<td>{{$transaksi->total}}</td>
			        	<td class="text-center"><a href="getDetails/{{$transaksi->id}}" type="submit" class="btn btn-info">Detail</a></td>
			        </tr>
			        @endforeach
			    </table>
		    	<br><br><br>
			</div>
			<div class="col-md-1">
				
			</div>
		</div>
		<div class="row" ng-show=" btnClicked == true " ng-hide=" btnClicked == false ">
			<br>
			<div class="col-md-4">
				
			</div>
			<div class="col-md-7">
				<div class="row">
					
				</div>
				<div class="row">
					
				</div>
			</div>
			<div class="col-md-1">
				
			</div>
		</div>	
	</div>
	
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
    		//vars

		});  //end ctrl
	</script>

@endsection