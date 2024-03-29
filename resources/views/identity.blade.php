<!DOCTYPE html>
<html>
<head>
	<title>Scan Identity</title>
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
				        <button name="valid" id="valid" value="Manual" class="buttonnav">Manual</button>
				    </li>
				    <li class="nav-item">
				        <button name="valid" id="valid" value="Kembalikan" class="buttonnav">Kembalikan</button>
				    </li>
				</ul>
			</form>
		</nav>
	<div class="main-content">
			@if(session('gagal'))
			<center>
				<div class="alert alert-danger" role="alert" style="width: 35%;text-align: left;padding: .5rem .5rem; text-align: center">{{session('gagal')}}</div>
			</center>
			@elseif(session('berhasil'))
			<center>
				<div class="alert alert-success" role="alert" style="width: 35%;text-align: left;padding: .5rem .5rem; text-align: center">{{session('berhasil')}}</div>
			</center>

			@elseif(session('gagaldetil'))
			<center>
				<div class="alert alert-danger" role="alert" style="width: 35%;text-align: left;padding: .5rem .5rem; text-align: center">{{session('gagaldetil')}}</div>
			</center>
			@endif
	    <div class="row">
	        <div class="col-md-6">
	          <video id="preview" width="480"></video>
	        </div>
	        <div class="col-md-6">
	          <div class="centert">
	          	<form id="form" method="POST" action="{{ url('/ident') }}">
	          		@csrf
	            	<input type="hidden" name="thevalue" id="thevalue" value="">
	        	</form>
	            <h2 class="title">Scan Identitas</h2>
	          </div>
	        </div>
	      </div>
	    </div>
	</div>
    <script src="js/instascan.min.js"></script>
    <script src="js/insert.js"></script>
    <script src="js/alert.js"></script>
  </body>
</html>