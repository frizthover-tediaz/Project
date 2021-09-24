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

}else if(x=="berhasiladm"){
    alert("Berhasil");
    var url = "data/admin";
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

}else if(x=="gagaladm"){
    alert("Gagal, admin sudah ada");
    var url = "data/admin";
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
}else if(x=="showadm"){
    alert("Berhasil");
    var url = "show/admin";
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

}else if(x=="berhasiluser"){
    alert("Berhasil");
    var url = "data/user";
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

}else if(x=="gagaluser"){
    alert("Gagal, User sudah ada");
    var url = "data/user";
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
}else if(x=="showuser"){
    alert("Berhasil");
    var url = "show/user";
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

}else if(x=="showdetil"){
    alert("Berhasil");
    var url = "show/detil";
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

}