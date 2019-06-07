function changeMode() {
  var c = document.getElementById("myCanvas");
  var ctx = c.getContext("2d");
  var img = document.getElementById("scream");
  
  var selectMode=document.getElementById("mode").value;
  if (selectMode=='negative') {
    ctx.drawImage(img, 0, 0);
    var imgData = ctx.getImageData(0, 0, c.width, c.height);
    var i;
    for (i = 0; i < imgData.data.length; i+=4) {
      imgData.data[i] = 255 - imgData.data[i];
      imgData.data[i+1] = 255 - imgData.data[i+1];
      imgData.data[i+2] = 255 - imgData.data[i+2];
      imgData.data[i+3] = 255;
    }
    ctx.putImageData(imgData, 0, 0);
    document.getElementById("myCanvas").style.webkitFilter = "none";
  }
  else {
    var img1 = new Image();
	  img1.src = './Pic/test2.jpg';
		  // CREATE CANVAS CONTEXT.
		  var canvas = document.getElementById('myCanvas');
		  var ctx = canvas.getContext('2d');
		  canvas.width = img1.width;
		  canvas.height = img1.height;
 
      ctx.drawImage(img1, 0, 0);  // DRAW THE IMAGE TO THE CANVAS.
      document.getElementById("myCanvas").style.webkitFilter = "blur(5px)";
	}
  }