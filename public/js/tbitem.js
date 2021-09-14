function showTbitem() {
    var url = "show/item";
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