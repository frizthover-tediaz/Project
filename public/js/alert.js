var x = document.getElementById('alert').value;

if(x=="gagal"){
	alert("Maaf Qty anda melebihi stok yang ada. Coba Lagi!");
}else if(x=="berhasil"){
	alert("Berhasil!");
}else if(x=="iden"){
	alert("Identitasmu tidak terdaftar, Hubungi Admin Segera!");
}else if(x=="brg"){
	alert("Kode Barang tidak ditemukan!");
}else if(x=="id"){
	alert("Id tidak ditemukan / status sudah / Kode User Salah! ");
}else if(x=="invalid"){
	alert("User tidak ditemukan!");
}else if(x=="logout"){
	alert("Logout Berhasil");
}else if(x=="berhasilbrg"){
	alert("Berhasil");
	var url = "data/barang";
    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            data = this.responseText;
            document.getElementById("data").innerHTML = data;
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();

    var ele2 = document.getElementById('collapsePages');
    ele2.classList.add("show");
}else if(x=="gagalbrg"){
	alert("Gagal, barang sudah ada");
	var url = "data/barang";
    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            data = this.responseText;
            document.getElementById("data").innerHTML = data;
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();

    var ele2 = document.getElementById('collapsePages');
    ele2.classList.add("show");
}else if(x=="showbrg"){
	alert("Berhasil");
	var url = "show/barang";
    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            data = this.responseText;
            document.getElementById("data").innerHTML = data;

            var MyDiv = document.getElementById('data');

            var arr = MyDiv.getElementsByTagName('script');
			for (var n = 0; n < arr.length; n++){
			    eval(arr[n].innerHTML);
			};
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();

    var ele2 = document.getElementById('collapsetable');
    ele2.classList.add("show");
};