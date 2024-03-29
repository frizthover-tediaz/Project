<!DOCTYPE html>
<html>
<head>
	<title>Manual</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@700&display=swap" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="justify-content:space-between !important; background-color: transparent!important; ">
			<ul class="navbar-nav mr-auto">
		        <li class="nav-item">
			        <a class="nav-link active" href="/"><img src="img/logo.png"></a>
	     	    </li>
			</ul>
			<form id="form-e" method="POST" action="{{ url('/ide') }}">
				@csrf
				<ul class="navbar-nav ml-auto">
				    <li class="nav-item">
				        <button name="valid" id="valid" value="Otomatis" class="buttonnav">Otomatis</button>
				    </li>
				    <li class="nav-item">
				        <button name="valid" id="valid" value="Kembalikan" class="buttonnav">Kembalikan</button>
				    </li>
				</ul>
			</form>
		</nav>
	<div class="main-content">
	    <center>
	    	@if(Session::has('hasilscan1'))
		    <center>
				<div class="alert alert-danger" role="alert" style="width: 35%;text-align: left;padding: .5rem .5rem; text-align: center">Maaf Qty anda melebihi stok yang ada. Coba Lagi!</div>
			</center>

		    @elseif(Session::has('hasilscan'))
		    <center>
				<div class="alert alert-danger" role="alert" style="width: 35%;text-align: left;padding: .5rem .5rem; text-align: center">Kode Barang tidak ditemukan!
				</div>
			</center>
		    @endif
	    	<div class="border">
	    		<div class="mcontent">
	    			<form action="{{ url('/man') }}" method="POST">
	    				@csrf
	    				<input type="hidden" name="kode_user" id="kode_user" value="{{ $scan['kode_user'] }}">
		    			<table style="width: 100%">
		    				<tr>
		    					<td>Kode Barang</td>
		    					<td>:</td>
		    					<td class="width"></td>
		    					<td>
		    						<input class="form-control" list="brow" name="kodebarang" required>
									<datalist id="brow">
										@foreach($scan['brg'] as $p)
										<option value="{{ $p->kodebarang}}">{{$p->nama}}</option>
										@endforeach
									</datalist>
		    					</td>
		    				</tr>
		    				<tr class="height"></tr>
		    				<tr>
		    					<td>Qty</td>
		    					<td>:</td>
		    					<td class="width"></td>
		    					<td><input class="form-control" type="number" name="qty" min="0" oninput="validity.valid||(value='');" value="" required></td>
		    				</tr>		
		    			</table>
		    			<div class="btns">
		    				<button class="buttonnav1">Submit</button>
		    			</div>
	    			</form>
	    		</div>
	    	</div>
	    </center>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="js/alert.js"></script>

  </body>
</html>