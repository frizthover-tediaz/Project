function loadTbadmin() {
    var url = "dataadm";
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
}

function showTbadmin() {
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
		};
    };
    xhttp.open("GET", url, true);
    xhttp.send();
};

function editTbadmin(id) {
    var url = "data/editadm"+'/'+id;
    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            data = this.responseText;
            document.getElementById("data").innerHTML = data;
        };
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}

function deleteTbadmin(id) {
    var url = "data/deleteadm"+'/'+id;
    var xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            data = this.responseText;
            document.getElementById("data").innerHTML = data;
        };
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}