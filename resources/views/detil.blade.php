<!DOCTYPE html>
<html>
<head>
	<title>Scan Item</title>
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
			        <a class="nav-link active" href="#"><img src="img/logo.png"></a>
	     	    </li>
			</ul>
			<ul class="navbar-nav ml-auto">
			    <li class="nav-item">
			        <a class="nav-link" href="{{ url('/') }}"><input type="button" value="Scan Lagi?" class="buttonnav"></a>
			    </li>
			    <li class="nav-item">
			        <a class="nav-link" href="{{ url('/manual') }}"><input type="button" name="manual" id="manual" value="Manual" class="buttonnav"></a>
			    </li>
			</ul>
		</nav>
	<div class="main-content">
	    <center>
	    	<h2 class="title">Details</h2>
	    </center>
	    <div class="container">
	    	<div class="content">
	    		<form action="{{ url('/done') }}" method="POST">
	    			@csrf
		    		<table>
		    			<tr>
			    			<td>Nama</td>
			    			<td>:</td>
			    			<td class="width"></td>
			    			<td value="{{ $data['nama'] }}" name="nama">{{ $data['nama'] }}</td>
			    			<input type="hidden" name="nama" value="{{ $data['nama'] }}">
		    			</tr>
		    			<tr>
			    			<td>Kelas</td>
			    			<td>:</td>
			    			<td class="width"></td>
			    			<td value="{{ $data['kelas'] }}" name="kelas">{{ $data['kelas'] }}</td>
			    			<input type="hidden" name="kelas" value="{{ $data['kelas'] }}">
		    			</tr>
		    			<tr class="height"></tr>
		    			<tr>
			    			<td>Barang</td>
			    			<td>:</td>
			    			<td class="width"></td>
			    			<tr>
			    				@for ($i = 0; $i<$com = $data['param']; $i++)
			    				<tr class="height"></tr>
			    					<td>{{ $data['namabrg'][$i] }} 
			    						<input type="hidden" name="{{ $data['namabrg'][$i] }}" value="{{ $data['namabrg'][$i] }}">
			    						<td></td>
			    						<td>({{ $data['qty'][$i] }})</td>
			    						<input type="hidden" name="{{ $data['qty'][$i] }}" value="{{ $data['qty'][$i] }}">
			    					</td>
			    				</tr>
			    				@endfor
			    			</tr>
		    			</tr>
		    		</table>
		    		<center>
		    			<div class="marg">
		    				<button class="buttonnav">Selesai</button>
		    			</div>
		    		</center>
	    		</form>
	    	</div>
	    </div>
	</div>
</body>
</html>