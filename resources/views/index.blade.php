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
			        <a class="nav-link" href="{{ url('/manual') }}"><input type="button" name="manual" id="manual" value="Manual" class="buttonnav"></a>
			    </li>
			</ul>
		</nav>
	<div class="main-content">
	    <div class="row">
	        <div class="col-md-6">
	          <video id="preview" width="480"></video>
	        </div>
	        <div class="col-md-6">
	          <div class="centert">
	          	<form id="form" method="POST" action="{{ url('/item') }}">
	          		@csrf
	            	<input type="hidden" name="thevalue" id="thevalue" value="">
	        	</form>
	            <h2 class="title">Scan Item</h2>
	          </div>
	        </div>
	      </div>
	    </div>
	</div>
    <script src="js/instascan.min.js"></script>
    <script src="js/insert.js"></script>
  </body>
</html>