function check(){
	var qty = document.getElementById('qty');
	var br = document.getElementById('br');
	var check = document.getElementById('all');

	
	if (check.checked == true){
		qty.style.backgroundColor = "rgba(16, 16, 16, 0.15)";
		br.style.backgroundColor = "rgba(16, 16, 16, 0.15)";
	
		qty.disabled = true;
		br.disabled = true;

		check.value = "all";
	}else{
		qty.style.backgroundColor = "white";
		br.style.backgroundColor = "white";

		qty.disabled = false;
		br.disabled = false;

		check.value = "";
	}
	

	
}