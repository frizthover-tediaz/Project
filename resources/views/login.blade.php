<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
	
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>

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
					    <button name="valid" id="valid" value="Home" class="buttonnav">Home</button>
					</li>
				</ul>
			</form>
		</nav>

	<div class="main-content">
	    <center>

	    	@if(session('invalid'))
			<div class="alert alert-danger" role="alert" style="width: 50%;text-align: left;padding: .5rem .5rem">Maaf Kode User atau Password salah.</div>

			@elseif(session('logout'))
			<div class="alert alert-success" role="alert" style="width: 50%;text-align: left;padding: .5rem .5rem">Logout Berhasil!</div>
	    	@endif
	    	<div class="border">
	    		<div class="mcontent" style="text-align: center;">
	    			<form action="{{ url('/log') }}" method="POST">
	    				@csrf
		    			<table style="width: 100%">
		    				<tr>
		    					<td>Kode User</td>
		    					<td>:</td>
		    					<td class="width"></td>
		    					<td>
		    						<input class="forme" type="text" id="kode_user" name="kode_user" style="width: 100%;">
		    					</td>
		    				</tr>
		    				<tr class="height"></tr>
		    				<tr>
		    					<td>Password</td>
		    					<td>:</td>
		    					<td class="width"></td>
		    					<td><input class="forme" type="password" id="pass" name="pass" style="width: 100%;">
		    					<td class="width"></td>
		    					<td><i class="bi bi-eye-slash" id="togglePassword" style="cursor:pointer;"></i></td>
		    				</tr>		
		    			</table>
		    			<div class="btns">
		    				<button class="buttonnav1">Log In</button>
		    			</div>
	    			</form>
	    		</div>
	    	</div>
	    </center>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/toggle.js"></script>
  </body>
</html>