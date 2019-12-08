<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #1F286F;">
  		<a class="navbar-brand" href="#">UwU</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarNavDropdown">
    		<ul class="navbar-nav">
      			<li class="nav-item active">
        			<a class="nav-link" href="{{ route('home')}}">Home <span class="sr-only"></span></a>
      			</li>
      			<li class="nav-item dropdown">
        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options
        			</a>
        			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          				<a class="dropdown-item" href="{{ route('viewBrg')}}">Barang</a>
          				<a class="dropdown-item" href="{{ route('viewSupp')}}">Supplier</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('viewTrans')}}">Transaksi</a>
        			</div>
      			</li>
    		</ul>
  		</div>
	</nav>