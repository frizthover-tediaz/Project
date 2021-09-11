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
		</nav>
			@if(session('invalid'))
	        <input type="hidden" id="alert" value="{{session('invalid')}}"> 
	    	@endif

	    	@if(session('logout'))
	        <input type="hidden" id="alert" value="{{session('logout')}}"> 
	    	@endif
	<div class="main-content">
	    <center>
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
		    					<td><input class="forme" type="text" id="pass" name="pass" style="width: 100%;">
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
  </body>
</html>