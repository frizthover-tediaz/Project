function loadTbuser() {
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
}

function showTbuser() {
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
		};
    };
    xhttp.open("GET", url, true);
    xhttp.send();
};

function editTbuser(id) {
    var url = "data/edituser"+'/'+id;
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

function deleteTbuser(id) {
    var url = "data/deleteuser"+'/'+id;
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