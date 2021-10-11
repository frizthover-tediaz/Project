function check(){
	var qty = document.getElementById('qty');
	var br = document.getElementById('br');
	var check = document.getElementById('all');

	
	if (check.checked == true){
		qty.style.backgroundColor = "#eaecf4";
		br.style.backgroundColor = "#eaecf4";
		qty.style.border = "1px solid #ced4da";
		br.style.border = "1px solid #ced4da";

		qty.disabled = true;
		br.disabled = true;

		check.value = "all";
	}else{
		qty.style.backgroundColor = "white";
		br.style.backgroundColor = "white";
		qty.style.border = "1px solid #ced4da";
		br.style.border = "1px solid #ced4da";

		qty.disabled = false;
		br.disabled = false;

		check.value = "";
	}
	

	
}