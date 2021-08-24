let scanner = new Instascan.Scanner({ continuous:true, video: document.getElementById("preview"), mirror:true, captureImage: false, backgroundScan:true, refractoryPeriod: 5000, scanPeriod:1 });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          alert('No cameras found.');
        }
      }).catch(function(e) 
      {
        console.error(e);
      });

      scanner.addListener('scan', function(c){
      	document.getElementById('thevalue').value = c;

      	document.getElementById("form").submit();
});