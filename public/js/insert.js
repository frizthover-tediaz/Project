let scanner = new Instascan.Scanner({ continuous:true, video: document.getElementById("preview"), mirror:true, captureImage: false, backgroundScan:true, refractoryPeriod: 5000, scanPeriod:1 });

var constraints = {video: true};

navigator.mediaDevices.getUserMedia(constraints)
.then(function(stream) {
  Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          var x = 0;
          scanner.start(cameras[x]);
        }
      }).catch(function(e) 
      {
        alert("No Camera Found!");
      });

      scanner.addListener('scan', function(c){
      document.getElementById('thevalue').value = c;

      document.getElementById("form").submit();
  });
}).catch(function(err) {
  console.log(err.name + ": " + err.message);
});